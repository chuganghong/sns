<?php
/*
 * 检测是否存在某用户名
 */
function isExist($controller,$columnValue)
{
	$className = $controller . "Model";
	$model = new $className();

	$result = $model->isExist($columnValue);
	
	return $result;
	
}

$result = isExist($controller,$columnValue);
echo $result;