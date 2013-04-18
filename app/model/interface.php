<?php
/*
 * 包含所有的接口
 */
/*数据库操作的接口 */
interface insert
{
	function insertRow($columnValue);
}

interface delete
{
	function delete($columnValue);
}

interface selectAll
{
	function getAllRows();    //获取所有的rows数量
}

interface selectPart
{
	function getPartRows($startId,$length);    //获取一部分
}

interface selectA   //选取一个
{
	function getARow($columnValue);
}

interface updateRows
{
	function update();    //更新
}