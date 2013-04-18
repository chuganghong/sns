<?php
class admin extends controller
{
	function register_form()
	{
		$url = $_SERVER["SCRIPT_NAME"] . "?admin/register";
		require_once("register_form.php");
	}
	
	function login_form()
	{
		$url = $_SERVER["SCRIPT_NAME"] . "admin/login";
		require_once("login_form.php");
	}
	
	function login()
	{
		
	}
}