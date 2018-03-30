/*
Navicat MySQL Data Transfer

Source Server         : 本机数据库
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : deer_movie

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-30 15:59:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', 'yuanxx');
INSERT INTO `students` VALUES ('2', 'admin');
INSERT INTO `students` VALUES ('3', '李逍遥');
INSERT INTO `students` VALUES ('4', '赵灵儿');
INSERT INTO `students` VALUES ('5', '林月如');
INSERT INTO `students` VALUES ('6', '酒剑仙');
INSERT INTO `students` VALUES ('7', '阿奴');
INSERT INTO `students` VALUES ('8', '林月如');
INSERT INTO `students` VALUES ('9', '阿奴');
INSERT INTO `students` VALUES ('10', '念奴娇');
INSERT INTO `students` VALUES ('13', '小猪乔治');
INSERT INTO `students` VALUES ('14', '小朱佩奇');
INSERT INTO `students` VALUES ('15', '小朱佩奇');
INSERT INTO `students` VALUES ('16', '蔡文姬');
INSERT INTO `students` VALUES ('17', '蔡文姬');

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES ('19', '蔡文姬');
INSERT INTO `teachers` VALUES ('20', '妲己');
INSERT INTO `teachers` VALUES ('21', '白棋');
INSERT INTO `teachers` VALUES ('22', '孙悟空');

-- ----------------------------
-- Table structure for wx_user
-- ----------------------------
DROP TABLE IF EXISTS `wx_user`;
CREATE TABLE `wx_user` (
  `id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `open_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户微信openId',
  `nick_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户微信昵称',
  `avatar_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户微信头像',
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `time_out` timestamp NULL DEFAULT NULL COMMENT 'token过期时间',
  `token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='微信用户信息表';

-- ----------------------------
-- Records of wx_user
-- ----------------------------
INSERT INTO `wx_user` VALUES ('7df9b21762531177fd8784c4815a4697', 'o9Hsg0UHuW6YB-jQJMQiKO88TP2o', 'Dung Cry.', 'https://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83epu2ts9GReslLMDuhiceX3jmAPn6ATZ7atibSmVSoMO0K3mxxyPfyic3IHfhKibBCIWHwicMCWlNg2HzCA/0', '2018-03-27 16:39:40', '2018-03-27 16:39:40', null, null);
