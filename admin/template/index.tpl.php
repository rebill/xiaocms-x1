<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->site_config['SITE_NAME'];?> - 后台管理中心</title>
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_DIR; ?>/img/backend.css" />
<script type="text/javascript" src="<?php echo ADMIN_DIR; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_DIR; ?>/js/dialog.js?skin=green"></script>
</head>
<body scroll="no">
<!--头部开始-->
<div id="head">
  <h1>XiaoCms</h1>
  <div id="menu_position">
    <ul id="menu">
        <li id="_MP104" ><a href="javascript:_MP(104,'?s=admin&a=config&type=1');" >设置</a>
          <ul>
          <li id="_MP1041" ><a href="javascript:_MP(1041,'?s=admin&a=config&type=1');" >系统设置</a></li>
          <li id="_MP1042" ><a href="javascript:_MP(1042,'?s=admin&a=config&type=2');" >水印设置</a></li>
          <li id="_MP1043" ><a href="javascript:_MP(1044,'?s=admin&a=config&type=3');" >后台密码</a></li>
          <li id="_MP1044" ><a href="javascript:_MP(1044,'?s=admin&a=config&type=4');" >会员配置</a></li>
          <li id="_MP1045" ><a href="javascript:_MP(1045,'?s=admin&a=config&type=5');" >URL设置</a></li>
          <li id="_MP107" ><a href="javascript:_MP(107,'?s=admin&a=cache');" >更新缓存</a></li>
          <li id="_MP403" ><a href="javascript:_MP(403,'?s=admin&c=Content&a=updateurl');" >更新内容URL</a></li>
          <li id="_MP403" ><a href="javascript:_MP(403,'?s=admin&c=Database');" >数据库备份</a></li>
          <li id="_MP1046" ><a href="javascript:_MP(1046,'?s=admin&c=model');" >内容模型</a></li>
          <li id="_MP1047" ><a href="javascript:_MP(1047,'?s=admin&c=model&typeid=3');" >表单模型</a></li>
		  
		  <?php if (is_array($menu)) { foreach ($menu as $t) { ?>
          <li id="_MP9<?php echo $t['id']?>" ><a href="javascript:_MP(9<?php echo $t['id']?>,'<?php echo $t['url']?>');" ><?php echo $t['name']?></a></li>
		  <?php } } ?>
		  <li class="menubtm"></li>
          </ul>
        </li>
        <li id="_MP101" ><a href="javascript:_MP(101,'?s=admin&c=category');" >栏目</a></li>
        <li id="_MP102" ><a href="javascript:_MP(102,'?s=admin&c=block');" >区块</a></li>
		<?php if($MEMBER_REGISTER) { ?>
        <li id="_MP103" ><a href="javascript:_MP(103,'?s=admin&c=member');" >会员</a></li>
		<?php } ?>
         <li id="_MP105" ><a href="javascript:_MP(105,'?s=admin&c=template');" >模板</a></li>
   </ul>
  </div>
  <!--账户信息-->
  <div class="user">
    <?php echo $username; ?>，<a href="javascript:;" onClick="logout();">退出</a></div>
</div>
<!--头部结束-->
<div id="main">
  <!--左侧开始-->
  <div id="left">
    <h2>
      <span style="float:right;"><a href="javascript:;" onClick="refresh();" class="refresh"><img src="<?php echo ADMIN_DIR; ?>/img/space.gif" alt="刷新菜单" title="刷新菜单" height="18" width="16" /></a></span>
      <label id='root_menu_name'>内容管理</label>
    </h2>
    <div id="browser"><iframe name="leftMain" id="leftMain" src="?s=admin&c=content&a=category" frameborder="false" scrolling="auto" style="border:none" width="100%" height="auto" allowtransparency="true"></iframe></div>
  </div>
  <!--左侧结束-->
  <!--右侧开始-->
  <div id="right">
    <div id="home">
    	<div id="shortcut">
    		<span>
    			<a  href="javascript:_MP(107,'?s=admin&a=cache');" title="更新缓存"><img width="16" height="16" src="<?php echo ADMIN_DIR; ?>/img/ref.gif" /></a>
    		</span>
    		<span>
    			<a  href="http://www.xiaocms.com" title="官方首页"  target="_blank" ><img width="16" height="16" src="<?php echo ADMIN_DIR; ?>/img/add.gif" /></a>
    		</span>
    		<span title="网站首页" onclick="window.open('./')">
    			<img width="16" height="16" src="<?php echo ADMIN_DIR; ?>/img/home.gif" />
    		</span>
    	</div>
    	<div id="position">后台首页</div>
    </div>
    <div id="frame_container" style="width:100%;"><iframe name="right" id="rightMain" src="<?php echo url('admin/index/main'); ?>" frameborder="false" scrolling="auto" style="border:none;" width="100%" allowtransparency="true"></iframe></div>
  </div>
</div>
<script type="text/javascript"> 
window.onresize = function(){
	var heights = document.documentElement.clientHeight;
	document.getElementById('rightMain').height = heights-61;
	document.getElementById('leftMain').height = heights-61;
}
window.onresize();
function _MP(id, targetUrl) {
	var title = $("#_MP"+id).find('a').html();
	$("#position").html(title);
	$("#rightMain").attr('src', targetUrl);
	$('.focused').removeClass("focused");
	$('#_MP'+id).addClass("focused");
}
function logout(){
	if (confirm("确定退出吗"))
	top.location = '<?php echo url("admin/login/logout/"); ?>';
	return false;
}
function refresh() {
	document.getElementById('leftMain').src = '<?php echo url('admin/content/category'); ?>';
}
</script>
</body>
</html>
