<?php
/*
 * 处理登录请求
 */
include("include.php");
$class = "aUserRowNP";
//var_dump($columnValue);   //test
$result = loginFunction($controller,$columnValue,$class);
echo $result;
//var_dump($result);   //test
/*
if( $result == 1 )   //登录成功
{
	//$str = "";
	Header("Location:" . $url);
}
else if( $result==0 )
{
	$str = "用户名或密码错误，请重试！";
}
*/

