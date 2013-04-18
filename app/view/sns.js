/**
 * 
 */
function $(id)
{
	return document.getElementById(id);
}

function checkReg(url,id,key,value)    //检测用户名是否可用
{
	var url = url;
	if( window.XMLHttpRequest )
	{
		var xmlhttp = new XMLHttpRequest();
	}
	else
	{
		var xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
	}
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//xmlhttp.onreadyStateChange = function()
	xmlhttp.onreadystatechange = function()
	{
		//alert(xmlhttp.readyState);   //test
		//alert(xmlhttp.status);   //test
		if( xmlhttp.readyState==4 && xmlhttp.status==200 )
		{
			$(id).innerHTML = xmlhttp.responseText;
			//alert(xmlhttp.responseText);
		}
		else
		{
			$(id).innerHTML = "正则检测用户名是否可用..";
		}
	}
	
	
	
	xmlhttp.send( key + "=" + value);	
	
}

function login(url_1,id,url_2)    //登录
{
	if( window.XMLHttpRequest )
	{
		var xmlhttp = new XMLHttpRequest();
	}
	else
	{
		var xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("POST",url_1,true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{		
		if( xmlhttp.readyState==4 && xmlhttp.status==200 )
		{
			alert(xmlhttp.responseText);//test
			if( xmlhttp.responseText == 1 )
			{				
				//$(id).innerHTML = xmlhttp.responseText;
				location.href = url_2;
				
			}
			else if( xmlhttp.responseText == 0 )
			{
				var msg = "密码或用户名错误，请重试！";
				$(id).innerHTML = msg;
			}			
		}
		else
		{
			$(id).innerHTML = "wait..";
		}		
	}
	
	var nameValue = $("name").value;   //要想出办法，使此处的ID不依赖外面的ID
	var pwdValue = $("pwd").value;
	xmlhttp.send("name=" + nameValue + "&" + "pwd=" + pwdValue );
	
}