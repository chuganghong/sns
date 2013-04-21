<?php
/*
 * 用户模型
 */
include("include.php");
class userModel extends model
{
	function __construct()
	{
		self::$db = new db("localhost","root","","sns");
		
		$this->insert = new insertUser();
		$this->delete = new deleteNothing();
		$this->selectAll = new allUsersRows();
		$this->selectPart = new selectPartNoting();
		$this->selectA = new aUserRow();
		$this->update = new updateNothing();
	}

	function getMyFollows($startId,$length,$columnValue)   //获取我关注的人
	{
		$rows = $this->getAUser($columnValue);    //获取一个用户的所有资料
		$friendSrc = $rows["userId"];    //来自数据库的数据需要过滤吗？
		
		$this->setSelectPart("myFollowsClass");
		myFollowsClass::setFriendSrc($friendSrc);
		$this->performSelectPart($startId,$length);
	}
	
	function getMyFans($startId,$length,$columnValue)    //获取我的粉丝   ; 又出现重复代码
	{
		$rows = $this->getAUser($columnValue);    //获取一个用户的所有资料
		$friendDesc = $rows["userId"];    //来自数据库的数据需要过滤吗？
		
		$this->setSelectPart("myFansClass");
		myFansClass::setFriendDesc($friendDesc);
		$this->performSelectPart($startId,$length);
	}
	
	function addAFriend($columnValue)   //关注一个注册用户
	{
		$db = self::getDb();
		//$model = new userModel();
		$this->setInsert("addFriendClass");
		$this->performInsert($columnValue);
		$rows = $db->getAffectedRows();
		if( $rows>0 )
		{
			$result = true;   //关注成功
		}
		else
		{
			$result = false;    //关注失败
		}
		return $result;
	}
	
	function spliceAFriend($columnValue)   //取消对一个用户的关注
	{
		$db = self::$db;
		$this->setDelete("deleteFriendClass");
		$this->performDelete($columnValue);
		$rows = $db->getAffectedRows();
		if( $rows>0 )
		{
			$result = true;   //取消关注成功
		}
		else
		{
			$result = false;    //取消关注失败
		}
		return $result;
		
	}
	
	function getAUser($columnValue)    //获取一个用户的所有资料
	{
		$this->setSelectA("aUserNI");
		$rows = $this->performSelectA($columnValue);     //选取一个
		return $rows;
		
	}
	
	function getAPost($columnValue)    //获取一篇日志的标题等数据
	{
		$this->setSelectA("getApostTitleClass");
		$rows = $this->performSelectA($columnValue);     //选取一个
		//var_dump($rows);   //test
		return $rows;
	}
	
	function savePostTitleEtc($columnValue_1)   //发表日志，存储标题等
	{
		$db = self::$db;
		
		$this->setInsert("postClass");
		$this->performInsert($columnValue_1);
		
		$rows = $db->getAffectedRows();
		if( $rows>0 )
		{
			$result = true;   //存储标题等成功
		}
		else
		{
			$result = false;    //存储标题等失败
		}
		//var_dump($result);   //test
		return $result;
	}
	
	function savePostContent($columnValue_2)    //发表日志，存储日志内容
	{
		$db = self::$db;
		
		$this->setInsert("postContentClass");
		$this->performInsert($columnValue_2);
		
		$rows = $db->getAffectedRows();
		if( $rows>0 )
		{
			$result = true;   //存储日志内容成功
		}
		else
		{
			$result = false;    //存储日志内容失败
		}
		return $result;
	}
	
	function savePost($columnValue_1,$columnValue_2,$columnValue_3)
	{
		/*
		 * $columnValue_1标题,$columnValue_2日志内容,$columnValue_3查找用户ID的条件数据。三者都是数组形式
		 */
		
		//先存储标题等，再获取此日志的ID
		$rows = $this->getAUser($columnValue_3);    //获取一个用户的所有资料
		$userId = $rows["userId"];    //来自数据库的数据需要过滤吗？
		$title = $columnValue_1[0];
		//var_dump($title);   //test
		$columnValue_1 = array($title,$userId);
		//var_dump($columnValue_1);   //test
				
		/*
		$result = $this->savePostTitleEtc($columnValue_1);   //发表日志，存储标题等
		
		if( !$result )
		{
			$msg = "发表日志失败。存储标题等失败。";
			exit($msg);
		}*/
		$msg = "发表日志失败。存储标题等失败。";
		$result = $this->savePostTitleEtc($columnValue_1) or exit($msg);//发表日志，存储标题等
		
		
		//再获取此日志的ID
		//var_dump($title);   //test
		$title = array($title);
		//var_dump($title);   //test
		$rows = $this->getAPost($title);    //获取一篇日志的标题等数据
		//var_dump($rows);   //test
		$postId = $rows["postId"];     //日志的ID
		//var_dump($postId);   //test
		
		//连同日志标题ID一起存储到postcontent
		
		$content = $columnValue_2[0];    //日志内容
		$columnValue_2 = array($content,$postId);
		//var_dump($columnValue_2);   //test
		
		$result = $this->savePostContent($columnValue_2);    //发表日志，存储日志内容
		
		if( $result )
		{
			$msg = "发表日志成功。存储内容成功。";
		}
		else
		{
			$msg = "发表日志失败。存储内容失败。";
		}
		return $msg;
		
		
		
		
		//先存储日志内容。若先存储日志内容，获取日志内容ID时，将把数据量很大的日志内容作为条件来查询，查询效果可能不好。
		//$this->savePostContent($columnValue_2);
		
		//再获取此日志内容的ID
		
	}
	
	function test()
	{
		echo "Hello,world<br />";
	}
}

