  <h1>数据库之数据库配置</h1>
  
  <h1>Centos系统下Lamp环境的快速搭建 linux+apche+mysql+php</h1>

首先为了搭建一个稳定的lamp的练习环境,确保你的虚拟机可以连网,这里我们使用的yum安装,它可以帮助我们解决软件自己的依赖关系.
我还在后面加了postgresql数据库如果不需要的话可以去掉和postgresql的参数.命令如下

yum -y install httpd mysql mysql-server php php-mysql postgresql postgresql-server php-postgresql php-pgsql php-devel

安装phpmyadmin 配置
只需要在Linux的命令中进行输入yum  install php-mbstring，等待安装完成。

对php进行配置
phpMyAdmin/libraries/config.default.php进行编辑配置。

使得不需要密码能登录mysql
在$cfg['servers'][$i]['AllowNpassword']=false
改为$cfg['servers'][$i]['AllowNpassword']=true
 
 数据库的类型 
 数值类型
 TINYINT	1 字节	(-128，127)	(0，255)	小整数值
 SMALLINT	2 字节	(-32 768，32 767)	(0，65 535)	大整数值 
 MEDIUMINT	3 字节	(-8 388 608，8 388 607)	(0，16 777 215)	大整数值
 INT或INTEGER	4 字节	(-2 147 483 648，2 147 483 647)	(0，4 294 967 295)	大整数值
 BIGINT	8 字节	(-9 233 372 036 854 775 808，9 223 372 036 854 775 807)	(0，18 446 744 073 709 551 615)	极大整数值
 FLOAT	4 字节	(-3.402 823 466 E+38，-1.175 494 351 E-38)，0，(1.175 494 351 E-38，3.402 823 466 351 E+38)	0，(1.175 494 351 E-38，3.402 823 466 E+38)	单精度
浮点数值
DOUBLE	8 字节	(-1.797 693 134 862 315 7 E+308，-2.225 073 858 507 201 4 E-308)，0，(2.225 073 858 507 201 4 E-308，1.797 693 134 862 315 7 E+308)	0，(2.225 073 858 507 201 4 E-308，1.797 693 134 862 315 7 E+308)	双精度
浮点数值
DECIMAL	对DECIMAL(M,D) ，如果M>D，为M+2否则为D+2	依赖于M和D的值	依赖于M和D的值	小数值

日期和时间类型
DATE	3	1000-01-01/9999-12-31	YYYY-MM-DD	日期值
TIME	3	'-838:59:59'/'838:59:59'	HH:MM:SS	时间值或持续时间
YEAR	1	1901/2155	YYYY	年份值
DATETIME	8	1000-01-01 00:00:00/9999-12-31 23:59:59	YYYY-MM-DD HH:MM:SS	混合日期和时间值
TIMESTAMP	4	1970-01-01 00:00:00/2037 年某时	YYYYMMDD HHMMSS	混合日期和时间值，时间戳

字符串类型
CHAR	0-255字节	定长字符串
VARCHAR	0-65535 字节	变长字符串 
TINYBLOB	0-255字节	不超过 255 个字符的二进制字符串
TINYTEXT	0-255字节	短文本字符串
BLOB	0-65 535字节	二进制形式的长文本数据
TEXT	0-65 535字节	长文本数据
MEDIUMBLOB	0-16 777 215字节	二进制形式的中等长度文本数据
MEDIUMTEXT	0-16 777 215字节	中等长度文本数据
LONGBLOB	0-4 294 967 295字节	二进制形式的极大文本数据
LONGTEXT	0-4 294 967 295字节	极大文本数据

1.为了更好地设置数据连接,一般会将数据连接所涉及的值定义成变量.
$mysql_server_name='localhost'; //改成自己的mysql数据库服务器

$mysql_username='root'; //改成自己的mysql数据库用户名

$mysql_password='123456'; //改成自己的mysql数据库密码

$mysql_database='Mydb'; //改成自己的mysql数据库名

也可把以上变量放在一个文件里,可以随时让其他文件调用.
例如: 将以上内容放在:db_config.php 那么在其他需要用到数据库的页面直接调用.
调用代码:require("db_config.php");
　 2.连接数据库
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库

mysql_query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.南昌网站建设公司百恒网络PHP工程师建议用UTF-8 国际标准编码.

mysql_select_db($mysql_database); //打开数据库

$sql ="select * from news "; //SQL语句

$result = mysql_query($sql,$conn); //查询

　　 3.读取表中的内容,这里我们用while,可以根据具体情况,用for 或其他的.
while($row = mysql_fetch_array($result))

{

echo "<div style=\"height:24px; line-height:24px; font-weight:bold;\">"; //排版代码

echo $row['Topic'] . "<br/>";

echo "</div>"; //排版代码

}

　　 4.php写入数据库,Mysql数据的写入
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password); //连接数据库

mysql_query("set names 'utf8'"); //数据库输出编码

mysql_select_db($mysql_database); //打开数据库

$sql = "insert into messageboard (Topic,Content,Enabled,Date) values ('$Topic','$Content','1','2011-01-12')";

mysql_query($sql);

mysql_close(); //关闭MySQL连接
