<?php
include_once ("autoload.php");

class judger_login {
	private $judagerName;//用户登录标识符
	private $judagerPwd;//用户密码
	private $sqlid;//数据库库链接标识符
	private $logflag;//用户登录成功与否的标识符,成功为true,否则为false

	public function __construct($userid, $userpwd) {
		$this->judagerName = addslashes(trim($userid));
		$this->judagerPwd  = addslashes(trim($userpwd));
		$this->logflag     = false;
		$this->checkLogIn();
	}

	function checkLogIn() {
		$oper   = new operatedb();
		$sql    = "select user, password from admin where user = '$this->judagerName' and password = '$this->judagerPwd'";
		$result = $oper->executeSQL($sql);

		if (false == $result) {
			$this->logflag = false;
		} else if (is_array($result) && !empty($result)) {
			$this->logflag = true;
		} else {

			$this->logflag = false;
		}
	}

	function getResult() {
		return $this->logflag;
	}
}

$username = $_GET['id'];
$password = $_GET['passwd'];
$login    = new judger_login($username, $password);
$result   = $login->getResult();
if (false == $result) {
	echo "false";
}

?>
