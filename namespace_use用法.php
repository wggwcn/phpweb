<?php
namespace（以下简称ns）。在定义了一个ns之后，下面所申明的class、interface、const（不包含variable）都是在申明的ns这个“域”里面的。
当引用一个申明了ns的包含文件
，想要调用这个ns里面的东西，那必须调整当前脚本也到此ns域，否则就得用全称（）包含ns全称）：
// inc.php  
namespace Foo;  
class Bar {}  
  
// 访问Foo的第一种方法，用全称  
require 'inc.php';  
$foo = new \Foo\Bar();  
  
// 访问Foo的第二种方法  
namespace Foo; // 调整当前脚本到Foo这个ns域，而且namespace申明必须在第一句  
require 'inc.php';  
$foo = new Bar();  
use关键字目的是使用ns的别名：
// 比如  
use A\Very\Long\Namespace as Ns;  
// 这样就可以用Ns来代替A/Very/Long/Namespace这个ns下定义的东西  
$foo = new Ns\Foo();  
但是在一些开源项目里面经常会看到use Ns\Component这样的用法，没有用as，这让我以前一直在思考use是否还有第二种用法，糟糕的是PHP的文档里面
也没有对描述，只能靠题，得出一个比较靠得出一个比较靠谱的结论是use可以省略as以及后面的别名而直接把ns最后一个节点的名字当作别名，
感觉是不是很像ln -s命令的用法呢：
// 第三种用法  
require 'inc.php';  
use Foo\Bar; // 这样Bar就等于Foo\Bar了  
$foo = new Bar();  
