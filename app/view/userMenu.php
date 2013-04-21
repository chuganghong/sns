<?php
/*
 * 注册用户后台菜单
 */
?>
<ul>
	<li>首页</li>
	<li>发信</li>
	<li>收信</li>
	<li>日志</li>
	<li><a href="<?php echo $_SERVER["SCRIPT_NAME"]; ?>?userIndex/postForm">写日志</a></li>
	<li><a href="<?php echo $_SERVER["SCRIPT_NAME"]; ?>?userIndex/addFriendForm">找朋友</a></li>
	<li><a href="<?php echo $_SERVER["SCRIPT_NAME"]; ?>?userIndex/myFollowsForm">朋友</a></li>
	<li><a href="<?php echo $_SERVER["SCRIPT_NAME"]; ?>?userIndex/myFansForm">粉丝</a></li>
	<li><a href="<?php echo $_SERVER["SCRIPT_NAME"]; ?>?user/logout">退出</a></li>
</ul>