<!--
# 
# Author:		xusongqi@live.com
# 
# Created Time: 2014年07月09日 星期三 16时10分21秒
# 
# FileName:     select.html
# 
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="../docs-assets/ico/favicon.png">

	<title>match status</title>

	<link href="css/bootstrap.css" rel="stylesheet">

	<link href="css/my_css.css" rel="stylesheet">

  </head>

<body>
<div class="container">
	<div class="header">
	  <ul class="nav nav-pills pull-right">
	  <li class="active" style="font-size:100%"><a href="index.html">返回主页</a></li> 
	  </ul>
	  <h3 class="text-muted">我是冠军</h3> 
	</div>

	<div class="jumbotron">
		<br>
		<h1>积分榜</h1>
		<hr>

				<table class="table table-hover table-striped table-bordered table-responsive">
					<thead>
						<tr>
							<th class="item">牛气冲天队</th>
							<th class="item">Data队</th>
							<th class="item">野战队</th>
						</tr>

					</thead>
					<tbody>

<?php
//建立数据库连接描述符，指定主机，用户名，密码
$connect_fd = mysql_connect("localhost","admin","admin@linux31");
if(!$connect_fd)
{
	die('Connect Mysql Failed:' . mysql_error() );
}

//选择数据库
mysql_select_db("match", $connect_fd) or die(mysql_error());

mysql_query("set names utf8");
//查询语句
$result = mysql_query( 'select * from team' );
#$result2 = mysql_query( "select * from competing where is_match='1'");
#$playera = mysql_query( "select player from player where player_id='1'");
#$playerb = mysql_query("select player from player where player_id='3'");

echo "<tr>";
while($row = mysql_fetch_array($result))
{
	echo "<td >" . $row['mark']. "</td>";
}
echo "</tr>";

//关闭数据库连接描述符
mysql_close($connect_fd);
?>
<!--
					</tbody>
				</table>
		<br>
		<h1>PK中</h1>
				<table class="table table-hover table-striped table-bordered table-responsive">
					<thead>
						<tr>
							<th class="item">选手1</th>
							<th class="item">选手2</th>
						</tr>
					<tbody>
<?php
echo "<tr>";
echo "<td>" .$playera ."</td>";
echo "<td>" .$playerb ."</td>";
echo "</tr>";

?>
-->
					</thead>
					<tbody>
				</table>
		<br>
	</div>
	<div class="footer">
	<p>ping pang @ suiyi</p>
	<p></p>
	</div>
<script>
var oRet = document.querySelector('#ret');
var auto = function() {
	oRet.innerHTML = '浏览器像素宽度为：<b>' + window.innerWidth + 'px</b>';
}
auto();
window.onresize = auto;
</script>
	<script src="http://cdn.bootcss.com/jquery/2.0.3/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>




