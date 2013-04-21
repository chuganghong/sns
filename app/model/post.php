<?php
/*
 * 处理发表日志请求
 */
include("include.php");
echo "start post.php<br />";    //test
$columnValue_1 = array($title);
$columnValue_2 = array($content);
$columnValue_3 = array($userName);

$userModel = new userModel();
$result = $userModel->savePost($columnValue_1,$columnValue_2,$columnValue_3);
print $result;