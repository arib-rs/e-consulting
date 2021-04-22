-- Adminer 4.7.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `case`;
CREATE TABLE `case` (
  `id_case` varchar(200) NOT NULL,
  `case_title` varchar(100) NOT NULL,
  `case` text NOT NULL,
  `case_sender` varchar(100) NOT NULL,
  `id_casecat` int(11) NOT NULL,
  `case_created_at` datetime NOT NULL,
  `case_status` varchar(20) NOT NULL,
  `case_att` varchar(200) DEFAULT NULL,
  `case_att_filename` varchar(200) DEFAULT NULL,
  `case_last_dis` datetime DEFAULT NULL,
  PRIMARY KEY (`id_case`),
  KEY `id_casecat` (`id_casecat`),
  CONSTRAINT `case_ibfk_1` FOREIGN KEY (`id_casecat`) REFERENCES `mst_casecat` (`id_casecat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `case` (`id_case`, `case_title`, `case`, `case_sender`, `id_casecat`, `case_created_at`, `case_status`, `case_att`, `case_att_filename`, `case_last_dis`) VALUES
('20200505211049198109262005012021',	'TES AKUN BU PIPIT',	'HAI',	'198109262005012021',	1,	'2020-05-05 21:10:49',	'2',	'lampiran_20200505211049198109262005012021.png',	'CITD5400.png',	'2020-05-05 21:38:41'),
('20200505214859198109262005012021',	'abru',	'tes',	'198109262005012021',	1,	'2020-05-05 21:48:59',	'1',	NULL,	NULL,	'2020-05-05 21:48:59');

DROP TABLE IF EXISTS `case_mapping`;
CREATE TABLE `case_mapping` (
  `id_casemap` int(11) NOT NULL AUTO_INCREMENT,
  `id_casecat` int(11) NOT NULL,
  `case_solver` varchar(200) NOT NULL,
  PRIMARY KEY (`id_casemap`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `case_mapping` (`id_casemap`, `id_casecat`, `case_solver`) VALUES
(1,	1,	'1'),
(2,	2,	'2'),
(3,	3,	'3'),
(4,	4,	'4');

DROP TABLE IF EXISTS `discussion`;
CREATE TABLE `discussion` (
  `id_dis` int(11) NOT NULL AUTO_INCREMENT,
  `id_case` varchar(200) NOT NULL,
  `dis_reply` text NOT NULL,
  `dis_sender` varchar(100) NOT NULL,
  `dis_receiver` varchar(100) NOT NULL,
  `dis_date` datetime NOT NULL,
  `dis_read` datetime DEFAULT NULL,
  `dis_approve` datetime DEFAULT NULL,
  `dis_att` varchar(200) DEFAULT NULL,
  `dis_att_filename` varchar(200) DEFAULT NULL,
  `dis_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dis`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `discussion` (`id_dis`, `id_case`, `dis_reply`, `dis_sender`, `dis_receiver`, `dis_date`, `dis_read`, `dis_approve`, `dis_att`, `dis_att_filename`, `dis_deleted`) VALUES
(16,	'20200505211049198109262005012021',	'jawab tes',	'198109262005012021',	'1',	'2020-05-05 21:11:14',	'2020-05-05 21:36:51',	'2020-05-05 21:11:14',	'lampiran_20200505211114198109262005012021.JPG',	'IMG_6783.JPG',	NULL),
(17,	'20200505211049198109262005012021',	'skuy',	'1',	'198109262005012021',	'2020-05-05 21:38:41',	'2020-05-05 21:41:23',	'2020-05-05 21:41:01',	'lampiran_202005052138411.png',	'CITD5400.png',	NULL);

DROP TABLE IF EXISTS `mst_casecat`;
CREATE TABLE `mst_casecat` (
  `id_casecat` int(11) NOT NULL AUTO_INCREMENT,
  `casecat_name` varchar(200) DEFAULT NULL,
  `casecat_created_at` datetime NOT NULL,
  PRIMARY KEY (`id_casecat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `mst_casecat` (`id_casecat`, `casecat_name`, `casecat_created_at`) VALUES
(1,	'Konsultasi pengelolaan keuangan OPD',	'2020-04-30 08:59:49'),
(2,	'Konsultasi pengelolaan keuangan desa',	'2020-04-30 09:00:17'),
(3,	'Konsultasi agenda Reformasi birokrasi',	'2020-04-30 09:00:35'),
(4,	'Konsultasi tindak pidana korupsi/gratifikasi',	'2020-04-30 09:00:46');

DROP TABLE IF EXISTS `mst_user`;
CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_group` varchar(100) NOT NULL,
  `user_created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `mst_user` (`id_user`, `fullname`, `username`, `password`, `user_group`, `user_created_at`) VALUES
(0,	'Administrator',	'admin',	'bb41197c23f7082215d564016dddb118',	'0',	NULL),
(1,	'Irban 1',	'irban1',	'e08350a7c7a1be1f7e30d8cce52bcfbb',	'2',	'2020-04-30 09:02:30'),
(2,	'Irban 2',	'irban2',	'ce7443f29e6d869b57ec261124260b64',	'2',	NULL),
(3,	'Irban 3',	'irban3',	'0f4623908e98ccd660053cf3e7aeb06c',	'2',	NULL),
(4,	'Irban 4',	'irban4',	'34ecef1d56d066c5512d8312559a5d86',	'2',	NULL),
(5,	'Inspektur',	'inspektur',	'ebd685954a2fc560f2663a073d8cb014',	'1',	NULL);

-- 2020-05-07 23:16:33
