/**
 * 
 */
function $(id)
{
	return document.getElementById(id);
}

function register(url,id,value)
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
	
	
	
	xmlhttp.send("name=" + value);
	
	
	
}