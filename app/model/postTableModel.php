<?php
/*
 * 和日志有关的数据库表的操作 post content
 */
include("include.php");

class postClass implements insert    //将标题等存入post中
{
	function insertRow($columnValue)
	{
		$db = model::getDb();
		$postTitle = $columnValue[0];
		$userId = $columnValue[1];
		$sql = "INSERT INTO post (postTitle,userId) VALUES ('$postTitle',$userId)";
		$db->query($sql);
	}
}

class postContentClass implements insert  //将日志内容存入postcontent
{
	function insertRow($columnValue)
	{
		$db = model::getDb();
		$postContent = $columnValue[0];
		$postId = $columnValue[1];
		$sql = "INSERT INTO postcontent (content,postId) VALUES ('$postContent',$postId)";
		$db->query($sql);
	}
}

class getApostTitleClass implements selectA   //查询一篇日志的标题等数据
{
	/*
	 * 由于此处对类方法的使用不当，产生了一个花了很长时间才找出的bug。
	 * 若不使用此种用得并不好的MVC，这是一个很简单的操作，仅需数行代码即可实现功能。
	 */
	function getARow($columnValue)
	{
		$db = model::getDb();
		//var_dump($columnValue);   //test
		$title = $columnValue[0];
		//var_dump($title);    //test
		$sql = "SELECT * FROM post WHERE postTitle='$title'";
		$db->query($sql);
		$rows = $rows = $db->getRow();     //出现了重复代码，该消除它吗？
		//var_dump($rows);
		return $rows;
	}
}