<?php
/*
 * 取消对注册用户的关注
 * 和addFriend.php相比，出现了大量重复代码，只有调用的userModel的方法不同，该如何处理这种代码？
 */
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
		$result = $userModel->spliceAFriend($columnValue);   //关注一个注册用户
		print $result;
	}
}
else
{
	$columnValue = array($friendSrc,$friendDesc);
	$result = $userModel->spliceAFriend($columnValue);   //关注一个注册用户
	print $result;
}
