<?php
/*
class register
{
	protected $model;
	function __construct($controller)
	{
		$className = $controller . "Model";
		$this->model = new $className();
	}
	
	function reg($columnValue)
	{
		$result = $this->model->register($columnValue);   //注册：检测是否存在；若不存在，插入；若存在，提示。
		return $result;
	}
}
*/
function register($controller,$columnValue)
{
	$className = $controller . "Model";
	$model = new $className();
	
	$result = $model->isExist($columnValue);
	
	if( !$result )
	{
		$result = $model->register($columnValue);   //注册：检测是否存在；若不存在，插入；若存在，提示。
	}
		
	//return $result;
	echo $result;
	
}

$result = register($controller,$columnValue);
print $result;