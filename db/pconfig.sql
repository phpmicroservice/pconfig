-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 192.168.1.109:33306
-- 生成日期： 2019-06-09 02:24:09
-- 服务器版本： 5.6.44
-- PHP 版本： 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `pconfig`
--

-- --------------------------------------------------------

--
-- 表的结构 `alc`
--

CREATE TABLE `alc` (
  `id` int(11) NOT NULL COMMENT '自增（主键）',
  `type` enum('ip','token','object') NOT NULL COMMENT '权限类型',
  `content` varchar(200) NOT NULL COMMENT '内容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='权限对象表';

-- --------------------------------------------------------

--
-- 表的结构 `consumers`
--

CREATE TABLE `consumers` (
  `name` varchar(30) NOT NULL COMMENT '名字',
  `id` int(11) NOT NULL COMMENT '自增',
  `remark` varchar(200) NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `consumers`
--

INSERT INTO `consumers` (`name`, `id`, `remark`) VALUES
('消费这1', 1, ''),
('消费这1', 53, ''),
('消费这1', 54, ''),
('消费这1', 55, ''),
('消费这1', 56, ''),
('消费这1', 57, ''),
('消费这1', 58, ''),
('消费这1', 59, ''),
('消费这1', 60, ''),
('消费这1', 61, ''),
('消费这1', 62, ''),
('消费这1', 63, ''),
('消费这1', 64, ''),
('消费这1', 65, ''),
('消费这1', 66, ''),
('消费这1', 67, ''),
('消费这1', 68, ''),
('消费这1', 69, ''),
('消费这1', 70, ''),
('消费这1', 71, ''),
('消费这1', 72, ''),
('消费这1', 73, ''),
('消费这1', 74, ''),
('消费这1', 75, ''),
('消费这1', 76, ''),
('消费这1', 77, ''),
('消费这1', 78, ''),
('消费这1', 79, ''),
('消费这1', 80, ''),
('消费这1', 81, ''),
('消费这1', 82, ''),
('消费这1', 83, ''),
('消费这1', 84, ''),
('消费这1', 85, ''),
('消费这1', 86, ''),
('消费这1', 87, ''),
('消费这1', 88, ''),
('消费这1', 89, ''),
('消费这1', 90, ''),
('消费这1', 91, ''),
('消费这1', 92, ''),
('消费这1', 93, ''),
('消费这1', 94, ''),
('消费这1', 95, ''),
('消费这1', 96, ''),
('消费这1', 97, ''),
('消费这1', 98, ''),
('消费这1', 99, ''),
('消费这1', 100, ''),
('消费这1', 101, ''),
('消费这1', 102, ''),
('消费这1', 103, ''),
('消费这1', 104, ''),
('消费这1', 105, ''),
('消费这1', 106, ''),
('消费这1', 107, ''),
('消费这1', 108, ''),
('消费这1', 109, ''),
('消费这1', 110, ''),
('消费这1', 111, ''),
('消费这1', 112, ''),
('消费这1', 113, ''),
('消费这1', 114, ''),
('消费这1', 115, ''),
('消费这1', 116, ''),
('消费这1', 117, ''),
('消费这1', 118, ''),
('消费这1', 119, ''),
('消费这1', 120, ''),
('消费这1', 121, ''),
('消费这1', 122, ''),
('消费这1', 123, ''),
('消费这1', 124, ''),
('消费这1', 125, ''),
('消费这1', 126, ''),
('消费这1', 127, ''),
('消费这1', 128, ''),
('消费这1', 129, ''),
('消费这1', 130, ''),
('消费这1', 131, ''),
('消费这1', 132, ''),
('消费这1', 133, ''),
('消费这1', 134, ''),
('消费这1', 135, ''),
('消费这1', 136, ''),
('消费这1', 137, ''),
('消费这1', 138, ''),
('消费这1', 139, ''),
('消费这1', 140, ''),
('消费这1', 141, ''),
('消费这1', 142, ''),
('消费这1', 143, ''),
('消费这1', 144, ''),
('消费这1', 145, ''),
('消费这1', 146, ''),
('消费这1', 147, ''),
('消费这1', 148, ''),
('消费这1', 149, ''),
('消费这1', 150, ''),
('消费这1', 151, ''),
('消费这1', 152, ''),
('消费这1', 153, ''),
('消费这1', 154, ''),
('消费这1', 155, ''),
('消费这1', 156, ''),
('消费这1', 157, ''),
('消费这1', 158, ''),
('消费这1', 159, ''),
('消费这1', 160, ''),
('消费这1', 161, ''),
('消费这1', 162, ''),
('消费这1', 163, ''),
('消费这1', 164, ''),
('消费这1', 165, ''),
('消费这1', 166, ''),
('消费这1', 167, ''),
('消费这1', 168, ''),
('消费这1', 169, ''),
('消费这1', 170, ''),
('消费这1', 171, ''),
('消费这1', 172, ''),
('消费这1', 173, ''),
('消费这1', 174, ''),
('消费这1', 175, ''),
('消费这1', 176, ''),
('消费这1', 177, ''),
('消费这1', 178, ''),
('消费这1', 179, ''),
('消费这1', 180, ''),
('消费这1', 181, ''),
('消费这1', 182, ''),
('消费这1', 183, ''),
('消费这1', 184, ''),
('消费这1', 185, ''),
('消费这1', 186, ''),
('消费这1', 187, ''),
('消费这1', 188, ''),
('消费这1', 189, ''),
('消费这1', 190, ''),
('消费这1', 191, ''),
('消费这1', 192, ''),
('消费这1', 193, ''),
('消费这1', 194, ''),
('消费这1', 195, ''),
('消费这1', 196, ''),
('消费这1', 197, ''),
('消费这1', 198, ''),
('消费这1', 199, ''),
('消费这1', 200, ''),
('消费这1', 201, ''),
('消费这1', 202, ''),
('消费这1', 203, ''),
('消费这1', 204, ''),
('消费这1', 205, ''),
('消费这1', 206, ''),
('消费这1', 207, ''),
('消费这1', 208, ''),
('消费这1', 209, ''),
('消费这1', 210, ''),
('消费这1', 211, ''),
('消费这1', 212, ''),
('消费这1', 213, ''),
('消费这1', 214, ''),
('消费这1', 215, ''),
('消费这1', 216, ''),
('消费这1', 217, ''),
('消费这1', 218, ''),
('消费这1', 219, ''),
('消费这1', 220, ''),
('消费这1', 221, ''),
('消费这1', 222, ''),
('消费这1', 223, ''),
('消费这1', 224, ''),
('消费这1', 225, ''),
('消费这1', 226, ''),
('消费这1', 227, ''),
('消费这1', 228, ''),
('消费这1', 229, ''),
('消费这1', 230, ''),
('消费这1', 231, ''),
('消费这1', 232, ''),
('消费这1', 233, ''),
('消费这1', 234, ''),
('消费这1', 235, ''),
('消费这1', 236, ''),
('消费这1', 237, ''),
('消费这1', 238, ''),
('消费这1', 239, ''),
('消费这1', 240, ''),
('消费这1', 241, ''),
('消费这1', 242, ''),
('消费这1', 243, ''),
('消费这1', 244, ''),
('消费这1', 245, ''),
('消费这1', 246, ''),
('消费这1', 247, ''),
('消费这1', 248, ''),
('消费这1', 249, ''),
('消费这1', 250, ''),
('消费这1', 251, ''),
('消费这1', 252, ''),
('消费这1', 253, ''),
('消费这1', 254, ''),
('消费这1', 255, ''),
('消费这1', 256, ''),
('消费这1', 257, ''),
('消费这1', 258, ''),
('消费这1', 259, ''),
('消费这1', 260, ''),
('消费这1', 261, ''),
('消费这1', 262, ''),
('消费这1', 263, ''),
('消费这1', 264, ''),
('消费这1', 265, ''),
('消费这1', 266, ''),
('消费这1', 267, ''),
('消费这1', 268, ''),
('消费这1', 269, ''),
('消费这1', 270, '');

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL COMMENT '自增',
  `name` varchar(50) NOT NULL COMMENT '名字',
  `type` enum('index','array','string','int','decimal','inherit') NOT NULL COMMENT '类型 有序对象,关联对象，字符串，整形，浮点型  ,合并',
  `content` varchar(100) NOT NULL COMMENT '内容',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级id',
  `remark` varchar(200) NOT NULL COMMENT '备注信息'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='配置对象表';

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`id`, `name`, `type`, `content`, `pid`, `remark`) VALUES
(1, 'admin', 'array', '', 0, '管理员信息'),
(2, 'username', 'string', 'admin', 1, '用户名'),
(3, 'password', 'string', '$2y$10$Hp7Vu.nihPjbZV1R3A3SQ.B5WO14./DmW6gWNH3v0YqT1Ugtcyl.m', 1, '密码'),
(4, 'ini', 'int', '1231556', 1, 'ini'),
(9, 'sub', 'index', '', 1, '子集'),
(11, 'username1', 'string', '11', 9, '用户名'),
(12, 'username5', 'string', 'admin12', 9, '用户名'),
(13, 'sub2', 'array', '', 9, '子集2'),
(14, 'username6', 'string', '11', 13, '用户名'),
(15, 'username7', 'string', '11', 13, '用户名17'),
(16, 'admin2', 'inherit', '', 1, '管理员信息'),
(18, 'username', 'string', 'admin2', 16, '用户名');

-- --------------------------------------------------------

--
-- 表的结构 `relation`
--

CREATE TABLE `relation` (
  `id` int(11) NOT NULL COMMENT '自增（主键）',
  `type` varchar(100) NOT NULL COMMENT '关联类型',
  `relation` varchar(100) NOT NULL COMMENT '关联关系'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='关系表';

--
-- 转储表的索引
--

--
-- 表的索引 `alc`
--
ALTER TABLE `alc`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `consumers`
--
ALTER TABLE `consumers`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`pid`);

--
-- 表的索引 `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `alc`
--
ALTER TABLE `alc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增（主键）';

--
-- 使用表AUTO_INCREMENT `consumers`
--
ALTER TABLE `consumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增', AUTO_INCREMENT=271;

--
-- 使用表AUTO_INCREMENT `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增', AUTO_INCREMENT=19;

--
-- 使用表AUTO_INCREMENT `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增（主键）';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
