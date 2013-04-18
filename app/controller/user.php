<?php
class user extends controller
{
	function register_form()
	{
		$url_1 = $_SERVER["SCRIPT_NAME"] . "?user/register";
		$url_2 = $_SERVER["SCRIPT_NAME"] . "?user/checkReg";
		require_once("register_form.php");
	}
	
	function login_form()
	{
		$url = $_SERVER["SCRIPT_NAME"] . "?user/login";
		require_once("login_form.php");
	}
	
	function checkReg()     //检测是否存在某用户名
	{
		if( isset($_POST["name"]) )
		{
			$columnValue = array($_POST["name"],"");
		}
		$controller = __CLASS__;
		require_once("checkReg.php");
	}
	
	function register()
	{
		if( isset($_POST) )
		{
			$columnValue = array($_POST["name"],$_POST["pwd"]);
			
		}
			
		$controller = __CLASS__;
		require_once("register.php");
	}
	
	function login()
	{
		/*
		 * 对user和admin的登录请求，是应该用两个不同的文件来处理，还是用一个文件来处理？
		 * 若用一个文件来处理，可以少用一个文件，但是却让一个文件太长。
		 * 若用两个文件来处理，那么，出现重复代码，
		*/
		require_once("login.php");
		
	}
	
	function base()
	{
		
	}
}