<?php
/*
 * 操作user表
 */
include("include.php");
class deleteNothing implements delete
{
	function delete($columnValue)
	{
		//do nothing
	}
}

class selectPartNoting implements selectPart
{
	function getPartRows($startId,$length)
	{
		//do nothing
	}
}

class updateNothing implements updateRows
{
	function update()
	{
		//do nothing
	}
}


class allUsersRows implements selectAll    //获取user表中所有用户的总数
{
	function getAllRows()   //获取所有的rows数量
	{
		$db = model::getDb();
		$sql = "SELECT COUNT(*) AS rows FROM user";
		$db->query($sql);
		$rows = $db->getRow();    //从结果集中取得一行
		$num = $rows["rows"];
		return $num;      //所有注册用户的数量
	}
}

class aUserRow implements selectA   //选取一个//查询数据库是否存在某用户名时用到，用于注册时
{
	function getARow($columnValue)
	{
		//$name = $this->filterData($columnValue);   //过滤数据，$data是字符串
		$db = model::getDb();
		$name = $columnValue[0];
		var_dump($name);   //test
		$sql = "SELECT COUNT(*) AS rows FROM user WHERE userName='$name'";
		$db->query($sql);
		$rows = $db->getRow();    //从结果集中取得一行
		var_dump($rows);   //test
		$num = $rows["rows"];
		var_dump($num);   //test
		return $num;      //此用户名在数据库中的个数
	}
}

class aUserRowNP implements selectA //选取一个。查询数据库是否存在某用户名和其匹配的密码，用于登录
{
	function getARow($columnValue)
	{
		//$data = $this->fileterInput($columnValue);
		$db = model::getDb();
		$data = $columnValue;
		$name = $data[0];
		$pwd = MD5($data[1]);
		$sql = "SELECT COUNT(*) AS rows FROM user WHERE userName='$name' AND userPwd='$pwd'";
		$db->query($sql);
		$rows = $db->getRow();     //出现了重复代码，该消除它吗？
		$num = $rows["rows"];
		return $num;
	}
}

class insertUser implements insert     //查询数据库是否存在某用户名时用到，注意用于注册时
{
	function insertRow($columnValue)
	{
		//$columnValue = $this->filterInput($columnValue);  //过滤数据，$input可能是数组
		$db = model::getDb();
		$name = $columnValue[0];
		$pwd = MD5($columnValue[1]);  //加密
		$sql = "INSERT INTO user ( userName,userPwd ) VALUES ('$name','$pwd')";
		//echo "执行insert<br />";  //test
		$db->query($sql);		
	}
}
