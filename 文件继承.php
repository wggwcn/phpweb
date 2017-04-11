A 文件  a.php
<?php
//通过定义不同文件位置，文件里的类也会不是同一个地方可以多次调用，	
namespace a\b\c
class Apple{
	function get_info(){
		echo' this is A';
	}
}
//B 文件 b.php
<?php	
namespace f\s\s
class Apple{
	function get_info(){
		echo' this is B';
	}
}
// C 文件 C.PHP
<?php	
//这里是没有用USENAME 
class Apple{
	function get_info(){
		echo' this is C';
	}
}
<?PHP 
//INDEX.PHP
//通过require 载入文件 
require_once("a.php");
require_once("b.php");
$a_app = new a\b\c\Apple();
$a_app->get_info; 
$b_app = new f\s\s\Apple();
$b_app->get_info();
//通过USE 载入文件 
use a\b\c\Apple;  
use f\s\s\Apple as Bapple;
$a_app = new Apple();
$b_app = new Bapple(); 
$a_app->get_info();
$b_app->get_info();
//如果C .PHP 和index.php 放置在同一个文件夹 会调用后C.PHP
$C_app = new \Apple();


