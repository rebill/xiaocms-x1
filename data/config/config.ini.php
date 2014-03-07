<?php
if (!defined('IN_XIAOCMS')) exit();

/**
 * 应用程序配置信息
 */
return array(

	/* 网站相关配置 */

	'SITE_NAME'               => 'XiaoCMS企业建站版',  //网站名称
	'SITE_THEME'              => 'default',  //模板风格,默认default
	'SITE_MOBILE'             => false,  //移动终端模板,mobile目录
	'SITE_TITLE'              => 'XiaoCMS演示站',  //网站首页SEO标题
	'SITE_KEYWORDS'           => '',  //网站SEO关键字
	'SITE_DESCRIPTION'        => '',  //网站SEO描述信息
	'SITE_WATERMARK'          => '1',  //水印功能
	'SITE_WATERMARK_ALPHA'    => '55',  //图片水印透明度
	'SITE_WATERMARK_TEXT'     => 'XiaoCMS',  //文字水印
	'SITE_WATERMARK_SIZE'     => '',  //
	'SITE_WATERMARK_POS'      => '5',  //水印位置
	'SITE_THUMB_WIDTH'        => '200',  //内容缩略图默认宽度
	'SITE_THUMB_HEIGHT'       => '200',  //内容缩略图默认高度
	'MEMBER_MODELID'          => '5',  //默认会员模型
	'MEMBER_REGISTER'         => '1',  //新会员注册
	'MEMBER_STATUS'           => '1',  //新会员审核
	'MEMBER_REGCODE'          => '1',  //注册验证码
	'MEMBER_LOGINCODE'        => '1',  //登录验证码
	'DIY_URL'                 => '0',  //开启伪静态
	'LIST_URL'                => '{dir}/',  //栏目url
	'LIST_PAGE_URL'           => '{dir}/{page}',  //栏目带分页url
	'SHOW_URL'                => '{dir}/{id}.html',  //内容页url
	'SHOW_PAGE_URL'           => '{dir}/{id}-{page}.html',  //内容分页url

);