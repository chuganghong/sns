<?php
/*
 * 注册用户后台首页菜单控制器
 */
class userIndex extends controller
{
	
	function postForm()   //写日志表单
	{
		require_once("postForm.php");
	}
	
	function addFriendForm()   //显示其他注册用户。$length设置一页显示多少个
	{
		require_once("addFriendForm.php");
	}	
	
}