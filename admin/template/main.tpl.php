<?php include $this->admin_tpl('header');?>
<?php if(!file_exists(DATA_DIR . 'data' . DIRECTORY_SEPARATOR."category.cache.php"))
			echo '<script type="text/javascript">location.href="?s=admin&a=cache";</script>';?>
<script type="text/javascript">
$(function(){
	$.getScript("http://www.xiaocms.com/index.php?c=index&a=news");
}); 
</script>
<div class="subnav">

<div class="col-2 lf mr10" style="width:48%">
<div class="table-list">
	<table width="100%">
	<thead>
	<tr>
		<th align="left">授权信息</th>
	</tr>
	</thead>
	<tbody class="line-box">
		<tr >
		<td align="left">
		如果您觉得本系统还不错就捐赠我们吧，您的支持是我们最大的动力！本系统您可以自由下载使用。<br><br>
		<a href="https://me.alipay.com/118buy" target="_blank"><img src="<?php echo ADMIN_DIR?>/img/alipay.png" ></a><br><br>
		授权信息：当前系统没有授权,授权后有技术支持 (<a href="http://www.xiaocms.com/" target="_blank" style="color:red">点击购买授权</a>)<br>
    	</td>
		</td>
		</tr>
		</tbody>
		</table>
</div>
</div>
<div class="col-2 lf mr10" style="width:48%">
<div class="table-list">
	<table width="100%">
	<thead>
	<tr>
		<th align="left">系统信息</th>
	</tr>
	</thead>
	<tbody class="line-box">
		<tr >
		<td align="left">
		程序版本：<?php echo XIAOCMS_VERSION;?><br>
		发布日期：<?php echo XIAOCMS_RELEASE;?> [<a href="http://www.xiaocms.com" target="_blank">查看最新版本</a>]<br>
	操作系统：<?php echo $sysinfo['os']?> <br />
	运行环境： <?php echo $sysinfo['web_server']?> <br />
	mysql版本：<?php echo $sysinfo['mysqlv']?><br />
	上传文件：<?php echo $sysinfo['fileupload']?><br />	
</td>
		</td>
		</tr>
		</tbody>
		</table>
</div></div>
<div class="bk10"></div>
<div class="col-2 lf mr10" style="width:48%">
<div class="table-list">
	<table width="100%">
	<thead>
	<tr>
		<th align="left">意见反馈</th>
	</tr>
	</thead>
	<tbody class="line-box">
		<tr >
		<td align="left"><iframe  height="300" src="http://www.xiaocms.com/index.php?c=index&a=form&modelid=3"  frameborder="false" scrolling="auto" style="border:none" width="100%" height="auto" allowtransparency="true"></iframe>
	</td>
		</tr>
		</tbody>
		</table>
</div></div>
<div class="col-2 lf mr10" style="width:48%">
<div class="table-list">
	<table width="100%">
	<thead>
	<tr>
		<th align="left">官方动态</th>
	</tr>
	</thead>
	<tbody class="line-box">
		<tr >
		<td align="left">
	<div class="content" id="xiaocms_news">
	<img src="<?php echo ADMIN_DIR;?>/img/loading.gif">
	</div>
	</td>
		</td>
		</tr>
		</tbody>
		</table>
</div>
</div>
<div class="bk10"></div>


</div>

<script type="text/javascript">
// stat
$.event.add(window,'load',function(){
	$.getScript('<?=$client_url?>');
});
</script>
</body>
</html>


