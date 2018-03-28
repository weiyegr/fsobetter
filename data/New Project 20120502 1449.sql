-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema cms4
--

CREATE DATABASE IF NOT EXISTS cms4;
USE cms4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `admin_id` int(10) unsigned NOT NULL,
  `ad_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
INSERT INTO `admin` VALUES   (1,'weiyegr','801e4251ec791dde1136622357d7e824',1,1);
INSERT INTO `admin` VALUES   (2,'admin','21232f297a57a5a743894a0e4a801fc3',0,1);

DROP TABLE IF EXISTS `archive`;
CREATE TABLE `archive` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `addtime` varchar(45) NOT NULL,
  `edittime` varchar(45) NOT NULL,
  `parentid` int(10) unsigned NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `short` varchar(1000) NOT NULL,
  `num` int(10) unsigned NOT NULL,
  `wb0` text NOT NULL,
  `wby0` text NOT NULL,
  `image0` text NOT NULL,
  `file0` text NOT NULL,
  `wz0` text NOT NULL,
  `title0` text NOT NULL,
  `title` varchar(1000) NOT NULL,
  `wb1` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='文章列表';
INSERT INTO `archive` VALUES   (13,'2012-04-15','2012-04-15',18,0,'sfsdfsf_0',0,'','','','','','','sfsdfsf','');
INSERT INTO `archive` VALUES   (16,'2012-04-18 12:03:15','',0,0,'',0,'','','asdasds','','','','dasdasdasd','');
INSERT INTO `archive` VALUES   (17,'2012-04-18 12:05:01','',0,0,'',0,'','','dasdasds','','','','asdasdas','');
INSERT INTO `archive` VALUES   (18,'2012-04-18','2012-04-18',1,0,'sdfsdfsd_0',0,'fsdfsd','fsdfsdf','','','sdfsdfsdf','sdfsdfsd','sdfsdfsd','');
INSERT INTO `archive` VALUES   (15,'1334581387','1334581387',23,0,'qweqweqweqweq_0_0',0,'','','','','','','','');

DROP TABLE IF EXISTS `changgui`;
CREATE TABLE `changgui` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `baseor` int(10) unsigned NOT NULL,
  `linkor` int(10) unsigned NOT NULL,
  `changguior` int(10) unsigned NOT NULL,
  `messageor` int(10) unsigned NOT NULL,
  `rewrite` int(10) unsigned NOT NULL,
  `focusor` int(10) unsigned NOT NULL,
  `orderor` int(10) unsigned NOT NULL,
  `memberor` int(10) unsigned NOT NULL,
  `pmessageor` int(10) unsigned NOT NULL,
  `userid` varchar(45) NOT NULL,
  `userpassword` varchar(45) NOT NULL,
  `pnumber` varchar(45) NOT NULL,
  `emailor` int(10) unsigned NOT NULL,
  `email` varchar(45) NOT NULL,
  `host` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `hmail` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
INSERT INTO `changgui` VALUES   (1,1,1,1,1,0,1,1,1,0,'0','0','0',1,'weiyezjh@126.com','smtp.126.com','weiyezjh','211206','weiyezjh@126.com');

DROP TABLE IF EXISTS `focus`;
CREATE TABLE `focus` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `idname` varchar(45) character set utf8 NOT NULL COMMENT '焦点图盒子ID',
  `pattern` varchar(45) character set utf8 NOT NULL COMMENT '风格应用的名称',
  `time` varchar(45) character set utf8 NOT NULL COMMENT '切换时间间隔(秒)',
  `trigger` varchar(45) character set utf8 NOT NULL COMMENT '触发切换模式',
  `width` varchar(45) character set utf8 NOT NULL COMMENT '设置宽度(主图区)',
  `height` varchar(45) character set utf8 NOT NULL COMMENT '设置高度(主图区)',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `focus` VALUES   (1,'boxID','mF_sohusports','3','click','998','288');

DROP TABLE IF EXISTS `focus_list`;
CREATE TABLE `focus_list` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(500) NOT NULL,
  `describe` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `num` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `headlink`;
CREATE TABLE `headlink` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `link_title` text NOT NULL,
  `link_url` text NOT NULL,
  `link_id` text NOT NULL,
  `link_class` text NOT NULL,
  `link_type` text NOT NULL,
  `parentid` varchar(45) NOT NULL,
  `item_id` varchar(45) NOT NULL,
  `qqqw` int(10) unsigned NOT NULL,
  `ontype` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `image_list`;
CREATE TABLE `image_list` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `postid` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL COMMENT '图片说明',
  `filename` varchar(1000) NOT NULL COMMENT '图片文件名',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='图片库';

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `language` varchar(45) NOT NULL,
  `keyword` varchar(45) NOT NULL,
  `pd` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
INSERT INTO `language` VALUES   (53,'中文','cn',0);

DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(500) NOT NULL,
  `url` text NOT NULL,
  `num` float NOT NULL,
  `image` text NOT NULL,
  `language` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
INSERT INTO `link` VALUES   (16,'asdfsdf1','1',1,'1334751998_网站3.jpg','cn');

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `uid` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `image0` text NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
INSERT INTO `member` VALUES   (36,'weiyegr1','2112061','1334765206_20099917242563875.jpg');
INSERT INTO `member` VALUES   (37,'dasdasda','dasdasd','1334765218_200981410493935030.jpg');

DROP TABLE IF EXISTS `member_meta`;
CREATE TABLE `member_meta` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(45) NOT NULL,
  `fetch` varchar(45) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
INSERT INTO `member_meta` VALUES   (107,'图片','image0',2,100,100);

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `arpostid` int(10) unsigned NOT NULL,
  `mempostid` int(10) unsigned NOT NULL,
  `title` varchar(1000) NOT NULL,
  `addtime` varchar(45) NOT NULL,
  `isread` int(10) unsigned NOT NULL,
  `image0` text NOT NULL,
  `image1` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
INSERT INTO `message` VALUES   (12,0,0,'sdafasdfsdfsdfsdf','2012-04-18 12:06:16',1,'sdfsdfsd','');
INSERT INTO `message` VALUES   (11,0,0,'sdasdas','2012-04-18 12:05:23',1,'dasdasdaasdasda','');
INSERT INTO `message` VALUES   (13,0,0,'sadfsd','2012-04-18 12:06:38',1,'fsdfsdf','');
INSERT INTO `message` VALUES   (14,0,0,'asdfadf','2012-04-18 16:01:24',1,'sdfsdfsd','1334764899_200981410494592049.jpg');

DROP TABLE IF EXISTS `message_meta`;
CREATE TABLE `message_meta` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(45) character set utf8 NOT NULL,
  `fetch` varchar(45) character set utf8 NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
INSERT INTO `message_meta` VALUES   (7,'图片','image1',2,100,100);
INSERT INTO `message_meta` VALUES   (6,'图片','image0',0,100,100);

DROP TABLE IF EXISTS `myorder`;
CREATE TABLE `myorder` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `uid` varchar(45) NOT NULL,
  `orderid` varchar(500) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobilephone` varchar(45) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `email` varchar(500) NOT NULL,
  `post` varchar(45) NOT NULL,
  `payment` varchar(45) NOT NULL,
  `freight` int(10) unsigned NOT NULL,
  `remark` varchar(500) NOT NULL,
  `productcode` varchar(45) NOT NULL,
  `productname` varchar(45) NOT NULL,
  `productprice` float(9,2) NOT NULL,
  `productquantity` varchar(45) NOT NULL,
  `categoryname` varchar(45) NOT NULL,
  `short` varchar(45) NOT NULL,
  `image` varchar(500) NOT NULL,
  `parentid` int(10) unsigned NOT NULL,
  `tatalaccount` float(9,2) NOT NULL,
  `state` varchar(45) NOT NULL,
  `isread` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='订单';

DROP TABLE IF EXISTS `myorder_field`;
CREATE TABLE `myorder_field` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `keyword` text NOT NULL,
  `type` text NOT NULL,
  `title` text NOT NULL,
  `property` text NOT NULL,
  `num` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `myorder_meta`;
CREATE TABLE `myorder_meta` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `post_id` int(10) unsigned NOT NULL,
  `meta_title` text NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `setting` VALUES   (1);

DROP TABLE IF EXISTS `setting_meta`;
CREATE TABLE `setting_meta` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(45) NOT NULL,
  `fetch` varchar(45) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `statistics`;
CREATE TABLE `statistics` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `time` varchar(45) NOT NULL,
  `pv` int(10) unsigned NOT NULL,
  `ip` int(10) unsigned NOT NULL,
  `iplist` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
INSERT INTO `statistics` VALUES   (1,'2012-01-07',3,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (2,'2012-01-08',8,3,'');
INSERT INTO `statistics` VALUES   (3,'2012-01-06',5,2,'');
INSERT INTO `statistics` VALUES   (4,'2012-02-04',1,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (5,'2012-02-16',1,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (6,'2012-02-18',2,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (7,'2012-04-10',2,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (8,'2012-04-11',2,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (9,'2012-04-13',1,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (10,'2012-04-16',1,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (11,'2012-04-18',1,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (12,'2012-04-19',8,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (13,'2012-04-22',2,1,'127.0.0.1');
INSERT INTO `statistics` VALUES   (14,'2012-04-23',3,1,'127.0.0.1');

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `parentid` int(10) unsigned NOT NULL,
  `title` varchar(1000) NOT NULL COMMENT '栏目名',
  `short` varchar(1000) NOT NULL COMMENT '缩略名',
  `type` int(10) unsigned NOT NULL COMMENT '栏目类型（分类1，页面0）',
  `status` int(10) unsigned NOT NULL COMMENT '可否添加子类（可1，否0）',
  `num` int(10) unsigned NOT NULL COMMENT '排序',
  `imagelist` int(10) unsigned NOT NULL COMMENT '图片库（开启1，不开启0）',
  `wb0` varchar(2000) NOT NULL,
  `yby0` varchar(2000) NOT NULL,
  `wz0` varchar(2000) NOT NULL,
  `image0` text NOT NULL,
  `weoie0` text NOT NULL,
  `wb1` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='栏目表';
INSERT INTO `type` VALUES   (1,0,'解决','JieJue_0',0,0,0,0,'1','1','1','','','');
INSERT INTO `type` VALUES   (5,3,'21321','21321_0',0,0,0,0,'','','','','','');
INSERT INTO `type` VALUES   (7,5,'qwe','qwe_0',0,0,0,0,'','','','','','');
INSERT INTO `type` VALUES   (8,0,'在此输入...','ZaiCiShuRu_1',0,0,0,0,'','','','','','');
INSERT INTO `type` VALUES   (9,0,'在此输入...','ZaiCiShuRu_2',0,1,0,0,'','','','','','');
INSERT INTO `type` VALUES   (10,9,'在此输入...','ZaiCiShuRu_3',0,0,0,0,'','','','','','');
INSERT INTO `type` VALUES   (11,0,'在此输入...','ZaiCiShuRu_4',0,2,0,0,'','','','','','');
INSERT INTO `type` VALUES   (12,11,'在此输入...','ZaiCiShuRu_5',0,0,0,0,'','','','','','');
INSERT INTO `type` VALUES   (13,1,'在此输入...','ZaiCiShuRu_6',0,0,0,0,'1','2','3','','','');
INSERT INTO `type` VALUES   (15,1,'在此输入...','ZaiCiShuRu_7',0,0,0,0,'1','2','3','','','');
INSERT INTO `type` VALUES   (16,1,'在此输入...','ZaiCiShuRu_8',0,0,0,0,'1','2','3','','','');
INSERT INTO `type` VALUES   (17,1,'我们','ZaiCiShuR_0',0,0,0,0,'1','2','\'ghfggff&quot;ssadsadasda','','','');
INSERT INTO `type` VALUES   (24,1,'asdfasdfadsf','asd_0',0,0,0,0,'adsfasdfa12','dsfasdfad12','sdfasdfasf12','1334576952_1334168553530.jpg','','');

DROP TABLE IF EXISTS `type_image`;
CREATE TABLE `type_image` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `postid` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL COMMENT '显示说明',
  `fetch` varchar(45) NOT NULL COMMENT '字段名',
  `type` int(10) unsigned NOT NULL COMMENT '文件类型（图片1，文件0）',
  `width` int(10) unsigned NOT NULL COMMENT '显示的宽度',
  `height` int(10) unsigned NOT NULL COMMENT '显示的高度',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='栏目图片';
INSERT INTO `type_image` VALUES   (24,1,'图片','image0',2,100,100);
INSERT INTO `type_image` VALUES   (25,6,'wewe','weoie0',0,100,100);
INSERT INTO `type_image` VALUES   (20,1,'文本域','yby0',1,150,150);
INSERT INTO `type_image` VALUES   (19,1,'文本','wb0',0,150,150);
INSERT INTO `type_image` VALUES   (23,1,'文章','wz0',4,150,150);
INSERT INTO `type_image` VALUES   (26,23,'文本','wb1',0,100,100);

DROP TABLE IF EXISTS `type_meta`;
CREATE TABLE `type_meta` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `postid` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `fetch` varchar(45) NOT NULL COMMENT '字段名',
  `type` int(10) unsigned NOT NULL COMMENT '字段的类型（0、文本，1、文本框，2、文章，3、文件，4、图片）',
  `width` int(10) unsigned NOT NULL COMMENT '显示图片的宽度',
  `height` int(10) unsigned NOT NULL COMMENT '显示图片的高度',
  `search` int(10) unsigned NOT NULL COMMENT '参与搜索（是1，否0）',
  `listtop` int(10) unsigned NOT NULL COMMENT '列表页显示（是1，否0）',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='文章的字段定义';
INSERT INTO `type_meta` VALUES   (2,1,'文本','wb0',0,100,100,0,0);
INSERT INTO `type_meta` VALUES   (3,1,'文本域','wby0',1,100,100,0,0);
INSERT INTO `type_meta` VALUES   (4,1,'图片','image0',2,100,100,0,0);
INSERT INTO `type_meta` VALUES   (5,1,'文件','file0',3,100,100,0,0);
INSERT INTO `type_meta` VALUES   (6,1,'文章','wz0',4,100,100,0,0);
INSERT INTO `type_meta` VALUES   (7,1,'标题','title0',0,100,100,0,0);
INSERT INTO `type_meta` VALUES   (8,23,'wb','wb1',0,100,100,0,0);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
