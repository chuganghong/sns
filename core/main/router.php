<?php
class router
{
    private $route;
	private $controller;
	private $action;
	private $params;
	
	function __construct()    //解析URL，我没有掌握这个函数，这些功能，我都能实现，难点是，我不能独立地按照它的逻辑写出它
	{
	    $path = array_keys($_GET);
		if( !isset($path[0]) )
		{
		    if( !empty($default_controller) )
			{
			    $path[0] = $default_controller;
			}
			else
			{
			    $path[0] = "index";
			}
		}
		$route = $path[0];		
		$this->route = $route;		
		$routeParts = explode("/",$route);
		$this->controller = $routeParts[0];
		$this->action = isset($routeParts[1])?$routeParts[1]:"base";
		array_shift($routeParts);
		array_shift($routeParts);
		$this->params = $routeParts;
	}
	
	function getAction()
	{
	    if( empty($this->action) )  //怎么会为空？构造函数里面不是赋值了吗？		
	    {
		    
		    $this->action = "base";
		}
		return $this->action;
	}
	
	function getController()
	{
	    return $this->controller;
	}
	
	function getParams()
	{
	    return $this->params;
	}
}