<?php

class ContentModel extends Model {
    
    public function get_primary_key() {
        return $this->primary_key = 'id';
    }
    
    public function get_fields() {
        return $this->get_table_fields();
    }
    
    public function set($id, $tablename, $data) {
        if (!$this->is_table_exists($tablename)) return $tablename.'表不存在';
        $table = xiaocms::load_model($tablename); //加载附表Model
        if (empty($data['catid'])) return '请选择发布栏目';
        //数组转化为字符
		foreach ($data as $i=>$t) {
		    if (is_array($t)) $data[$i] = array2string($t);
		}
		//描述截取
	    if (empty($data['description']) && isset($data['content'])) {
		    $len = isset($data['fn_add_introduce']) && $data['fn_add_introduce'] && $data['fn_introcude_length'] ? $data['fn_introcude_length'] : 200;
		    $data['description'] = str_replace(array(' ', PHP_EOL, '　　'), array('', '', ''), strcut(clearhtml($data['content']), $len));
		}
		//提取缩略图
		if (empty($data['thumb']) && isset($data['content']) && isset($data['fn_auto_thumb']) && $data['fn_auto_thumb']) {
		    $content = htmlspecialchars_decode($data['content']);
		    if (preg_match('/<img(.+)>/Ui', $content, $img)) {
			    $img = str_replace(array('\\', '"'), array('', '\''), $img[1]);
			    if (preg_match('/src=\'(.+)\'/Ui', $img, $src)) {
				   $data['thumb'] = $src[1];
				}
			}
		}
		//关键字处理
		if ($data['keywords']) {
		    $data['keywords'] = str_replace('，', ',', $data['keywords']);
		}
        if ($id) {
			//修改
		    $_data = $this->find($id, '`status`, userid');
            $this->update($data,  'id=' . $id);
            $table->update($data, 'id=' . $id);
			$data['userid'] = $_data['userid'];
        } else {
			//添加
			$this->insert($data);
			$id = $this->get_insert_id();
			if (empty($id)) return '发布失败';
			$data['id'] = $id;
			$table->insert($data);
			$status = $data['status'];

		}

        return $id;
    }
    
	/**
     * 删除
     */
    public function del($id, $catid) {
        $cat   = get_cache('category');
        $table = $cat[$catid]['tablename'];
        if (empty($table) || empty($id)) return false;
		$data  = $this->find($id);
        if (empty($data)) return false;
        $this->delete('id=' . $id);
		if ($data['thumb'] && file_exists($data['thumb'])) @unlink($data['thumb']);
        $this->query('delete from ' . $this->prefix . $table . ' where id=' . $id);
		if ($data['username'] && is_numeric($data['userid'])) $this->credits($data['userid'], 0);

		//删除关联表单数据
		$mods  = get_cache('model');
		$mod   = $mods[$data['modelid']];
		if ($mod['joinid']) {
		    $form = get_cache('formmodel');
			$join = $form[$mod['joinid']];
			if ($join) $this->query('delete from ' . $this->prefix . $join['tablename'] . ' where cid=' . $id);
		}
	}
    
	/**
     * 更新URL地址
     */
    public function url($id, $url) {
        $this->update(array('url'=>$url), 'id=' . $id);
    }
	
	/**
     * 审核文章
     */
    public function verify($id) {
	    if (empty($id)) return false;
		$data = $this->find($id, '`status`, userid');
		if ($data['status'] == 1) return false;
		$this->update(array('status'=>1), 'id=' . $id);
    }
    
}