DROP TABLE IF EXISTS `xiao_block`;
CREATE TABLE IF NOT EXISTS `xiao_block` (
  `id` smallint(8) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `xiao_block` (`id`, `type`, `name`, `content`) VALUES
(1, 2, '幻灯图片1', 'http://demo.xiaocms.com/template/default/images/1.png'),
(2, 2, '幻灯图片2', 'http://demo.xiaocms.com/template/default/images/2.png'),
(3, 2, '幻灯图片3', 'http://demo.xiaocms.com/template/default/images/3.png');

DROP TABLE IF EXISTS `xiao_category`;
CREATE TABLE IF NOT EXISTS `xiao_category` (
  `catid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(1) NOT NULL,
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `arrparentid` varchar(255) NOT NULL,
  `child` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `arrchildid` varchar(255) NOT NULL,
  `catname` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `catdir` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `http` varchar(255) NOT NULL,
  `items` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ispost` smallint(2) NOT NULL,
  `verify` smallint(2) NOT NULL DEFAULT '0',
  `islook` smallint(2) NOT NULL,
  `categorytpl` varchar(50) NOT NULL,
  `listtpl` varchar(50) NOT NULL,
  `showtpl` varchar(50) NOT NULL,
  `pagetpl` varchar(50) NOT NULL,
  `pagesize` smallint(5) NOT NULL,
  PRIMARY KEY (`catid`),
  KEY `listorder` (`listorder`,`child`),
  KEY `ismenu` (`ismenu`),
  KEY `parentid` (`parentid`),
  KEY `modelid` (`modelid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xiao_content`;
CREATE TABLE IF NOT EXISTS `xiao_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `modelid` smallint(5) NOT NULL,
  `title` varchar(80) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL,
  `url` char(100) NOT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `hits` smallint(5) unsigned NOT NULL DEFAULT '0',
  `username` char(20) NOT NULL,
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `member` (`catid`,`status`,`inputtime`),
  KEY `list` (`catid`,`status`,`inputtime`),
  KEY `top` (`catid`,`status`,`hits`),
  KEY `admin` (`listorder`,`catid`,`modelid`,`status`,`inputtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xiao_content_news`;
CREATE TABLE IF NOT EXISTS `xiao_content_news` (
  `id` mediumint(8) NOT NULL,
  `catid` smallint(5) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xiao_content_product`;
CREATE TABLE IF NOT EXISTS `xiao_content_product` (
  `id` mediumint(8) NOT NULL,
  `catid` smallint(5) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xiao_form_comment`;
CREATE TABLE IF NOT EXISTS `xiao_form_comment` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `cid` mediumint(8) NOT NULL,
  `userid` mediumint(8) NOT NULL,
  `username` char(20) NOT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` char(20) DEFAULT NULL,
  `pinglunneirong` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listorder` (`listorder`),
  KEY `status` (`status`),
  KEY `inputtime` (`inputtime`),
  KEY `userid` (`userid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xiao_form_gestbook`;
CREATE TABLE IF NOT EXISTS `xiao_form_gestbook` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `cid` mediumint(8) NOT NULL,
  `userid` mediumint(8) NOT NULL,
  `username` char(20) NOT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` char(20) DEFAULT NULL,
  `nindexingming` varchar(255) DEFAULT NULL,
  `lianxiQQ` varchar(255) DEFAULT NULL,
  `liuyanneirong` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listorder` (`listorder`),
  KEY `status` (`status`),
  KEY `inputtime` (`inputtime`),
  KEY `userid` (`userid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xiao_member`;
CREATE TABLE IF NOT EXISTS `xiao_member` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `salt` char(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT '',
  `modelid` smallint(5) NOT NULL,
  `credits` int(10) NOT NULL,
  `regdate` int(10) unsigned NOT NULL DEFAULT '0',
  `regip` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xiao_member_geren`;
CREATE TABLE IF NOT EXISTS `xiao_member_geren` (
  `id` mediumint(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xiao_model`;
CREATE TABLE IF NOT EXISTS `xiao_model` (
  `modelid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(3) NOT NULL,
  `modelname` char(30) NOT NULL,
  `tablename` char(20) NOT NULL,
  `categorytpl` varchar(30) NOT NULL,
  `listtpl` varchar(30) NOT NULL,
  `showtpl` varchar(30) NOT NULL,
  `joinid` smallint(5) DEFAULT NULL,
  `setting` text,
  PRIMARY KEY (`modelid`),
  KEY `typeid` (`typeid`),
  KEY `joinid` (`joinid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `xiao_model` (`modelid`, `typeid`, `modelname`, `tablename`, `categorytpl`, `listtpl`, `showtpl`, `joinid`, `setting`) VALUES
(1, 1, '文章模型', 'content_news', 'category_news.html', 'list_news.html', 'show_news.html', 0, 'a:1:{s:7:"default";a:4:{s:5:"title";a:2:{s:4:"name";s:6:"标题";s:4:"show";s:1:"1";}s:8:"keywords";a:2:{s:4:"name";s:9:"关键字";s:4:"show";s:1:"1";}s:5:"thumb";a:2:{s:4:"name";s:9:"缩略图";s:4:"show";s:1:"1";}s:11:"description";a:2:{s:4:"name";s:6:"描述";s:4:"show";s:1:"1";}}}'),
(2, 1, '产品模型', 'content_product', 'category_product.html', 'list_product.html', 'show_product.html', NULL, 'a:1:{s:7:"default";a:4:{s:5:"title";a:2:{s:4:"name";s:6:"标题";s:4:"show";s:1:"1";}s:8:"keywords";a:2:{s:4:"name";s:9:"关键字";s:4:"show";s:1:"1";}s:5:"thumb";a:2:{s:4:"name";s:9:"缩略图";s:4:"show";s:1:"1";}s:11:"description";a:2:{s:4:"name";s:6:"描述";s:4:"show";s:1:"1";}}}'),
(3, 3, '在线留言', 'form_gestbook', 'form.html', 'list_gestbook.html', 'show_gestbook.html', NULL, 'a:1:{s:4:"form";a:8:{s:4:"post";s:1:"0";s:4:"code";s:1:"0";s:5:"check";s:1:"0";s:6:"member";s:1:"0";s:3:"num";s:1:"0";s:2:"ip";s:0:"";s:4:"show";a:3:{i:0;s:13:"nindexingming";i:1;s:8:"lianxiQQ";i:2;s:13:"liuyanneirong";}s:10:"membershow";a:3:{i:0;s:13:"nindexingming";i:1;s:8:"lianxiQQ";i:2;s:13:"liuyanneirong";}}}'),
(4, 3, '文章评论', 'form_comment', 'form.html', 'list_comment.html', 'show_comment.html', 1, 'a:1:{s:4:"form";a:8:{s:4:"post";s:1:"0";s:4:"code";s:1:"0";s:5:"check";s:1:"0";s:6:"member";s:1:"0";s:3:"num";s:1:"0";s:2:"ip";s:0:"";s:4:"show";a:1:{i:0;s:14:"pinglunneirong";}s:10:"membershow";a:1:{i:0;s:14:"pinglunneirong";}}}'),
(5, 2, '个人', 'member_geren', 'category_geren.html', 'list_geren.html', 'show_geren.html', NULL, NULL);

DROP TABLE IF EXISTS `xiao_model_field`;
CREATE TABLE IF NOT EXISTS `xiao_model_field` (
  `fieldid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `field` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(15) NOT NULL,
  `length` char(10) NOT NULL,
  `indexkey` varchar(10) NOT NULL,
  `isshow` tinyint(1) NOT NULL,
  `tips` text NOT NULL,
  `not_null` tinyint(1) NOT NULL DEFAULT '0',
  `pattern` varchar(255) NOT NULL,
  `errortips` varchar(255) NOT NULL,
  `formtype` varchar(20) NOT NULL,
  `setting` mediumtext NOT NULL,
  `listorder` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fieldid`),
  KEY `modelid` (`modelid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `xiao_model_field` (`fieldid`, `modelid`, `field`, `name`, `type`, `length`, `indexkey`, `isshow`, `tips`, `not_null`, `pattern`, `errortips`, `formtype`, `setting`, `listorder`, `disabled`) VALUES
(1, 1, 'content', '内容 ', '', '', '', 1, '', 0, '', '', 'editor', '', 0, 0),
(2, 2, 'content', '内容 ', '', '', '', 1, '', 0, '', '', 'editor', '', 0, 0),
(3, 3, 'nindexingming', '您的姓名', 'VARCHAR', '255', '', 1, '', 0, '', '', 'input', 'array (\n  ''size'' => ''150'',\n  ''default'' => '''',\n)', 0, 0),
(4, 3, 'lianxiQQ', '联系QQ', 'VARCHAR', '255', '', 1, '', 1, '/^[0-9]{5,20}$/', '', 'input', 'array (\n  ''size'' => ''150'',\n  ''default'' => '''',\n)', 0, 0),
(5, 3, 'liuyanneirong', '留言内容', 'VARCHAR', '255', '', 1, '', 1, '', '留言内容不能为空', 'textarea', 'array (\n  ''width'' => ''400'',\n  ''height'' => ''90'',\n  ''default'' => '''',\n)', 0, 0),
(6, 4, 'pinglunneirong', '评论内容', 'VARCHAR', '255', '', 1, '', 1, '', '评论内容不能为空', 'textarea', 'array (\n  ''width'' => ''400'',\n  ''height'' => ''90'',\n  ''default'' => '''',\n)', 0, 0);