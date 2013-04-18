<?php
class initializer
{
	function __construct()
	{
		set_include_path(get_include_path() . PATH_SEPARATOR . "core/main");
		set_include_path(get_include_path() . PATH_SEPARATOR . "app/controller");
		set_include_path(get_include_path() . PATH_SEPARATOR . "app/model");
		set_include_path(get_include_path() . PATH_SEPARATOR . "app/view");
	}
}