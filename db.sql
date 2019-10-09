/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : duoliang

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2019-09-24 22:59:29
*/


-- ----------------------------
-- 综合表(包含,安卓赚钱,苹果赚钱,综合赚钱)
-- Table structure for article
-- ----------------------------

DROP TABLE IF EXISTS `applist`;
CREATE TABLE `article` (
`id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '综合',
'name' varchar(255) unsigned NOT NULL DEFAULT '' COMMENT '名称',
'images' varchar(255) unsigned NOT NULL DEFAULT '' COMMENT '小图标',
'tag' varchar(255) unsigned NOT NULL DEFAULT '' COMMENT '分类',
'size' int(10) unsigned NOT NULL DEFAULT 0 COMMENT '大小',
'browse' int(10) unsigned NOT NULL DEFAULT 0 COMMENT '浏览次数',
'score' tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '评分 1代表1颗星,到5结束',
'download' int(10) unsigned NOT NULL DEFAULT 0 COMMENT '下载次数',
'introduce' text() unsigned NOT NULL DEFAULT 0 COMMENT '内容介绍',
'qrcode'  varchar(255) unsigned NOT NULL DEFAULT 0 COMMENT '下载地址',
'img'  varchar(255) unsigned NOT NULL DEFAULT 0 COMMENT '内容图片',
`created_at` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '添加时间',
`updated_at` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '修改时间',
PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT '综合表';

-- ----------------------------
-- 轮播图标 255个大概是83个汉字
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `img`;
CREATE TABLE `images` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '轮播图id',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `images` varchar(255) NOT NULL DEFAULT '' COMMENT '轮播图地址',
  `created_at` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '添加时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '轮播图表';

-- ----------------------------
-- 标签表
-- Table structure for label
-- ----------------------------
DROP TABLE IF EXISTS `label`;
CREATE TABLE `label` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签id',
  `label` varchar(255) NOT NULL DEFAULT '' COMMENT '标题名称',
  `pid` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '类型id',
  `created_at` int(11) unsigned NOT NULL  DEFAULT 0 COMMENT '添加时间',
  `updated_at` int(11) unsigned NOT NULL  DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '标签表';

-- ----------------------------
-- 友情链接表
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情链接',
  `links` varchar(100) NOT NULL DEFAULT '' COMMENT '友情链接地址',
  `titile` varchar(100) NOT NULL DEFAULT '' COMMENT '链接标题',
  `created_at` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '添加时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '友情链接表';

-- ----------------------------
-- 咨询专题表
-- Table structure for special
-- ----------------------------
DROP TABLE IF EXISTS `special`;
CREATE TABLE `special` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '咨询,专题',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `description` varchar(512) NOT NULL DEFAULT '' COMMENT '描述',
  `content` varchar(512) NOT NULL DEFAULT '' COMMENT '内容',
  `browse` tinyint(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '类型 , 1是咨询 ,2是专题',
  `created_at` int(11) unsigned NOT NULL DEFAULT '' COMMENT '添加时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '咨询专题表';

-- ----------------------------
-- 用户表
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  'id' int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  'name' varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  'pwd' char(32) NOT NULL DEFAULT '' COMMENT '密码',
  'created_at' int(10) unsigned NOT NULL DEFAULT '' COMMENT '添加时间',
  'updated_at' int(10) unsigned NOT NULL DEFAULT '' COMMENT '修改时间',
  PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '用户表';