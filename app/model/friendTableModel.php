<?php
/*
 * 操作friend table的类的集合
 */

class addFriendClass implements insert    //处理“关注”请求
{
	function insertRow($columnValue)
	{
		$db = model::getDb();
		$friendSrc = $columnValue[0];
		$friendDesc = $columnValue[1];
		$sql = "INSERT INTO friend (friendSrc,friendDesc) VALUES ($friendSrc,$friendDesc)";
		$db->query($sql);		
	}
}

class deleteFriendClass implements delete    //处理“取消关注”请求
{
	function delete($columnValue)
	{
		$db = model::getDb();
		$friendSrc = $columnValue[0];
		$friendDesc = $columnValue[1];
		$sql = "DELETE FROM friend WHERE friendSrc=$friendSrc AND friendDesc=$friendDesc";
		$db->query($sql);
	}
}

class myFollowsClass implements selectPart    //获取我“关注的人”
{
	static protected $friendSrc;
	function getPartRows($startId,$length)
	{
		//$name = $_SESSION["userName"];    //是否需要对此的session数据过滤？不需要，因为，经过过滤之后才存储；需要，理由？
		$friendSrc = self::$friendSrc;
		$db = model::getDb();
		$sql = "SELECT * FROM friend,user WHERE user.userId=friend.friendDesc AND friend.friendSrc=$friendSrc LIMIT $startId,$length";   //写出这样的语句有点困难
		$db->query($sql);
	}
	
	static function setFriendSrc($friendSrc)
	{
		self::$friendSrc = $friendSrc;
	}
}

class myFansClass implements selectPart    //获取“我的粉丝”，即关注我的人
{
	static protected $friendDesc;
	function getPartRows($startId,$length)
	{
		$friendDesc = self::$friendDesc;
		$db = model::getDb();
		$sql = "SELECT * FROM friend,user WHERE user.userId=friend.friendSrc AND friend.friendDesc=$friendDesc LIMIT $startId,$length";   //写出这样的语句有点困难
		$db->query($sql);
	}
	
	static function setFriendDesc($friendDesc)
	{
		self::$friendDesc = $friendDesc;
	}
}