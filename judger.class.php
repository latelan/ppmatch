<?php
// Author: zbqyexingknog
// Creat Date: 2014.8
// Email: zbqyexingkong@163.com
// Github:https://github.com/zbqyxingkong

include_once ("autoload.php");
/**
 * 存储队伍的分数
 */
class judger {
	private $teamId;
	private $teamScore;
	private $result;
	private $oper;

	function __construct($team_id, $team_score) {
		$this->teamId    = $team_id;
		$this->teamScore = $team_score;
		$this->oper      = new operatedb();
	}

	function saveTeamScore() {
		$sql          = "update team set mark = '$this->teamScore' where team_id = '$this->teamId'";
		$this->result = $this->oper->executeSQL($sql);
	}

	function getResult() {
		return $this->result;
	}
	//从数据库中获取队伍信息(team_id, team_name,player1,play2...mark)
	function displayTable() {

		$team_sql       = "select team_id,team_name from team";
		$team_info_list = $this->oper->executeSQL($team_sql);
		foreach ($team_info_list as $key => $value) {
			$player_sql        = "select player from player where team_id = '$value[team_id]'";
			$player_list[$key] = $this->oper->executeSQL($player_sql);
		}

		//	print_r($team_info_list[0]);
		//	echo "<br/>";
		$arrlen = count($team_info_list[0]);
		foreach ($team_info_list as $key => $value) {
			foreach ($player_list as $i => $val)
			$team_info_list[$key][$arrlen+$i] = $player_list[$key][$i][player];

//	print_r($team_info_list[$key]);
			//		echo "<br/>";
			//	print_r($player_list[$key]);
			//		echo "<br/>";
			//print_r($team_all_info);
		}
		$team_mark_sql  = "select mark from team";
		$team_mark_list = $this->oper->executeSQL($team_mark_sql);
		$array_length   = count($team_info_list[0])-1;
		foreach ($team_mark_list as $key => $value) {
			$team_info_list[$key][$array_length] = $team_mark_list[$key][mark];
			//	print_r($team_info_list[$key]);
			//echo "<br/>";
		}
		return $team_info_list;//要在表格中打印的数据信息数组
	}

}

//$oper = new judger(1,5);
//$oper->saveTeamScore();
//$oper->displayTable();
//$result = $oper->getResult();
//print_r($result);

?>
