<?php
//命名空间控制器
namespace app\controllers;
//使用YII控制器
use yii\web\Controller;
class HelloController extends  Controller{
    public  function  actionIndex(){
       $res = \YII::$app->response;
       //状态码
       $res->statusCode ='404';
       //header头 pragma 处理缓存 这里是不缓存
        $res->headers->add('pragma','no-cache');
        //header 头缓存5秒
        $res->headers->set('pragma','max-age=5');
        //header 删除缓存
        $res->headers->remove('pragma');
        //header跳转到网站
        $res->headers->add('location','http://www.php.com');
        //header 这里也是跳转 返回333的值
        $this->redirect('http://www.php.com',333);
        //文件下载 attachment 是附加 filename 文件名 a.jpg
       // 1.当代码里面使用Content-Disposition来确保浏览器弹出下载对话框的时候。
        // response.addHeader("Content-Disposition","attachment");一定要确保没有做过关于禁止浏览器缓存的操作。如下：
        //response.setHeader("Pragma", "No-cache");
        //response.setHeader("Cache-Control", "No-cache");
        //response.setDateHeader("Expires", 0);
        $res->headers->add('contend-disposition','attachment; filename="a.jpg"');
        //文件下载 通过对浏览器发送文件 在yii框架中是在入口文件里面为根文件传送
        $res->sendFile('./b.jpg');
    }
}