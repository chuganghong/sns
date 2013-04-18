<?php
/*
 * 分页类
 */
//include("interface.php");
class pageClass implements display
{
	protected $cpage;      //当前页面
	protected $pages;      //总页数
	protected $url;        //“上一页”等文字的链接的组成部分
	protected $url_cpage;
	//protected $pre_page;    //上一页
	//protected $next_page;   //下一页

	function __construct($url,$pages)
	{
		$this->url = $url;
		$this->url_cpage = $url . "&cpage=";    //是否应该有&，不好处理，暂时先假设在此之前有其他的查询
		$this->pages = $pages;     //总页数
		$this->cpage = $_GET["cpage"];     //当前页码数
		
	}

	function display()     //实现接口
	{
		$this->show_page();
	}
	function show_page()       //显示完整的分页符
	{
		$this->show_js();//显示JS
		$this->show_pre_page();
		echo "&nbsp;";
		$this->show_next_page();
		echo "&nbsp;";
		$this->show_goto();
	}

	

	//显示上一页
	function show_pre_page()
	{
		if( !isset($this->cpage) || $this->cpage==1 )
		{
			$str = "<a href=\"" . $this->url . "\">上一页</a>";
			
		}
		else
		{
			$pre_page = $this->cpage-1;
			$str = "<a href=\"" . $this->url_cpage . $pre_page . "\">上一页</a>";
			
		}
		echo $str;
	}

	//显示下一页
	function show_next_page()
	{
		if( $this->cpage<$this->pages )
		{
			$next_page = $this->cpage+1;
			$str = "<a href=\"" . $this->url_cpage . $next_page . "\">下一页</a>";
			
		}
		else if( $this->cpage==$this->pages )
		{
			$str = "<a href=\"" . $this->url_cpage . $this->pages . "\">下一页</a>";
			//echo $str;
		}
		else
		{
			$str = "<a href=\"" . $this->url . "\">下一页</a>";
		}
		echo $str;
	}

	//显示跳转
	function show_goto()
	{
		echo "跳到";
		echo "<select id=\"mySelect\" onchange=\"goToPage()\" >";   //此处的goToPage()依赖外部的JS，要想办法解耦。
		for($i=1;$i<=$this->pages;$i++)
		{
			$value = $this->url_cpage . $i;
			if( $i == $_GET["cpage"] )
			{
				echo "<option selected=\"selected\" value=\"" .$value . "\" >第". $i . "页</option>";
			}
			else
			{
				echo "<option  value=\"" .$value . "\" >第". $i . "页</option>";
			}
		}
		echo "</select>";
	}
	
	//跳转依赖的JS
	function show_js()
	{
		$js = "<script>
				function goToPage()
				{
					var url = document.getElementById(\"mySelect\").value;
					location.href = url;
				}
				</script>
				";
		echo $js;
	}
}
/*
//TEST
$PAGE = NEW PAGECLASS("pageclass",5);
$PAGE->DISPLAY();
*/