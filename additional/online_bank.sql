/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.20
Source Server Version : 50172
Source Host           : 192.168.0.20:3306
Source Database       : online_bank

Target Server Type    : MYSQL
Target Server Version : 50172
File Encoding         : 65001

Date: 2013-11-24 00:29:19
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `templates`
-- ----------------------------
DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` tinytext,
  `owner` int(11) unsigned DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `receiver_name` tinytext,
  `receiver_details` text,
  `receiver_number` tinytext,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner`),
  CONSTRAINT `owner_id` FOREIGN KEY (`owner`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of templates
-- ----------------------------
INSERT INTO `templates` VALUES ('1', '1assas', '1', '2000', 'rrrrr', 'rrrwrwe', '43534626246235654', 'bbbbb');
INSERT INTO `templates` VALUES ('5', 'title1111', '1', '11', 'asd', 'dfgs2', '1234234', '1');
INSERT INTO `templates` VALUES ('7', 'test title', '2', '11', 'asd', 'dfgs2', 'dsfsdfsdc', 'sdg43f root:x:0:0:root:/root:/bin/bash\ndaemon:x:1:1:daemon:/usr/sbin:/bin/sh\nbin:x:2:2:bin:/bin:/bin/sh\nsys:x:3:3:sys:/dev:/bin/sh\nsync:x:4:65534:sync:/bin:/bin/sync\ngames:x:5:60:games:/usr/games:/bin/sh\nman:x:6:12:man:/var/cache/man:/bin/sh\nlp:x:7:7:lp:/var/spool/lpd:/bin/sh\nmail:x:8:8:mail:/var/mail:/bin/sh\nnews:x:9:9:news:/var/spool/news:/bin/sh\nuucp:x:10:10:uucp:/var/spool/uucp:/bin/sh\nproxy:x:13:13:proxy:/bin:/bin/sh\nwww-data:x:33:33:www-data:/var/www:/bin/sh\nbackup:x:34:34:backup:/var/backups:/bin/sh\nlist:x:38:38:Mailing List Manager:/var/list:/bin/sh\nirc:x:39:39:ircd:/var/run/ircd:/bin/sh\ngnats:x:41:41:Gnats Bug-Reporting System (admin):/var/lib/gnats:/bin/sh\nnobody:x:65534:65534:nobody:/nonexistent:/bin/sh\nlibuuid:x:100:101::/var/lib/libuuid:/bin/sh\nDebian-exim:x:101:103::/var/spool/exim4:/bin/false\nstatd:x:102:65534::/var/lib/nfs:/bin/false\nsshd:x:103:65534::/var/run/sshd:/usr/sbin/nologin\nuser:x:1000:1000:user,,,:/home/user:/bin/bash\nmysql:x:104:107:MySQL Server,,,:/var/lib/mysql:/bin/false\n');
INSERT INTO `templates` VALUES ('8', 'test title', '2', '11', 'asd', 'dfgs2', 'dsfsdfsdc', 'root:x:0:0:root:/root:/bin/bash\ndaemon:x:1:1:daemon:/usr/sbin:/bin/sh\nbin:x:2:2:bin:/bin:/bin/sh\nsys:x:3:3:sys:/dev:/bin/sh\nsync:x:4:65534:sync:/bin:/bin/sync\ngames:x:5:60:games:/usr/games:/bin/sh\nman:x:6:12:man:/var/cache/man:/bin/sh\nlp:x:7:7:lp:/var/spool/lpd:/bin/sh\nmail:x:8:8:mail:/var/mail:/bin/sh\nnews:x:9:9:news:/var/spool/news:/bin/sh\nuucp:x:10:10:uucp:/var/spool/uucp:/bin/sh\nproxy:x:13:13:proxy:/bin:/bin/sh\nwww-data:x:33:33:www-data:/var/www:/bin/sh\nbackup:x:34:34:backup:/var/backups:/bin/sh\nlist:x:38:38:Mailing List Manager:/var/list:/bin/sh\nirc:x:39:39:ircd:/var/run/ircd:/bin/sh\ngnats:x:41:41:Gnats Bug-Reporting System (admin):/var/lib/gnats:/bin/sh\nnobody:x:65534:65534:nobody:/nonexistent:/bin/sh\nlibuuid:x:100:101::/var/lib/libuuid:/bin/sh\nDebian-exim:x:101:103::/var/spool/exim4:/bin/false\nstatd:x:102:65534::/var/lib/nfs:/bin/false\nsshd:x:103:65534::/var/run/sshd:/usr/sbin/nologin\nuser:x:1000:1000:user,,,:/home/user:/bin/bash\nmysql:x:104:107:MySQL Server,,,:/var/lib/mysql:/bin/false\n');
INSERT INTO `templates` VALUES ('9', '1assas', '1', '2000', 'rrrrr', 'rrrwrwe', '43534626246235654', 'bbbbb');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` tinytext,
  `password` tinytext,
  `salt` tinytext,
  `session` text,
  `balance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'a5fe578f5cb6b53dd796ab8d8fd3394bed3c8659', '6/gh', '597a526a595451794d7a68684d4749354d6a4d344d6a426b59324d314d446c684e6d59334e5467304f5749784d4441774d5451354e413d3d', '5000');
INSERT INTO `users` VALUES ('2', 'test', '24665f41f9c5eed432acf446cfbffcc19077edf0', 'NjNR', null, '1000');
