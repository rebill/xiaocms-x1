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
.m-form .formitm { padding: 10px 0px;height: 30px; line-height: 30px; border-bottom: 1px solid #eee; }
.m-form .formitm-1 { padding-left: 120px;height: 30px; }
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



</style>
</head>
<body>
<div class="m-install">
	<div class="install-head"> XiaoCMS 企业建站版安装向导 </div>
	<div class="install-model">
		<div class="m-form">

				<fieldset>
					<div class="formitm">
						<label class="lab" >后台地址：</label>
						<div class="ipt"><a href="http://<?php echo $_SERVER['SERVER_NAME'] ;?>/admin/">http://<?php echo $_SERVER['SERVER_NAME'] ;?>/admin/</a></div>
					</div>
					<div class="formitm">
						<label class="lab" >后台账号：</label>
						<div class="ipt"><?php echo $username ;?></div>
					</div>
					<div class="formitm">
						<label class="lab" >后台密码：</label>
						<div class="ipt"><?php echo $password ;?></div>
					</div>


					<div class="install-status"></div>
		<div class="install-button">
			
			<button class="u-install-btn" type="submit" name="submit"  onclick="window.location.href='?s=admin';return false">登录后台</button>
			
		</div>

				</fieldset>
			</form>

</body>
</html>