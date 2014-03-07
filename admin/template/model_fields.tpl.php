<?php include $this->admin_tpl('header');?>
<script type="text/javascript">
top.document.getElementById('position').innerHTML = '模型字段';
</script>

<div class="subnav">
<form action="" method="post">
	<div class="content-menu">
		<a href="<?php echo url('admin/model/index',     array('typeid'=>$typeid)); ?>" class="on"><em>模型管理</em></a>
		<a href="<?php echo url('admin/model/fields/', array('typeid'=>$typeid, 'modelid'=>$modelid)); ?>" class="on"><em>字段管理</em></a>
		<a href="<?php echo url('admin/model/addfield/', array('typeid'=>$typeid, 'modelid'=>$modelid)); ?>" class="add"><em>添加字段</em></a>
	</div>
	<div class="bk10"></div>
	<div class="table-list">
	    <form action="" method="post">
		<table width="100%">
		<thead>
		<tr>
			<th width="40" align="left">排序</th>
			<th width="120" align="left">名称</th>
			<th width="90" align="left">字段别名</th>
			<th width="80" align="left">字段类别</th>
			<th width="80" align="left">字段类型</th>
			<th width="80" align="left">组合字段</th>
			<th align="left">操作</th>
		</tr>
		</thead>
		<tbody  class="line-box">
		<?php if ($typeid == 1) { ?>
		<tr height="25">
			<td align="left"></td>
			<td align="left">title</td>
			<td align="left"><?php echo $content['title']['name']; ?></td>
			<td align="left"><?php if ($content['title']['show']) {  echo '显示';  } else {  echo '隐藏';  } ?></td>
			<td align="left"> </td>
			<td align="left"> </td>
			<td align="left">
			<a href="<?php echo url('admin/model/ajaxedit/',array('modelid'=>$modelid,'name'=>'title')); ?>">编辑</a></td>
		</tr>
		<tr height="25">
			<td align="left"></td>
			<td align="left">keywords</td>
			<td align="left"><?php echo $content['keywords']['name']; ?></td>
			<td align="left"><?php if ($content['keywords']['show']) {  echo '显示';  } else {  echo '隐藏';  } ?></td>
			<td align="left"> </td>
			<td align="left"> </td>
			<td align="left">
			<a href="<?php echo url('admin/model/ajaxedit/',array('modelid'=>$modelid,'name'=>'keywords')); ?>">编辑</a></td>
		</tr>
		<tr height="25">
			<td align="left"></td>
			<td align="left">thumb</td>
			<td align="left"><?php echo $content['thumb']['name']; ?></td>
			<td align="left"><?php if ($content['thumb']['show']) {  echo '显示';  } else {  echo '隐藏';  } ?></td>
			<td align="left"> </td>
			<td align="left"> </td>
			<td align="left">
			<a href="<?php echo url('admin/model/ajaxedit/',array('modelid'=>$modelid,'name'=>'thumb')); ?>">编辑</a></td>
		</tr>
		<tr height="25">
			<td align="left"></td>
			<td align="left">description</td>
			<td align="left"><?php echo $content['description']['name']; ?></td>
			<td align="left"><?php if ($content['description']['show']) {  echo '显示';  } else {  echo '隐藏';  } ?></td>
			<td align="left"> </td>
			<td align="left"> </td>
			<td align="left">
			<a href="<?php echo url('admin/model/ajaxedit/',array('modelid'=>$modelid,'name'=>'description')); ?>">编辑</a></td>
		</tr>
		<?php }  if (is_array($list)) { foreach ($list as $t) { ?>
		<tr height="25" style="<?php if ($t['formtype']=='merge') { ?>background-color:#FFC<?php } else if ($t['formtype']=='fields') { ?>background-color:#EEF3F7<?php } ?>">
			<td align="left">
			<input type="text" name="order_<?php echo $t['fieldid']; ?>" class="input-text" style="width:25px;height:15px;" value="<?php echo $t['listorder']; ?>"></td>
			<td align="left"><?php echo $t['field']; ?></td>
			<td align="left"><?php echo $t['name']; ?></td>
			<td align="left"><?php if ($t['formtype']=='merge') {  echo '组合字段';  } else {  echo $t['formtype'];  } ?></td>
			<td align="left"><?php echo $t['type']; ?></td>
			<td align="left"><?php echo $t['indexkey']; ?></td>
			<td align="left">
			<a href="<?php echo url('admin/model/editfield/',array('typeid'=>$typeid,'fieldid'=>$t['fieldid'])); ?>">编辑</a> | 
			<a href="<?php echo url('admin/model/disable/',array('typeid'=>$typeid,'fieldid'=>$t['fieldid'])); ?>"><?php if ($t['disabled']==1) { ?><font color="#FF0000">启用</font><?php } else {  echo '禁用';  } ?></a> | 
			<?php if ($t['field'] == 'content') { ?><a href="javascript:;" style="color:#ACA899">删除</a> <?php } else { ?><a  href="javascript:confirmurl('<?php echo url('admin/model/delfield/',array('typeid'=>$typeid,'fieldid'=>$t['fieldid'])); ?>','一旦删除字段，将会把 【<?php echo $t['name']; ?>】字段的数据全部删除，确定删除 <?php echo $t['name']; ?> 吗？ ')" >删除</a> <?php } ?></td>
		</tr>
		<?php } } ?>
		<tr height="25">
			<td colspan="7" align="left"><input class="button" type="submit" name="submit" value="排序" /></td>
		</tr>
		</tbody>
		</table>
	    </form>
	</div>
</div>
</body>
</html>