<?php
/*
 * 表单
 */
?>
<form action="<?php echo $url; ?>"  method="post">
<label>用户名：</label>
<input type="text" name="name" />
<label>密码：</label>
<input type="password" name="pwd" />
<input type="submit" value="注册" />
</form>