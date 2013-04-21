<?php
/*
 * 数据库操作类
 */
class db
{
	protected $con;    //数据库连接
	protected $result;    //数据库操作结果
	
	function __construct($host,$root,$pwd,$database)
	{
		$this->con = mysql_connect($host,$root,$pwd) or die("Could not connect:" . mysql_error());
		mysql_select_db($database,$this->con) or die("Could not use" . $database . ":" . mysql_error());
	}
	
	function query($sql)
	{
		mysql_query("SET NAMES UTF8");
		$this->result = mysql_query($sql,$this->con);// or die("Query failed:" . mysql_error());
	}
	
	function getRow()    //从结果集中取得一行
	{
		$row = mysql_fetch_assoc($this->result);
		return $row;
	}
	
	function getSelectRows()
	{
		$rows = mysql_num_rows($this->result);
		return $rows;
	}
	
	function getAffectedRows()
	{
		$rows = mysql_affected_rows($this->con);
		return $rows;
	}
}