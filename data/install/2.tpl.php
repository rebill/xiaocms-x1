<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>XiaoCMS 企业建站版安装向导 </title>
<meta name="author" content="xiaocms" />
<meta name="copyright" content="Copyright (c)  www.xiaocms.com All Rights Reserved." />
<meta name="description" content="欢迎使用XiaoCMS 官方网站：http://www.xiaocms.com"/>
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
<meta name="viewport" content="width=device-width"/>
<script type="text/javascript">
function $(ID) {return document.getElementById(ID);}
</script>
<style >
/* reset */
html,body,h1,h2,h3,h4,h5,h6,div,dl,dt,dd,ul,ol,li,p,blockquote,pre,hr,figure,table,caption,th,td,form,fieldset,legend,input,button,textarea,menu{margin:0;padding:0;}
header,footer,section,article,aside,nav,hgroup,address,figure,figcaption,menu,details{display:block;}
table{border-collapse:collapse;border-spacing:0;}
caption,th{text-align:left;font-weight:normal;}
html,body,fieldset,img,iframe,abbr{border:0;}
i,cite,em,var,address,dfn{font-style:normal;}
[hidefocus],summary{outline:0;}
li{list-style:none;}
h1,h2,h3,h4,h5,h6,small{font-size:100%;}
sup,sub{font-size:83%;}
pre,code,kbd,samp{font-family:inherit;}
q:before,q:after{content:none;}
textarea{overflow:auto;resize:none;}
label,summary{cursor:default;}
a,button{cursor:pointer;}
h1,h2,h3,h4,h5,h6,em,strong,b{font-weight:bold;}
del,ins,u,s,a,a:hover{text-decoration:none;}
body,textarea,input,button,select,keygen,legend{font:12px/1.14 arial,\5b8b\4f53;color:#333;outline:0;}
a,a:hover{color:#333;}
body { background-color: #b7cad3;}
.m-install { width:700px;background-color:#fafafa; margin-left:auto; margin-right: auto; margin-top:8%; margin-bottom:30px; box-shadow: 0 0 10px #333;border-radius:5px; padding-bottom:15px; color:#666;}
.m-install .install-head { background-color:#f0f0f0; height:50px;line-height:50px; padding-left:10px; font-size:16px; border-bottom:1px solid #ebebeb; border-radius:5px 5px 0px 0px; text-align:center; color:#909090; text-shadow:#fff 1px 1px 0px;}
.m-install .install-model .formitm{ padding-left:100px; }
.m-install .install-button { margin-left:auto; margin-right:auto; margin-top:10px; text-align:center; }
.m-install .u-install-btn { padding:0px; margin:0px; background-color:#5aa6f4; width:200px; height:45px; line-height:45px; border:0px; font-size:14px; text-align:center; color:#FFF; border-radius: 5px;text-shadow:#4c95e1 -1px -1px 0px; }
.m-install .u-install-btn:hover { border-bottom:5px solid #4c95e1; }
.m-install .install-status { margin-left:auto; margin-right:auto; line-height:35px; font-size:12px; text-align:center; color:#F00}
.m-install .install-copyright { line-height:25px; padding-top:10px; font-size:10px; text-align:center; color:#999; display:none}
.m-install .install-copyright a { color:#999}
/* 表单 */
.m-form { line-height: 29px; color: #555; border-top: 1px solid #eee; }
.m-form .formitm { padding: 10px 0px; line-height: 30px; border-bottom: 1px solid #eee; }
.m-form .formitm-1 { padding-left: 120px; }
.m-form .formitm-2 { border-bottom:none;}
.m-form .lab { float: left; width: 110px; margin-right: -90px; text-align: right; font-weight: bold; }
.m-form .ipt { margin-left: 120px; }
.m-form .ipt * { vertical-align: middle; }
.m-form .ipt a, .m-form .ipt a:hover { text-decoration: none; color: #3891eb; }
.m-form .ipt .suffix { margin: 0 0 0 5px; color: #777; }
.m-form .ipt .suffix a { padding: 0px; }
.m-form .ipt .u-btn { margin-top: -2px; *margin-top:0px;
}
.m-form .ipt p { line-height: 22px; color: #999; }
.m-form .tip { padding-top: 10px; }
.m-form .tip input { margin: 0 5px 3px 0; }
.m-form .status { padding-left: 10px; color: #093 }
.m-form .status-err { color: #F00 }
.m-fieldset {  padding:10px; padding-bottom:0px; margin-top:10px; padding-left:0px;}
.m-fieldset legend { font-weight:bold; color:#399dd8; }
.u-btn-sm { padding: 0 10px; height: 22px; line-height: 22px; }

/* 文本输入框 */
.u-ipt { width: 180px; padding: 5px; height: 17px; border: 1px solid #D9D9D9; border-top-color: #c0c0c0; line-height: 17px; font-size: 14px; color: #777; background: #fff; margin-right: 5px; vertical-align: middle; }
.u-ipt-1 { width: 50px; }
.u-ipt-2 { width: 100px; }
.u-ipt-3 { width: 150px; }
.u-ipt-4 { width: 200px; }
.u-ipt-5 { width: 250px; }
.u-ipt-6 { width: 300px; }
.u-ipt-7 { width: 400px; }
.u-tta { width: 180px; padding: 5px; height: 50px; border: 1px solid #D9D9D9; border-top-color: #c0c0c0; line-height: 17px; font-size: 14px; color: #777; background: #fff; vertical-align: middle; margin-right: 5px; }
.u-tta-4 { width: 200px; height: 60px; }
.u-tta-5 { width: 250px; height: 70px; }
.u-tta-6 { width: 300px; height: 80px; }
.u-ipt-7 { width: 400px; height: 100px; }
.u-tta-err { border-color: #c00 #e00 #e00; }

</style>
</head>
<body>
<div class="m-install">
	<div class="install-head"> XiaoCMS 企业建站版安装向导 </div>
	<div class="install-model">
		<div class="m-form">
        <iframe id="db_tester" name="db_tester" style="display:none;"></iframe>
		<form action="" method="post" id="db_form" target="db_tester">
			<input type="hidden" name="step" value="db_test"/>
			<input type="hidden" name="tdb_host" id="tdb_host"/>
			<input type="hidden" name="tdb_user" id="tdb_user"/>
			<input type="hidden" name="tdb_pass" id="tdb_pass"/>
			<input type="hidden" name="tdb_name" id="tdb_name"/>
			<input type="hidden" name="ttb_pre"  id="ttb_pre"/>
			<input type="hidden" name="ttb_test" id="ttb_test"/>
		</form>

		
			<form  action="" method="post" id="dform" onsubmit="return check();">
			<input type="hidden" name="step" value="3">
			<?php if(!$error) { ?>
				<fieldset>
					<div class="formitm">
						<label class="lab" >数据库主机：</label>
						<div class="ipt"><input name="db_host" type="text" id="db_host" value="localhost" class="u-ipt" /></div>
					</div>
					<div class="formitm">
						<label class="lab" >数据库用户名：</label>
						<div class="ipt"><input name="db_user" type="text" id="db_user" value="" class="u-ipt" /></div>
					</div>
					<div class="formitm">
						<label class="lab" >数据库密码：</label>
						<div class="ipt"><input name="db_pass" type="text" id="db_pass" value="" class="u-ipt" /></div>
					</div>
					<div class="formitm">
						<label class="lab" >数据库名：</label>
						<div class="ipt">
							<input name="db_name" type="text" id="db_name" value="" onblur="$('ttb_test').value=0;test();void(0);" class="u-ipt" /></div>
					</div>
					<div class="formitm">
						<label class="lab" >表前缀：</label>
						<div class="ipt"><input name="tb_pre" type="text" id="tb_pre" value="xiao_" class="u-ipt" />
						<span><input type="button" value="测试数据库连接" onclick="$('ttb_test').value=1;test();void(0);" class="u-btn-sm"/></span>
					</div>
					</div>


					<div class="formitm">
						<label class="lab" >后台帐号：</label>
						<div class="ipt"><input name="username" type="text" id="username" value="admin" class="u-ipt" />
						</div>
					</div>
					<div class="formitm">
						<label class="lab" >后台密码：</label>
						<div class="ipt"><input name="password" type="text" id="password" value="admin" class="u-ipt" />
						</div>
					</div>
					<div class="formitm">
						<label class="lab" >安装测试数据：</label>
						<div class="ipt">
							<label class="u-opt"><input name="import" type="checkbox" id="checkbox" value="1" checked align="bottom"/></label>
						</div>
					</div>
	                <div id="tip" style="display:none">
					<div class="formitm">
						<label class="lab" ></label>
						<div class="ipt">
						<span  style="color:#060;font-weight: 700;" >安装中...<img src="<?php echo ADMIN_DIR; ?>/img/loading.gif"></span>
						</div>
					</div>
					</div>
					<div class="install-status"></div>
		<div class="install-button">
			
			<button class="u-install-btn" type="submit" name="submit"  id="submit">安装</button>
			
		</div>
			<?php } else { ?>
		<div class="install-button">
		<div class="install-status"><?php echo $error; ?></div>
		</div>
			<?php } ; ?>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
function test() {
	if($('db_host').value == '') {
		alert('请填写数据库服务器');
		$('db_host').focus();
		return;
	}
	$('tdb_host').value = $('db_host').value;

	if($('db_user').value == '') {
		alert('请填写数据库用户名');
		$('db_user').focus();
		return;
	}
	$('tdb_user').value = $('db_user').value;
	$('tdb_pass').value = $('db_pass').value;

	if($('db_name').value == '') {
		alert('请填写数据库名');
		$('db_name').focus();
		return;
	}
	$('tdb_name').value = $('db_name').value;

	if($('tb_pre').value == '') {
		alert('请填写数据表前缀');
		$('tb_pre').focus();
		return;
	}
	$('ttb_pre').value = $('tb_pre').value;
	$('db_form').submit();
}
function check() {
	if($('db_host').value == '') {
		alert('请填写数据库服务器');
		$('db_host').focus();
		return false;
	}

	if($('db_user').value == '') {
		alert('请填写数据库用户名');
		$('db_user').focus();
		return false;
	}

	if($('db_name').value == '') {
		alert('请填写数据库名');
		$('db_name').focus();
		return false;
	}

	if($('tb_pre').value == '') {
		alert('请填写数据表前缀');
		$('tb_pre').focus();
		return false;
	}

	if($('username').value.length < 5) {
		alert('后台帐号最少5位');
		$('username').focus();
		return false;
	}

	if(!$('username').value.match(/^[a-z0-9]+$/)) {
		alert('后台帐号只能使用小写字母(a-z)、数字(0-9)');
		$('username').focus();
		return false;
	}

	if($('password').value.length < 5) {
		alert('后台密码最少5位');
		$('password').focus();
		return false;
	}
	
	$('tip').style.display = '';
	$('submit').disabled = true;
	return true;
}
</script>
</body>
</html>