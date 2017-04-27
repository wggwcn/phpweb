<?php
在PHP中，出现同名函数或是同名类是不被允许的。为防止编程人员在项目中定义的类名或函数名出现重复冲突，在PHP5.3中引入了命名空间这一概念。

1.命名空间，即将代码划分成不同空间，不同空间的类名相互独立，互不冲突。一个php文件中可以存在多个命名空间，第一个命名空间前不能有任何代码
  。内容空间声明后的代码便属于这个命名空间，例如：
  
<?php
    echo 111;       //由于namespace前有代码而报错
    namespace Teacher;
    class Person{
        function __construct(){
            echo 'Please study!';
        }
    }
2.调用不同空间内类或方法需写明命名空间。例如：
  <?php
    namespace Teacher;
    class Person{
        function __construct(){
            echo 'Please study!<br/>';
        }
    }
    function Person(){
        return 'You must stay here!';
    };
    namespace Student;
    class Person{
        function __construct(){
            echo 'I want to play!<br/>';
        }
    }
    new Person();                    //本空间（Student空间）
    new \Teacher\Person();           //Teacher空间
    new \Student\Person();           //Student空间
    echo \Teacher\Person();          //Teacher空间下Person函数
    //输出：
    I want to play!
    Please study!
    I want to play!
    You must stay here!
      
      3.在命名空间内引入其他文件不会属于本命名空间，而属于公共空间或是文件中本身定义的命名空间。例：

首先定义一个1.php和2.php文件：
      <?php     //1.php
class Person{
    function __construct(){
            echo 'I am one!<br/>';
        }
}

<?php
namespace Newer;
require_once './1.php';
new Person();      //报错，找不到Person;
new \Person();     //输出 I am tow!;

<?php     //2.php
namespace Two
class Person{
    function __construct(){
            echo 'I am tow!<br/>';
        }
}

4.下面我们来看use的使用方法：（use以后引用可简写）
     namespace School\Parents;
    class Man{
        function __construct(){
            echo 'Listen to teachers!<br/>';
        }
    }
    namespace School\Teacher;
    class Person{
        function __construct(){
            echo 'Please study!<br/>';
        }
    }
    namespace School\Student;
    class Person{
        function __construct(){
            echo 'I want to play!<br/>';
        }
    }
    new Person();                   //输出I want to play!
    new \School\Teacher\Person();   //输出Please study!
    new Teacher\Person();           //报错
    ----------
    use School\Teacher;  
    new Teacher\Person();           //输出Please study!    
    ----------
    use School\Teacher as Tc;  
    new Tc\Person();           //输出Please study!  
    ----------
    use \School\Teacher\Person; 
    new Person();           //报错
    ----------
    use \School\Parent\Man; 
    new Man();           //报错
