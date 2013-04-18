<?php
require("core/main/ini.php");
$bool = session_start();  //开启会话

$initializer = new initializer();

require("include.php");

$router = loader::load("router");

dispatcher::dispatch($router);


