<?php
/*
 * 函数集合
 */
function checkSession()    //检测是否开启了SESSION，若没有开启，则开启。
{
	if( !isset($_SESSION) )
	{
		session_start();
	}
}

function checkLogin($controller)   //检测是否登录
{
	$name = $controller . "Name";
	if( isset($_SESSION[$name]) )
	{
		//已经登录
		$result = true;
	}
	else
	{
		//没有登录
		$result = false;
	}
	return $result;
}

function loginFunction($controller,$columnValue,$class)   //登录
{
	$className = $controller . "Model";
	$model = new $className();
	$model->setSelectA($class);//若如此，此函数不能在admin登录时使用。除非将此值通过参数传递进来。但这么做，会不会增加使用此函数的难度？

	//$result = $model->isExist($columnValue);
	$result = $model->login($columnValue);   //登录：若输入的帐号密码和数据库的匹配，返回TRUE;否则，返回FALSE
	if( $result )
	{
		$name = $controller . "Name";
		checkSession();//检测是否开启了SESSION，若没有开启，则开启。//将不相关的功能封装成函数，这种做饭好不好？
		$_SESSION[$name] = $columnValue[0];   //1.有没有必要保存过滤后的数据？2.使用$columnValue[0]依赖对controller.php的了解，不太好。
		//$result =  "登录成功。";
		$result = 1;    //登录成功时
	}
	else
	{
		$result = 0;  //登录失败时
		//$result = "用户名或密码错误。";
	}
	//echo $result;  //test
	return $result;
	

}

function logoutFunction($controller)   //退出登录
{
	$name = $controller . "Name";
	unset($_SESSION[$name]);
	session_destroy();
}

function register($controller,$columnValue)   //注册
{
	$className = $controller . "Model";
	$model = new $className();

	//$result = $model->isExist($columnValue);
	$result = $model->register($columnValue);   //注册：检测是否存在；若不存在，插入；若存在，提示。


	return $result;
	//echo $result;
}

