
@echo off

rem -------------------------------------------------------------
rem  Yii command line init script for Windows.
rem
remEcho 命令

打开回显或关闭请求回显功能，或显示消息。如果没有任何参数，echo 命令将显示当前回显设置。

语法

echo [{on|off}] [message]

Sample：@echo off / echo hello world

在实际应用中我们会把这条命令和重定向符号（也称为管道符号，一般用> >> ^）结合来实现输入一些命令到特定格式的文件中.这将在以后的例子中体现出来。[1-2]

@ 命令

表示不显示@后面的命令，在入侵过程中（例如使用批处理来格式化敌人的硬盘）自然不能让对方看到你使用的命令啦。

Sample：@echo off

@echo Now initializing the program,please wait a minite...

@format X: /q/u/autoset (format 这个命令是不可以使用/y这个参数的，可喜的是微软留了个autoset这个参数给我们，效果和/y是一样的。）


Setlocal命令将启动批处理文件中环境变量的本地化。本地化将持续到出现匹配的endlocal命令或者到达批处理文件结尾为止。
rem 是主食的意思
rem
rem
rem
rem
rem
rem
rem  @author Qiang Xue <qiang.xue@gmail.com>
rem  @link http://www.yiiframework.com/
rem  @copyright Copyright (c) 2008 Yii Software LLC
rem  @license http://www.yiiframework.com/license/
rem -------------------------------------------------------------

@setlocal

set YII_PATH=%~dp0 //这里是把YII_PATH设置自动对应本地路径 然后执行php.exe

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%YII_PATH%init" %* 

@endlocal
