<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>管理员登陆</title>
<meta name="author" content="xiaocms" />
<meta name="copyright" content="Copyright (c)  www.xiaocms.com All Rights Reserved." />
<link href="<?php echo ADMIN_DIR; ?>/img/login/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo ADMIN_DIR; ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $("#username").focus();
});
</script>
</head>
<body>



		<div class="login">
    <form action="" method="post">
				<table>
					<tr>
						<td width="190" rowspan="2" align="center" valign="bottom">
						</td>
						<th>用户名:</th>
						<td><input type="text" id="username"  name="username"  class="text" value="" maxlength="20" />
						</td>
					</tr>
					<tr>
						<th>密&nbsp;&nbsp;&nbsp;码:</th>
						<td><input  name="password" type="password"  class="text" value="" maxlength="20" autocomplete="off" /></td>
					</tr>
					
						<tr>
							<td>&nbsp;</td>
							<th>验证码:</th>
							<td><input type="text" name="code" class="text captcha" maxlength="4" autocomplete="off" /><img id="code" src="<?php echo url("api/checkcode/", array("width"=>85, "height"=>26)); ?>" align="absmiddle" title="看不清楚？换一张" onclick="document.getElementById('code').src='<?php echo url("api/checkcode/", array("width"=>85, "height"=>26)); ?>&'+Math.random();" style="cursor:pointer; margin-top:-3px;">
							</td>
						</tr>
					

					<tr>
						<td>
							&nbsp;
						</td>
						<th>
							&nbsp;
						</th>
						<td>
							<input type="button" class="homeButton" value="" onclick="location.href='/'" /><input type="submit" class="loginButton" value="登录" name="submit"  />
						</td>
					</tr>
				</table>
			</form>
		</div>
	<div class="powered"><a href="http://www.xiaocms.com" target="_blank">Copyright &copy; <?php echo date('Y'); ?> www.XiaoCMS.com All Rights Reserved.</a></div>


</body>
</html>

