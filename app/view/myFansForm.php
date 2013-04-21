<?php
/*
 * 显示我的粉丝
 */
include("userMenu.php");
class myFollowsFormTable extends tableClass
{
	function show_table_data()     //因为从数据库取出的数据不确定，此部分变数太大
	{
		//$this->object->performSelectPart($startId,$length);
		$db = model::getDb();
		while( $row=$db->getRow() )    //从结果集中取得一行
		{
			//if( $row["userName"] !== $_SESSION["userName"] )
			//{
			echo "<tr>";
			$name = "box[]";
			$value = $row["userId"];
			$this->show_table_checkbox($name,$value);    //输出多选框
			echo "<td>" . $row["userId"] . "</td>";
			echo "<td>" . $row["userName"] . "</td>";
			$id = $row["userId"];
			$this->show_table_operation($id);   //输出文字操作部分
			echo "</tr>";
			//}
		}
	}
}

$array_th = array("ID","用户名","操作");
$operation = array($_SERVER["SCRIPT_NAME"] . "?userIndex/spliceAFriend&friend="=>"取消关注");
$object = new userModel();

$length = 5;
$cpage = "cpage";
$result = $object->startIdPages($length,$cpage);   //计算总页数.$cpage是传递当前页码数的$_GET的键
var_dump($result);   //test
$keys = array_keys($result);
$startId = $keys[0];
$pages = $result[$startId];

$columnValue = array($_SESSION["userName"]);
$object->getMyFans($startId,$length,$columnValue);



$table = new myFollowsFormTable($array_th,$operation,$object);


$url = $_SERVER["SCRIPT_NAME"] . "?userIndex/myFansForm";

$page = new pageClass($url,$pages);

?>
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>?userIndex/spliceFriends"  method="post">
<table border="1" width="80%">
<tr>
	<td><?php $table->display(); ?></td>
</tr>
<tr>
	<td algin="center"><input type="submit" value="关注" /></td>
	<td colspan="3"><?php $page->display(); ?></td>
</tr>
</table>
</form>
