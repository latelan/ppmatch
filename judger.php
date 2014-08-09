<?php
session_start();
if (!isset($_SESSION['userid'])) {
	header("Location:judger_login.php");
	exit();
}
include_once ("autoload.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html" ; charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>intror</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/judger.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script charset="utf-8" language="javascript" src="js/judger.js" type="text/javascript"></script>
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">确认信息</h4>
                </div>
                <div class="modal-body">

                    <div class="text_descr_style">
                        <strong>你现在正在为 </strong>
                        <span id="text_team_name" class="team_text_style"></span>
                        <strong>加</strong>
                        <span id="text_team_score" class="team_text_style"></span>
                        <strong>分,请输入密码确认!</strong>
                    </div>
<?php

$userid = $_SESSION['userid'];

echo "<form action=\"judger.php\" onsubmit=\"return check_input_pwd(\"$userid\", 'modal_pwd','errorbox' )\" method='post' id='judger' name='judger'>";
?>
                        <div class="row modal_pwd_positaton">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-lock" ></span>
                                    </span>
                                    <input type="password" class="form-control" placeholder="请输入密码" name="passwd" id="modal_pwd" />
                                    <input type="hidden" name="team_id" value=""  id="hidden_team_name" />
                        			<input type="hidden" name="team_score" value=""  id="hidden_team_score" />
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
							<p id="errorbox" class="error_style"></p>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary" name="submit" id="submit" >确定</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<div class="container-fluid">
        <div id="nav_position">
            <ul class="nav nav-pills " role="tablist">
                <li role="presentation">
				<a href="judger.php" id="username" class="username"><?php echo '[ '.$_SESSION['userid'].' ]';?></a>
                </li>
                <li role="presentation">
				<a href="index.php">主页</a>
				</li>
                <li role="presentation"><a href="judger_login.php?action=logout">退出</a>
                </li>
            </ul>
        </div>
        <table class="table table-hover table-striped table-bordered table-responsive" id="info">

            <thead class="text_position">
                <tr>
                    <th>编号</th>
                    <th>队伍名称</th>
                    <th>一号队员</th>
                    <th>二号队员</th>
                    <th>队伍积分</th>
                </tr>

            </thead>
            <tbody class="text_postition">
<?php
$oper          = new judger();
$team_all_info = $oper->displayTable();

foreach ($team_all_info as $key => $value) {
	echo "<tr class='success'>";

	foreach ($value as $keys => $values) {
		?>
										<td><?php echo $team_all_info[$key][$keys];?></td>
		<?php
	}?>
												<?php
	echo "</tr>";
}
?>
</tbody>
        </table>


        <div class="add_score_positation">
            <p class="add_score_text_style">我--只为胜者加分</p>

            <div class="row ">
                <div class="col-lg-4 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                               <span class="glyphicon glyphicon-user"></span>
                        </span>
                        <input type="text" class="form-control" placeholder="队伍编号" id="Team" />
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->


                <div class="col-lg-4 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                               <span class="glyphicon glyphicon-leaf"></span>
                        </span>
                        <input type="text" class="form-control" placeholder="所加积分(默认为1分)" id="team_score" />
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->

                <button class="btn btn-primary"  onclick="search()">提交</button>
            </div>
        </div>
        <!--end add_score_positation-->
    </div>


<?php

// if (isset($_POST['submit'])) {
// 	if (isset($_SESSION['userid'])) {

// 		$passwd = $_POST['passwd'];
// 		$userid = $_SESSION['userid'];

//	$oper   = new judger_login($userid, $passwd);
//	$result = $oper->getResult();
//	if (true == $result) {
//		$team_id    = $_POST['team_id'];
//		$team_score = $_POST['team_score'];
//
//		$save       = new judger($team_id, $team_score);
//		$save->saveTeamScore();
//		$rest = $save->getResult();
//		if (false == $rest) {
//			echo "<script>alert(糟糕！数据无法存储！);window.location.href='judger.php';</script>";
//		}else{
//			echo "<script language=JavaScript>window.location.replace(location.href);</script>";
//		}
//	}else{
//		echo "<script>javascript:err_reminder()</script>";
// 	}
// } else {

// } else {
// 	echo "<script>alert(你还没登录，无法提交!);<a href='judger_login.php'>返回登录</a>;</script>\n";

// }
// }
?>
</body>

</html>
