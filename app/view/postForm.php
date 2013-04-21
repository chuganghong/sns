<?php
/*
 * 注册用户写日志表单
 */
require_once("userMenu.php");
$url = $_SERVER["SCRIPT_NAME"] . "?userIndex/post";
?>

<form action="<?php echo $url; ?>"  method="post">
<labe>标题:</labe>
<input type="text" name="title" />
<textarea name="content" cols="70" rows="15"></textarea>
<input type="submit" value="发表" />
</form>