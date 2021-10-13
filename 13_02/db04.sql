-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-09-16 10:46:34
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db04`
--

-- --------------------------------------------------------

--
-- 資料表結構 `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `msg`
--

INSERT INTO `msg` (`id`, `user`, `info`, `mail`, `tel`, `date`, `del`) VALUES
(46, '1', 'ppppp', '1@1', '111111111111', '2020-09-15 17:25:48', 1),
(47, '1', 'prprprpr[slkdsd', 'asd@as', '000000000', '2020-09-15 20:16:36', 1),
(48, '1', '99999', '1@1', '000000000', '2020-09-15 20:19:43', 1),
(49, '22', '11', '66@55', '1111111111', '2020-09-15 20:19:22', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `pk`
--

CREATE TABLE `pk` (
  `id` int(11) NOT NULL,
  `user` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `pk`
--

INSERT INTO `pk` (`id`, `user`, `info`, `mail`, `tel`, `date`, `del`) VALUES
(64, '1', '1600168329_bg.jpg', '1@1', '000000000', '2020-09-15 19:12:09', 0),
(65, 'asss', '1600168350_img4.jpg', '1@1', '000000000', '2020-09-15 19:12:30', 0),
(66, '1', '1600168775_bg3.jpg', 'asd@asd', '000000000', '2020-09-15 19:19:35', 0),
(67, '1', '1600171970_bg.jpg', 'asd@asd', '000000000', '2020-09-15 20:12:50', 0),
(68, '7', '1600171981_img4.jpg', '1@1', '1111111111', '2020-09-15 20:13:01', 0),
(69, '1', '1600171996_bg3.jpg', 'asd@asd', '1111111111', '2020-09-15 20:13:16', 0),
(70, 'asss', '1600172055_bg.jpg', 'SS@SS', '1111111111', '2020-09-15 20:14:15', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `pk`
--
ALTER TABLE `pk`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pk`
--
ALTER TABLE `pk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
