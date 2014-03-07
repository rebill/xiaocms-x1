<?php include $this->admin_tpl('header');?>
<script type="text/javascript">
top.document.getElementById('position').innerHTML = '添加字段';
</script>

<script type="text/javascript">
function loadformtype(type) {
    $("#content").html('loading...');
	$.get("<?php echo url('admin/model/ajaxformtype/',array('type'=>'')); ?>"+type, function(data) {
		$("#content").html(data);																		
	});
	var merge = $('#merge').val();
	$('#hidetbody').show();
	$('#select-ed').show();
	loadmerge(merge);
	if (type=='input') {
		$('#hidetbody').hide();
	}
	if (type=='editor') {
		$('#hidetbody').hide();
	}
	if (type=='merge') {
		$('#hidetbody').hide();
	}
	if (type=='fields') {
		$('#hidetbody').hide();
	    $('#select-ed').hide();
	}
	if (type=='checkbox') {
		$('#hidetbody').hide();
	}
	if (type=='image') {
		$('#hidetbody').hide();
	}
	if (type=='file') {
		$('#hidetbody').hide();
	}
	if (type=='files') {
		$('#hidetbody').hide();
	}
	if (type=='date') {
		$('#hidetbody').hide();
	}
}
function ajaxname() {
	var field = $('#field').val();
	if (field == '') {
	    $.post('<?php echo SITE_PATH;  echo ENTRY_SCRIPT_NAME; ?>?c=api&a=pinyin&id='+Math.random(), { name:$('#name').val() }, function(data){ $('#field').val(data); });
	}
}
function setlength() {
	var type = new Array(); 
	type['INT']='10';
	type['TINYINT']='3';
	type['SMALLINT']='5';
	type['MEDIUMINT']='8';
	type['DECIMAL']='10,2';
	type['CHAR']='50';
	type['VARCHAR']='255';
	type['TEXT']='255';
	var name = $('#type').val();
	if (name) {
	    v = type[name];
		$('#length').val(v);
	}
}
function loadmerge(v) {
    if (v) {
	    $('#hidetbody').hide();
		$('#select-ed').hide();
		$("#formtype option[class='merge_delete']").remove();
	} else {
	    $('#hidetbody').show();
		$('#select-ed').show();
	}
}
<?php if (isset($data['merge']) && $data['merge']) { ?>
$(function(){
    loadmerge(<?php echo $data['merge']; ?>);
});
<?php } ?>
</script>

<div class="subnav">
	<div class="content-menu">
		<a href="<?php echo url('admin/model/index', array('typeid'=>$typeid)); ?>" class="on"><em>模型管理</a>
		<a href="<?php echo url('admin/model/fields/', array('typeid'=>$typeid, 'modelid'=>$modelid)); ?>" class="on"><em>字段管理</em></a>
		<a href="<?php echo url('admin/model/addfield/', array('typeid'=>$typeid, 'modelid'=>$modelid)); ?>" class="add"><em>添加字段</em></a>
	</div>
	<div class="bk10"></div>
	<div class="table_form">
		<form action="" method="post">
		<input name="modelid" type="hidden" value="<?php echo $modelid; ?>">
		<input name="fieldid" type="hidden" value="<?php echo $data['fieldid']; ?>">
		<table width="100%" class="table_form">
		<tr>
			<th width="100">模型名称： </th>
			<td><?php echo $model_data['modelname']; ?></td>
		</tr>
		<?php if ($merge && (empty($data['formtype']) || (isset($data['formtype']) && $data['formtype']!='fields'))) { ?>
		<tr>
			<th>多字段组合： </th>
			<td>
			<select name="merge" id="merge" onChange="loadmerge(this.value)">
			<?php if (!isset($data['merge']) || empty($data['merge'])) { ?><option value="">-</option><?php }  if (is_array($merge)) { $count=count($merge);foreach ($merge as $t) { ?>
			<option value="<?php echo $t['fieldid']; ?>" <?php if ($t['fieldid']==$data['merge']) { ?>selected<?php } ?>><?php echo $t['name']; ?></option>
			<?php } } ?>
			</select>
			<div class="onShow">该字段将会从属于该“组合”。</div></td>
		</tr>
		<?php } ?>
		<tr>
			<th><font color="red">*</font> 字段别名： </th>
			<td><input class="input-text" type="text" name="name" value="<?php echo $data['name']; ?>" size="30" id="name" onBlur="ajaxname()"/><div class="onShow">例如：标题。</div></td>
		</tr>
		<tr>
			<th><font color="red">*</font> 字段名称： </th>
			<td><input class="input-text" type="text" id="field" name="field" value="<?php echo $data['field']; ?>" size="30" <?php if ($data[fieldid]) { ?>disabled<?php } ?> /><div class="onShow">只能由英文字母、数字和下划线组成，并且仅能字母开头。</div>
		</tr>
		<tr>
			<th><font color="red">*</font> 字段类别： </th>
			<td><select name="formtype" id="formtype" onChange="loadformtype(this.value)" <?php if ($data['fieldid']) { ?>disabled<?php } ?>>
			<option value="">--请选择字段类别--</option>
			<?php if (is_array($formtype)) { foreach ($formtype as $k=>$t) { ?>
			  <option value="<?php echo $k; ?>" <?php if ($k==$data['formtype']) { ?>selected<?php }  if (!in_array($k, array('checkbox', 'radio', 'select', 'textarea', 'password', 'input'))) { ?> class="merge_delete"<?php } ?>><?php echo $t; ?></option>
			<?php } } ?>
			</select>
			</td>
		</tr>
		<tr>
			<th>相关参数： </th>
			<td><div id="content">
			<?php 
			if ($data['fieldid']) { 
				$func = "form_".$data['formtype'];
				if (function_exists($func)) {
					eval("echo ".$func."(".$data['setting'].");");
				}
			} ?>
			</div></td>
		</tr>
		<?php if (!in_array($data['formtype'], array('input', 'editor', 'merge', 'checkbox', 'image', 'file', 'files', 'date', 'fields'))) { ?>
		<tbody id="hidetbody">
		<tr>
			<th><font color="red">*</font> 字段类型： </th>
			<td>
			<?php if ($data['type']) {  echo $data['type'];  } else { ?>
			<select name="type" onChange="setlength()" id="type">
				<option value="">--请选择字段类型--</option>
				<option value="INT">十位整型(INT)</option>
				<option value="TINYINT">三位整型(TINYINT)</option>
				<option value="SMALLINT">五位整型(SMALLINT)</option>
				<option value="MEDIUMINT">八位整型(MEDIUMINT)</option>
				<option value="DECIMAL">小数类型(DECIMAL)</option>
				<option value="CHAR">字符类型(CHAR)</option>
				<option value="VARCHAR">文字类型(VARCHAR)</option>
				<option value="TEXT">文本类型(TEXT)</option>
			</select>
			<div class="onShow">请慎重，一旦创建不能更改。</div>
			<?php } ?>
			</td>
		</tr>
		<tr>
			<th><font color="red">*</font> 长度值： </th>
			<td><?php if ($data['fieldid']) {  echo $data['length'];  } else { ?><input class="input-text" type="text" id="length" name="length" value="<?php echo $data['length']; ?>" size="30"/>
			<div class="onShow">注意长度值不能超界。</div><?php } ?></td>
		</tr>
		<tr>
			<th>字段索引： </th>
			<td>
			<?php if ($data['indexkey']=='INDEX') {  echo '普通索引';  } else if ($data['indexkey']=='UNIQUE') {  echo '唯一索引';  } else {  if ($data['fieldid']) {  echo '无索引';  } else { ?>
				<select name="indexkey">
				<option value="">---</option>
				<option value="UNIQUE">唯一索引</option>
				<option value="INDEX">普通索引</option>
				</select>
				<div class="onShow">（可选）请慎重，必须理解索引的概念，一旦创建不能更改。</div>
				<?php }  } ?>
			</td>
		</tr>
		</tbody>
		<?php } ?>
		<tr>
			<th>字段提示： </th>
			<td><input class="input-text" type="text" name="tips" value="<?php echo $data['tips']; ?>" size="30"/><div class="onShow">显示在字段别名下方作为表单输入提示。</div></td>
		</tr>
		<?php if ($typeid==1) { ?>
		<tr>
			<th>是否前台显示：</th>
			<td>
			<input type="radio" <?php if (!isset($data['isshow']) || $data['isshow']==1) { ?>checked<?php } ?> value="1" name="isshow"> 显示&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" <?php if (isset($data['isshow']) && $data['isshow']==0) { ?>checked<?php } ?> value="0" name="isshow"> 隐藏
			<div class="onShow">前台会员发布时是否显示该字段。</div>
			</td>
		</tr>
		<?php } ?>
		<tbody id="select-ed" style="<?php if (isset($data['formtype']) && $data['formtype']=='fields') { ?>display:none<?php } ?>">
		<tr>
			<th>是否必填字段：</th>
			<td>
			<input <?php if ($data['formtype']=='merge') { ?>disabled<?php } ?> type="radio" <?php if (!isset($data['not_null']) || empty($data['not_null'])) { ?>checked<?php } ?> value="0" name="not_null" onclick="$('#pattern_data').hide();"> 选填&nbsp;&nbsp;&nbsp;&nbsp;
			<input <?php if ($data['formtype']=='merge') { ?>disabled<?php } ?> type="radio" <?php if (isset($data['not_null']) && $data['not_null']) { ?>checked<?php } ?> value="1" name="not_null" onclick="$('#pattern_data').show();"> 必填
			</td>
		</tr>
		</tbody>
		<tbody id="pattern_data" style="<?php if (!isset($data['not_null']) || empty($data['not_null'])) { ?>display:none<?php } ?>">
		<tr>
			<th>数据校验正则： </th>
			<td><input class="input-text" type="text" name="pattern" id="pattern" value="<?php echo $data['pattern']; ?>" size="40"/><select onChange="javascript:$('#pattern').val(this.value)" name="pattern_select">
			<option value="">常用正则</option>
			<option value="/^[0-9.-]+$/">数字</option>
			<option value="/^[0-9-]+$/">整数</option>
			<option value="/^[a-z]+$/i">字母</option>
			<option value="/^[0-9a-z]+$/i">数字+字母</option>
			<option value="/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/">E-mail</option>
			<option value="/^[0-9]{5,20}$/">QQ</option>
			<option value="/^http:\/\//">超级链接</option>
			<option value="/^(1)[0-9]{10}$/">手机号码</option>
			<option value="/^[0-9-]{6,13}$/">电话号码</option>
			<option value="/^[0-9]{6}$/">邮政编码</option>
			</select><div class="onShow">通过此正则校验表单提交的数据合法性，如果不想校验数据请留空。</div>
			</td>
		</tr>
		<tr>
			<th>校验提示信息： </th>
			<td><input class="input-text" type="text" name="errortips" value="<?php echo $data['errortips']; ?>" size="30"/><div class="onShow">数据校验未通过的提示信息。</div></td>
		</tr>
		</tbody>
		<tr>
			<th>&nbsp;</th>
			<td><input class="button" type="submit" name="submit" value="提交" onClick="$('#load').show()" />
			<span id="load" style="display:none"><img src="<?php echo ADMIN_DIR; ?>/img/loading.gif"></span></td>
		</tr>
		</table>
		</form>
	</div>
</div>
</body>
</html>