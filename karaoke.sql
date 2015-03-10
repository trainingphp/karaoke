/*
Navicat MySQL Data Transfer

Source Server         : quyhoa
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : karaoke

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-03-09 09:49:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_id` int(6) NOT NULL,
  `phone` int(13) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'hoa', '1', '1234567890', 'hoa', '2015-03-05', '23', '23', '2015-03-05 16:53:47', '1');
INSERT INTO `customers` VALUES ('8', 'quyhoa', '1', '1234567890', 'quyhoa', '2015-03-08', '20', '22', '2015-03-08 07:54:42', '1');
INSERT INTO `customers` VALUES ('9', 'quyhoa', '2', '1234567890', 'quyhoa', '2015-03-08', '17', '19', '2015-03-08 07:57:20', '1');
INSERT INTO `customers` VALUES ('10', 'quyhoa', '1', '1234567890', 'quyhoa', '2015-03-04', '17', '19', '2015-03-08 08:00:14', '1');
INSERT INTO `customers` VALUES ('11', 'quyhoa', '6', '1234567890', 'quyhoa', '2015-03-04', '17', '19', '2015-03-08 08:02:00', '1');
INSERT INTO `customers` VALUES ('12', 'quyhoa', '10', '1234567890', 'quyhoa', '2015-03-04', '17', '19', '2015-03-08 08:04:15', '1');
INSERT INTO `customers` VALUES ('13', 'quyhoa', '1', '1234567890', 'quyhoa', '2015-03-04', '17', '19', '2015-03-08 08:06:13', '1');
INSERT INTO `customers` VALUES ('14', 'quyhoa', '1', '1234567890', 'quyhoa', '2015-03-08', '6', '6', '2015-03-08 09:33:43', '0');
INSERT INTO `customers` VALUES ('15', 'quyhoa', '1', '1234567890', 'Đông hà', '2015-03-04', '9', '10', '2015-03-09 08:03:13', '0');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'quyen cao nhat', null);

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `customer_id` int(6) NOT NULL,
  `room_id` int(6) NOT NULL,
  `customer_info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `service_info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total` int(13) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '0', '2', '{\"name\":\"quyhoa\",\"email\":\"butchigho93@gmail.com\",\"address\":\"\\u0110\\u00f4ng h\\u00e0\",\"phone\":\"841686137003\"}', '{\"id\":\"2\",\"time_start\":\"March 9th, 2015 09:09 AM\",\"time_end\":\"March 9th, 2015 09:09 AM\",\"time\":0,\"sing\":0,\"total\":102100}', '{\"2\":{\"id\":\"2\",\"name\":\"Hoa qu\\u1ea3\",\"price\":\"100\",\"quantity\":21},\"3\":{\"id\":\"3\",\"name\":\"M\\u1ef1c kh\\u00f4\",\"price\":\"20000\",\"quantity\":\"5\"}}', '0', '2015-03-09 09:10:38');

-- ----------------------------
-- Table structure for `rooms`
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `type_id` int(6) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `floor` int(6) NOT NULL,
  `singing` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES ('1', '2', '1', '1', '0');
INSERT INTO `rooms` VALUES ('2', '2', '2', '1', '0');
INSERT INTO `rooms` VALUES ('3', '2', '3', '1', '0');
INSERT INTO `rooms` VALUES ('4', '2', '4', '1', '0');
INSERT INTO `rooms` VALUES ('5', '2', '5', '1', '0');
INSERT INTO `rooms` VALUES ('6', '1', '6', '2', '0');
INSERT INTO `rooms` VALUES ('7', '1', '7', '2', '0');
INSERT INTO `rooms` VALUES ('8', '1', '8', '2', '0');
INSERT INTO `rooms` VALUES ('9', '1', '9', '2', '0');
INSERT INTO `rooms` VALUES ('10', '1', '10', '2', '0');

-- ----------------------------
-- Table structure for `services`
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', 'bia Saigon', 'chai nhỏ', '10');
INSERT INTO `services` VALUES ('2', 'Hoa quả', 'cóc xoài ổi', '100');
INSERT INTO `services` VALUES ('3', 'Mực khô', 'Mực nguyên con', '20000');
INSERT INTO `services` VALUES ('7', 'bia HUDA', 'bia cua huế', '10000');

-- ----------------------------
-- Table structure for `types`
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', 'VIP', null, '100');
INSERT INTO `types` VALUES ('2', 'Thường', null, '70');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(13) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'hvquyet', 'e10adc3949ba59abbe56e057f20f883e', '1686137003', 'a@gmail.com', 'hongha');
INSERT INTO `users` VALUES ('5', '1', 'butchigho2', 'e10adc3949ba59abbe56e057f20f883e', '1686137003', 'butchigho@gmail.com', 'hongha');
INSERT INTO `users` VALUES ('6', '1', 'butchigho3', 'e10adc3949ba59abbe56e057f20f883e', '1686137003', 'butchigho@gmail.com', 'quang tri');
INSERT INTO `users` VALUES ('7', '1', 'butchigho', 'e10adc3949ba59abbe56e057f20f883e', '1686137003', 'butchigho@gmail.com', 'quang tri');
