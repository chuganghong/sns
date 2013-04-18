<?php
abstract class controller
{
	protected $controller;
	
	function __construct($controller)
	{
		$this->controller = $controller;
	}
	
	/*
	abstract function registerForm();
	
	
	abstract function loginForm();	
	
	abstract function login();	
	*/
	
	function register()
	{
		
	}
	
	function setParams()
	{
		
	}	
	
}