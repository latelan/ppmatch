<?php
session_start();
include_once ("autoload.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>judger login</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/from.css" rel="stylesheet">
		<link href="css/judger.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script charset="utf-8" language="javascript" src="js/judger.js" type="text/javascript"></script>

	</head>

	<body>
	<div id="nav_position">
		<ul class="nav nav-pills" role="tablist">
			<li role="presentation">
				<a href="index.html">主页</a>
			 </li>
			<li role="presentation">
				<a href="judger_login.php?action=logout">退出</a>
			 </li>
		 </ul>
		</div>

<?php

if ($_GET['action'] == "logout") {
	if (isset($_SESSION['userid'])) {
		unset($_SESSION['userid']);
		setCookie("passwd", "", 0);
		echo "<script type='text/javascript'>location.replace(location.href);</script>";
		echo "<div class='alert alert-info'>\n";
		echo "<strong>提示!</strong>注销成功!</strong>\n";
		echo "</div>\n";
	}
}

if (isset($_SESSION['userid'])) {
	header("Location: judger.php");
	echo "<div class=\"alert alert-info\">\n";
	echo "<strong>提示！</strong>"."亲，您已登录系统了！<a href=\"judger.php\">进入</a>\n";
	echo "</div>\n";
} else if (isset($_POST['submit'])) {

	if (!empty($_POST['user']) and !empty($_POST['passwd'])) {

		$_SESSION[userid] = $_POST['user'];

		setcookie("user", $_POST['user'], time()+3600);//设置COOKIE的有效时间为1小时
		setcookie("passwd", $_POST['passwd'], time()+3600);//设置COOKIE的有效时间为1小时

		echo "<script>window.location.href='judger.php';</script>";
	}
}

?>
		<div class="container">

			<!-- 关键部分:<form> -->
			<form action="judger_login.php" method="post" class="form-signin" role="form">
				<h2 class="form-signin-heading">裁判登录</h2>
				<input type="text" class="form-control" placeholder="请输入用户名" name="user" id='user' value="<?php echo $_COOKIE['user'];?>" />
				<input type="password" class="form-control" placeholder="请输入密码" name="passwd" id="passwd" value="<?php echo $_COOKIE['passwd'];?>"/><br />
				<!-- <button type='button' class='btn btn-lg btn-primary btn-block' name='submit' id='submit'  onclick="check_login( 'user', 'passwd','errorbox' ,'submit')">登录</button> -->
				<button class="btn btn-lg btn-primary btn-block" type="submit" id="submit" name="submit">登录</button>
			</form>
<p id="errorbox" class="error_style"></p>
		</div> <!-- /container -->

	</body>
</html>


