<?php
abstract class controller
{
	protected $controller;
	
	function __construct($controller)
	{
		$this->controller = $controller;
	}
	
	abstract function register_form();
	
	
	abstract function login_form();	
	
	abstract function login();	
	
	function register()
	{
		
	}
	
	function setParams()
	{
		
	}	
	
}