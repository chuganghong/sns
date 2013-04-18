<?php
/*
 * 表单
 */
?>
<script type="text/javascript" src="app/view/sns.js"></script>
<form action="<?php echo $url_1; ?>"  method="post">
<label>用户名：</label>
<input type="text" name="name" onblur='register("<?php echo $url_2; ?>","myDiv",this.value)'/>
<span id="myDiv"></span>

<label>密码：</label>
<input type="password" name="pwd" />
<input type="submit" value="注册" />
</form>