<?php include $this->admin_tpl('header');?>

<link rel="stylesheet" href="<?php echo ADMIN_DIR; ?>/img/jquery.treeview.css" type="text/css" />
<script type="text/javascript" src="<?php echo ADMIN_DIR; ?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_DIR; ?>/js/jquery.treeview.js"></script>
<SCRIPT LANGUAGE="JavaScript">
$(document).ready(function(){
    $("#category_tree").treeview({
			control: "#treecontrol",
			persist: "cookie",
			cookieId: "treeview-black"
	});
});
function open_list(obj) {
	window.top.$("#current_pos_attr").html($(obj).html());
}
</SCRIPT>
 <div style="margin-left:6px;margin-top:10px;">
 <div id="treecontrol">
 <span style="display:none">
		<a href="#"></a>
		<a href="#"></a>
		</span>
		<a href="#"><img src="<?php echo ADMIN_DIR; ?>/img/minus.gif" />   展开/收缩</a>
</div>
<?php echo $categorys; ?>
</div>

</body>
</html>
