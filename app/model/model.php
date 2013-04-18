<?php
/*
 * model类
 */
abstract class model
{
	static protected $db;     //数据库操作类
	protected $insert;     //操作数据中的表格的对象
	protected $delete;
	protected $selectAll;
	protected $selectPart;
	protected $selectA;
	protected $update;
	
	
	/*
	function __construct()
	{
		$this->db = new db("localhost","root","","sns");
		/*
		$this->insert = new $insert();
		$this->delete = new $delete();
		$this->selectAll = new $selectAll();
		$this->selectPart = new $selectPart();
		$this->selectA = new $selectA();
		$this->update = new $update();
		
	}
	*/
	
	static function getDb()
	{
		return self::$db;
	}
	
	function setInsert($insert)
	{
		$this->insert = new $insert();
	}
	
	function setDelete($delete)
	{
		$this->delete = new $delete();
	}
	
	function setSelectAll($selectAll)
	{
		$this->selectAll = new $selectAll();
	}
	
	function setSelectPart($selectPart)
	{
		$this->selectPart = new $selectPart();
	}
	
	function setSelectA($selectA)
	{
		$this->selectA = new $selectA();
	}
	
	function setUpdate($update)
	{
		$this->update = new $update();
	}
	
	function performInsert($columnValue)
	{
		$this->insert->insertRow($columnValue);
	}
	
	function performDelete($columnValue)
	{
		$this->delete->delete($columnValue);
	}
	
	function performSelectAll()
	{
		$rows = $this->selectAll->getAllRows();    //获取所有的rows数量
		return $rows;
	}
	
	function performSelectPart($startId,$length)
	{
		$this->selectPart->getPartRows($startId,$length);    //获取一部分
	}
	
	function performSelectA($columnValue)     //选取一个
	{
		$rows = $this->selectA->getARow($columnValue);
		return $rows;
	}
	
	function performUpdate()
	{
		$this->update->update();    //更新
	}
	
	function isExist($columnValue)    //检测数据库中是否存在某用户名
	{
		$columnValue = 	$this->filterInput($columnValue);    //过滤数据，$input可能是数组
		$rows = $this->performSelectA($columnValue);
		//var_dump($rows);   //test
		if( $rows>0 )
		{
			$str =  "已经存在此用户名。";    //此处应该输出数字代码还是文字提示信息？
		}
		else
		{
			$str = "可以使用。";
		}
		return $str;
	}
	
	function register($columnValue)   //注册：检测是否存在；若不存在，插入；若存在，提示。
	{
		//$data = $this->filterInput($columnValue);    //过滤数据，$input可能是数组	
		$columnValue = 	$this->filterInput($columnValue);    //过滤数据，$input可能是数组
		$this->performInsert($columnValue);
		$num = self::$db->getAffectedRows();
		if( $num>0 )
		{
			//echo "注册成功。";
			$str = "注册成功。";
		}
		else
		{
			//echo "注册失败。请重试！";
			$str = "注册失败，请重试！";
		}
		return $str;		
	}
	
	function login($columnValue)    //login
	{
		$columnValue = $this->filterInput($columnValue);
		$rows = $this->performSelectA($columnValue);
		if( $rows>0 )
		{
			return true;     //登录成功
		}
		else
		{
			return false;   //登录失败
		}
	}
	
	function startIdPages($length,$cpage)   //总页数，$startId
	{
		$rows = $this->performSelectAll();
		$num = ceil($rows/$length);
		
		if( !isset($_GET[$cpage]) )
		{
			$_GET[$cpage] = 1;
		}
		$startId = ($_GET[$cpage]-1)*$length;
		$result[$startId] = $num;
		return $result;
	}
	function filterData($data)//过滤数据，$data是字符串
	{
		$data = trim($data);
		$data = mysql_real_escape_string($data);
		return $data;
	}
	
	function filterInput($input)//过滤数据，$input可能是数组
	{
		if( is_array($input) )
		{
			foreach( $input as $value )
			{
				$value = $this->filterData($value);
				$newInput[] = $value;
			}
		}
		else
		{
			$newInput = $this->filterData($input);
		}
		return $newInput;
	}
	
	/*
	function secrete($data)   //加密
	{
		$data = MD5($data);
		return $data;
	}
	*/
}