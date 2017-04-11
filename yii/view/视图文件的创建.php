<?php
//命名空间控制器
namespace app\controllers;
//使用YII控制器
use yii\web\Controller;
//使用yii的cookie处理
use yii\web\cookie;
class HelloController extends  Controller{
    public  function  actionIndex(){
        //返回视图文件 这index.php 可以不用换加后缀yii已经处理 renderPartial是调用视图文件的意思
        //调用的index文件是在basic/view/hello/index.php  yii是调用后hello控制器则要用户hello控制器的文件下
      return $this->renderPartial('index');


    }
}
/**render 和renderpartial之间最大的区别就是：一个是渲染模板，一个不渲染模板。
其中render 输出父模板的内容，将渲染的内容，嵌入父模板。
renderPartial 则不输出父模板的内容。只对本次渲染的局部内容，进行输出。
render函数的说明如下：**//
//render 和renderpartial之间最大的区别就是：一个是渲染模板，一个不渲染模板。
//其中render 输出父模板的内容，将渲染的内容，嵌入父模板。
//renderPartial 则不输出父模板的内容。只对本次渲染的局部内容，进行输出。
//render函数的说明如下：
public function render($view,$data=null,$return=false)
{
    if($this->beforeRender($view))
    {
        $output=$this->renderPartial($view,$data,true);//渲染子模板
        if(($layoutFile=$this->getLayoutFile($this->layout))!==false)

            //将子模版渲染的内容放到content变量中去渲染父模板，在父模板中输出$content
            $output=$this->renderFile($layoutFile,array('content'=>$output),true);

        $this->afterRender($view,$output);

        $output=$this->processOutput($output);

        if($return)
            return $output;
        else
            echo $output;
    }
}



//renderpartial函数的说明如下：
public function renderPartial($view,$data=null,$return=false,$processOutput=false)
{
    if(($viewFile=$this->getViewFile($view))!==false)
    {
        $output=$this->renderFile($viewFile,$data,true);
        if($processOutput)
            $output=$this->processOutput($output);
        if($return)
            return $output;
        else
            echo $output;
    }
    else
        throw new CException(Yii::t('yii','{controller} cannot find the requested view "{view}".',
            array('{controller}'=>get_class($this), '{view}'=>$view)));
}



//通过观察可知，render函数内部默认执行processOutput()函数，而renderpartial函数必须制定才会执行。

 //我们经常使用的系统，通常头部和底部是相同的，这个时候可以使用布局渲染，每个页面只需要使用这个布局，然后填上中间自己的部分，这样的好处是在修改头部和底部的时候，不用每个页面都修改，只要修改相应的布局页面就可以了。
//<div>头部的代码</div>
<?PHP  echo $content;?> //替换相应的内容
<div>底部的代码</div>
使用的布局的时候，只需要在使用render函数，同时设置布局使用的文件，就可以了。
