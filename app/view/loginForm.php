<!-- 表单。难点：按enter键时提交数据，如何实现？ -->
<script type="text/javascript" src="app/view/sns.js"></script>
<!--<form action="<?php echo $url_1; ?>" method="post"> -->
<span id="tip"></span>
<label>用户名：</label>
<input type="text" name="name" id="name" />
<label>密码：</label>
<input type="password" name="pwd" id="pwd" />
<input type="button" value="登录"  onclick='login("<?php echo $url_1; ?>","tip","<?php echo $url_2; ?>")' />
<!--</form>-->