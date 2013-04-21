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

	function addAFriend()    //关注一个用户
	{
		$friendDesc = $_GET["friend"];
		//var_dump($friendDesc);  //test
		require("addFriend.php");
	}
	
	function addFriends()    //批量关注其他用户
	{
		$friendDesc = $_POST["box"];
		require_once("addFriend.php");
	}
	
	function spliceAFriend()    //取消对一个用户的关注
	{
		$friendDesc = $_GET["friend"];
		require("spliceFriend.php");		
	}
	
	function spliceFriends()    //批量取消对其他用户的关注
	{
		if( isset($_POST["box"]) )
		{
			$friendDesc = $_POST["box"];
		
			require("spliceFriend.php");	
		}
	}
	
	function myFollowsForm()    //显示我关注的人
	{
		require_once("myFollowsForm.php");
	}
	
	function myFansForm()   //显示我的粉丝
	{
		require_once("myFansForm.php");
	}
	
	function post()   //发表日志
	{
		echo "start post<br />";  //test
		$title = $_POST["title"];
		$content = $_POST["content"];
		$userName = $_SESSION["userName"];
		require_once("post.php");
	}
	
}