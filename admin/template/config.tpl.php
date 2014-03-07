<?php include $this->admin_tpl('header');?>
<script type="text/javascript">
top.document.getElementById('position').innerHTML = '系统配置';
</script>
<div class="subnav">
<div class="table_form">
	<form method="post" action="" id="myform" name="myform">
	<div class="pad-10">
		<div class="col-tab">
			<ul class="tabBut cu-li">
				<li onClick="SwapTab('setting','on','',7,1);" class="<?php if ($type==1) { ?>on<?php } ?>" id="tab_setting_1">系统配置</li>
				<li onClick="SwapTab('setting','on','',7,2);" id="tab_setting_2" class="<?php if ($type==2) { ?>on<?php } ?>">水印设置</li>
				<li onClick="SwapTab('setting','on','',7,3);" id="tab_setting_3" class="<?php if ($type==3) { ?>on<?php } ?>">后台帐号</li>
				<li onClick="SwapTab('setting','on','',7,4);" id="tab_setting_4" class="<?php if ($type==4) { ?>on<?php } ?>">会员配置</li>
				<li onClick="SwapTab('setting','on','',7,5);" id="tab_setting_5" class="<?php if ($type==5) { ?>on<?php } ?>">URL配置</li>
				</ul>
			<div class="contentList pad-10" id="div_setting_1" style="display: none;">
			<table width="100%" class="table_form">
				<tr>
					<th width="100">网站名称： </th>
					<td><input class="input-text" type="text" name="data[SITE_NAME]" value="<?php echo $data['SITE_NAME']; ?>" size="30"/><div class="onShow"><?php echo $string['SITE_NAME']; ?></div></td>
				</tr>
				<tr>
					<th>默认模板： </th>
					<td><select name="data[SITE_THEME]">
					<?php if (is_array($theme)) { foreach ($theme as $t) {  if (is_dir(TEMPLATE_DIR . $t)) { ?>
					<option value="<?php echo $t; ?>" <?php if ($data['SITE_THEME']==$t) { ?>selected<?php } ?>><?php echo $t; ?></option>
					<?php }  } } ?>
					</select> 移动终端模板：<input name="data[SITE_MOBILE]" type="radio" value="true" <?php if ($data['SITE_MOBILE']==true) { ?>checked<?php } ?> /> 打开
					&nbsp;&nbsp;&nbsp;<input name="data[SITE_MOBILE]" type="radio" value="false" <?php if (empty($data['SITE_MOBILE'])) { ?>checked<?php } ?> /> 关闭
					<div class="onShow">如果打开恻手机访问就显示手机版！手机版模板的目录在mobile内</div></td>
				</tr>

				<tr>
					<th>首页标题： </th>
					<td><input class="input-text" type="text" name="data[SITE_TITLE]" value="<?php echo $data['SITE_TITLE']; ?>" size="50"/></td>
				</tr>
				<tr>
					<th>关键字：</th>
					<td class="y-bg"><input class="input-text" type="text" name="data[SITE_KEYWORDS]" value="<?php echo $data['SITE_KEYWORDS']; ?>" size="50"/></td>
				</tr>
				<tr>
					<th>网站描述：</th>
					<td><textarea name="data[SITE_DESCRIPTION]" rows="3" cols="55" class="text"><?php echo $data['SITE_DESCRIPTION']; ?></textarea></td>
				</tr>
			</table>
			</div>

			<div class="contentList pad-10 hidden" id="div_setting_2" style="display: none;">
			<table width="100%" class="table_form ">

			<tr>
				<th width="100">水印类型： </th>
				<td><input name="data[SITE_WATERMARK]" type="radio" value="1" <?php if ($data['SITE_WATERMARK']==1) { ?>checked<?php } ?> onClick="setSateType(1)"> 图片水印
				&nbsp;&nbsp;&nbsp;<input name="data[SITE_WATERMARK]" type="radio" value="2" <?php if ($data['SITE_WATERMARK']==2) { ?>checked<?php } ?> onClick="setSateType(2)"> 文字水印
				&nbsp;&nbsp;&nbsp;<input name="data[SITE_WATERMARK]" type="radio" value="0" <?php if ($data['SITE_WATERMARK']==0) { ?>checked<?php } ?> onClick="setSateType(0)"> 关闭</td>
			</tr>
			<tbody id="w_0">
			<tr id="w_1">
				<th>水印图片透明度： </th>
				<td><input class="input-text" type="text" name="data[SITE_WATERMARK_ALPHA]" value="<?php echo $data['SITE_WATERMARK_ALPHA']; ?>" size="25"/>
				<div class="onShow">填写范围（0-99），图片目录：/img/watermark/watermark.png</div></td>
			</tr>
			<tr class="w_2">
				<th>水印文字： </th>
				<td><input class="input-text" type="text" name="data[SITE_WATERMARK_TEXT]" value="<?php echo $data['SITE_WATERMARK_TEXT']; ?>" size="25"/>
				<div class="onShow">默认字体文件：/img/fonts/elephant.ttf（若有中文请下载字体文件覆盖）</div></td>
			</tr>
			<tr class="w_2">
				<th>文字大小： </th>
				<td><input class="input-text" type="text" name="data[SITE_WATERMARK_SIZE]" value="<?php echo $data['SITE_WATERMARK_SIZE']; ?>" size="25"/>
				<div class="onShow">单位像素，默认14</div></td>
			</tr>
			<tr>
				<th>水印位置： </th>
				<td>
				<table width="400">
				<tr>
					<td><input type="radio" <?php if ($data['SITE_WATERMARK_POS']==1) { ?>checked=""<?php } ?> value="1" name="data[SITE_WATERMARK_POS]"> 顶部居左</td>
					<td><input type="radio" <?php if ($data['SITE_WATERMARK_POS']==2) { ?>checked=""<?php } ?> value="2" name="data[SITE_WATERMARK_POS]"> 顶部居中</td>
					<td><input type="radio" <?php if ($data['SITE_WATERMARK_POS']==3) { ?>checked=""<?php } ?> value="3" name="data[SITE_WATERMARK_POS]"> 顶部居右</td>
				</tr>
				<tr>
					<td><input type="radio" <?php if ($data['SITE_WATERMARK_POS']==4) { ?>checked=""<?php } ?> value="4" name="data[SITE_WATERMARK_POS]"> 中部居左</td>
					<td><input type="radio" <?php if ($data['SITE_WATERMARK_POS']==5) { ?>checked=""<?php } ?> value="5" name="data[SITE_WATERMARK_POS]"> 中部居中</td>
					<td><input type="radio" <?php if ($data['SITE_WATERMARK_POS']==6) { ?>checked=""<?php } ?> value="6" name="data[SITE_WATERMARK_POS]"> 中部居右</td>
				</tr>
				<tr>
					<td><input type="radio" <?php if ($data['SITE_WATERMARK_POS']==7) { ?>checked=""<?php } ?> value="7" name="data[SITE_WATERMARK_POS]"> 底部居左</td>
					<td><input type="radio" <?php if ($data['SITE_WATERMARK_POS']==8) { ?>checked=""<?php } ?> value="8" name="data[SITE_WATERMARK_POS]"> 底部居中</td>
					<td><input type="radio" <?php if (empty($data['SITE_WATERMARK_POS'])) { ?>checked=""<?php } ?> value="" name="data[SITE_WATERMARK_POS]"> 底部居右</td>
				</tr>
				</table>
				</td>
			</tr>
			</tbody>
			<tr>
				<th>内容缩略图宽高： </th>
				<td>
				<input class="input-text" type="text" name="data[SITE_THUMB_WIDTH]" value="<?php echo $data['SITE_THUMB_WIDTH']; ?>" size="6"/>
				x&nbsp;
				<input class="input-text" type="text" name="data[SITE_THUMB_HEIGHT]" value="<?php echo $data['SITE_THUMB_HEIGHT']; ?>" size="6"/>
				&nbsp;px
				</td>
			</tr>
			</table>
			<script type="text/javascript">
			function setSateType(id) {
				if (id == 0) {
					$('#w_1').hide();
					$('.w_2').hide();
					$('#w_0').hide();
				} else if(id == 1) {
					$('.w_2').hide();
					$('#w_1').show();
					$('#w_0').show();
				} else if(id == 2) {
					$('#w_1').hide();
					$('.w_2').show();
					$('#w_0').show();
				}
			}
			setSateType(<?php echo $data['SITE_WATERMARK']; ?>);
			</script>
			</div>

			<div class="contentList pad-10 hidden" id="div_setting_3" style="display: none;">
			<table width="100%" class="table_form">
				<tr>
					<th width="100">管理员帐号： </th>
					<td><input class="input-text" type="text" name="admin[ADMIN_NAME]" value="<?php echo $admin['ADMIN_NAME']; ?>" size="30"/><div class="onShow">后台帐号管理员</div></td>
				</tr>
				<tr>
					<th >管理员密码： </th>
					<td><input class="input-text" type="text" name="admin[ADMIN_PASS]" value="" size="30"/><div class="onShow">如果不修改请留空</div></td>
				</tr>

			</table>

			</div>

			<div class="contentList pad-10 hidden" id="div_setting_4" style="display: none;" >
				<table width="100%" class="table_form">
				<tr>
					<th width="150">默认会员模型： </th>
					<td><select name="data[MEMBER_MODELID]"><option value="0"> -- </option>
					<?php if (is_array($membermodel)) {foreach ($membermodel as $t) { ?>
					<option value="<?php echo $t['modelid']; ?>" <?php if ($data['MEMBER_MODELID']==$t['modelid']) { ?>selected<?php } ?>><?php echo $t['modelname']; ?></option>
					<?php } } ?></select></td>
				</tr>
				
				<tr>
					<th >新会员注册： </th>
					<td><input name="data[MEMBER_REGISTER]" type="radio" value="1" <?php if ($data['MEMBER_REGISTER']==1) { ?>checked<?php } ?>> 打开
					&nbsp;&nbsp;&nbsp;<input name="data[MEMBER_REGISTER]" type="radio" value="0" <?php if ($data['MEMBER_REGISTER']==0) { ?>checked<?php } ?>> 关闭</td>
				</tr>
				<tr>
					<th>新会员审核： </th>
					<td><input name="data[MEMBER_STATUS]" type="radio" value="1" <?php if ($data['MEMBER_STATUS']==1) { ?>checked<?php } ?>> 打开
					&nbsp;&nbsp;&nbsp;<input name="data[MEMBER_STATUS]" type="radio" value="0" <?php if ($data['MEMBER_STATUS']==0) { ?>checked<?php } ?>> 关闭</td>
				</tr>
				<tr>
					<th>注册验证码： </th>
					<td><input name="data[MEMBER_REGCODE]" type="radio" value="1" <?php if ($data['MEMBER_REGCODE']==1) { ?>checked<?php } ?>> 打开
					&nbsp;&nbsp;&nbsp;<input name="data[MEMBER_REGCODE]" type="radio" value="0" <?php if ($data['MEMBER_REGCODE']==0) { ?>checked<?php } ?>> 关闭</td>
				</tr>
				<tr>
					<th>登录验证码： </th>
					<td><input name="data[MEMBER_LOGINCODE]" type="radio" value="1" <?php if ($data['MEMBER_LOGINCODE']==1) { ?>checked<?php } ?>> 打开
					&nbsp;&nbsp;&nbsp;<input name="data[MEMBER_LOGINCODE]" type="radio" value="0" <?php if ($data['MEMBER_LOGINCODE']==0) { ?>checked<?php } ?>> 关闭</td>
				</tr>
				</table>
				</div>

			<div class="contentList pad-10 hidden" id="div_setting_5" style="display: none;">
					<table width="100%" class="table_form">
					<tbody>
					<tr>
						<th width="200">伪静态自定义URL规则： </th>
						<td><input name="data[DIY_URL]" type="radio" value="1" <?php if ($data['DIY_URL']) { ?>checked<?php } ?>   onClick="$('#url').show()"> 打开
						&nbsp;&nbsp;&nbsp;
						<input name="data[DIY_URL]" type="radio" value="0" <?php if (!$data['DIY_URL']) { ?>checked<?php } ?> onClick="$('#url').hide()"> 关闭 <div class="onShow">需要服务器支持。</div></td>
					</tr>
					</tbody>
					<tbody id="url" style="display:<?php if (!$data['DIY_URL']) { ?>none<?php } ?>">
					<tr>
						<th width="200">备注说明： </th>
						<td>
						<div class="onShow">修改url规则后 需要修改文件：data/config/router.ini 自定义URL地址伪静态规则</div>
						</td>
					</tr>
					<tr>
						<th width="200">栏目URL格式： </th>
						<td><input  class="input-text" type="text" name="data[LIST_URL]" value="<?php echo $data['LIST_URL']; ?>" size="40"/>
						<div class="onShow">参数说明：&nbsp;{dir} 表示栏目目录 ，{id} 表示栏目ID ，{page}表示分页参数</div>
						</td>
					</tr>
					<tr>
						<th>栏目URL格式(带分页)： </th>
						<td><input  class="input-text" type="text" name="data[LIST_PAGE_URL]" value="<?php echo $data['LIST_PAGE_URL']; ?>" size="40"/>
						<div class="onShow">参数说明：&nbsp;{dir} 表示栏目目录 ，{id} 表示栏目ID ，{page}表示分页参数</div>
						</td>
					</tr>
					<tr>
						<th>内容URL格式： </th>
						<td><input  class="input-text" type="text" name="data[SHOW_URL]" value="<?php echo $data['SHOW_URL']; ?>" size="40"/>
						<div class="onShow">参数说明：&nbsp;{dir} 表示栏目目录 ，{id} 表示内容ID ，{page}表示分页参数 备注：&nbsp;{id}必须存在</div>
						</td>
					</tr>
					<tr>
						<th>内容URL格式(带分页)： </th>
						<td><input  class="input-text" type="text" name="data[SHOW_PAGE_URL]" value="<?php echo $data['SHOW_PAGE_URL']; ?>" size="40"/>
						<div class="onShow">参数说明：&nbsp;{dir} 表示栏目目录 ，{id} 表示内容ID ，{page}表示分页参数 备注：&nbsp;{id}必须存在</div>
						</td>
					</tr>

					</tbody>
					</table>
					</div>
					
	
			<div class="bk15"></div>
			<input type="submit" class="button" value="提交" name="submit">
		</div>
	</div>
	</form>
</div>
</div>
</body>
</html>
<script type="text/javascript">
$('#div_setting_<?php echo $type; ?>').show();
function SwapTab(name,cls_show,cls_hide,cnt,cur){
	for(i=1;i<=cnt;i++){
		if(i==cur){
			$('#div_'+name+'_'+i).show();
			$('#tab_'+name+'_'+i).attr('class',cls_show);
		}else{
			$('#div_'+name+'_'+i).hide();
			$('#tab_'+name+'_'+i).attr('class',cls_hide);
		}
	}
}
function showsmtp(obj,hiddenid){
	hiddenid = hiddenid ? hiddenid : 'smtpcfg';
	var status = $(obj).val();
	if(status == 1) $("#"+hiddenid).show();
	else $("#"+hiddenid).hide();
}
function test_mail() {
    var mail_type = $('input[checkbox=mail_type][checked]').val();
	$.post('<?php echo url('admin/index/ajaxmail'); ?>&submit=1&mail_to='+$('#mail_to').val(),{mail_type:mail_type,mail_server:$('#mail_server').val(),mail_port:$('#mail_port').val(),mail_user:$('#mail_user').val(),mail_password:$('#mail_password').val(),mail_auth:$('#mail_auth').val(),mail_auth:$('#mail_auth').val(),mail_from:$('#mail_from').val()}, function(data){
	    alert(data);
	});
} 
</script>