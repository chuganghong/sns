<?php
/*
 * 处理关注请求：关注一个用户
 * 这是面向过程的方法，这样的代码好不好？
 */
//var_dump($_SESSION["userName"]);//test
$columnValue = array($_SESSION["userName"]);
$userModel = new userModel();
$rows = $userModel->getAUser($columnValue);    //获取一个用户的所有资料
$friendSrc = $rows["userId"];
//$friendDesc = $_GET["friend"];//在controller userIndex.php中提供

if( is_array($friendDesc) )
{
	foreach( $friendDesc as $value )
	{
		$columnValue = array($friendSrc,$value);
		$result = $userModel->addAFriend($columnValue);   //关注一个注册用户
		print $result;
	}
}
else
{
	$columnValue = array($friendSrc,$friendDesc);
	$result = $userModel->addAFriend($columnValue);   //关注一个注册用户
	print $result;
}


