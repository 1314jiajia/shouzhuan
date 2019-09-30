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

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
`id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '综合',
`keywords` varchar(255)  NOT NULL DEFAULT '' COMMENT '关键词',
`description` varchar(255)  NOT NULL DEFAULT '' COMMENT '描述',
`url` varchar(255) NOT NULL DEFAULT '' COMMENT '下载地址',
`title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
`browse` int(11) NOT NULL DEFAULT 0 COMMENT'浏览次数',
`grade` tinyint(3) NOT NULL DEFAULT 0 COMMENT '评分,1代表一颗星 2代表两颗星...',
`size` int(11) NOT NULL DEFAULT 0 COMMENT '文件大小',
`label` varchar(11) NOT NULL DEFAULT '' COMMENT '标签',
`content` varchar(512) NOT NULL DEFAULT '' COMMENT '内容',
`images` varchar(255) NOT NULL DEFAULT '' COMMENT '内容图片',
`icons` int(11) NOT NULL DEFAULT 0 COMMENT '标题小图标',
`type` tinyint(3) NOT NULL DEFAULT 0 COMMENT '0,安卓;1苹果;2综合;3手赚咨询',
`recommend` tinyint(3) NOT NULL DEFAULT 0 COMMENT '推荐;0 正常显示 1 推荐置顶',
`download` tinyint(11) unsigned NOT NULL DEFAULT 0 COMMENT '下载量',
`classify` varchar(100) NOT NULL DEFAULT '' COMMENT '分类',
`created_at` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '添加时间',
`updated_at` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '修改时间',
PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT '综合表';

-- ----------------------------
-- 轮播图标 255个大概是83个汉字
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
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