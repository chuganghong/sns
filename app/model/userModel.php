<?php
/*
 * 用户模型
 */
include("include.php");
class userModel extends model
{
	function __construct()
	{
		self::$db = new db("localhost","root","","sns");
		
		$this->insert = new insertUser();
		$this->delete = new deleteNothing();
		$this->selectAll = new allUsersRows();
		$this->selectPart = new selectPartNoting();
		$this->selectA = new aUserRow();
		$this->update = new updateNothing();
	}
	
	function test()
	{
		echo "Hello,world<br />";
	}
}

/*
$insert = "insertUser";
$delete = "deleteNothing";
$selectAll = "allUsersRows";
$selectPart = "selectPartNoting";
$selectA = "aUserRow";
$update = "updateNothing";
$userModel = new userModel($insert,$delete,$selectAll,$selectPart,$selectA,$update);
*/
