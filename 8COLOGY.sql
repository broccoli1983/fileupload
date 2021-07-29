-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 29 日 16:20
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `8COLOGY`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `t_activites`
--

CREATE TABLE `t_activites` (
  `id` int(3) NOT NULL,
  `activites_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activites_name` varchar(72) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `t_activites`
--

INSERT INTO `t_activites` (`id`, `activites_date`, `activites_name`, `comment`, `img`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '20210801', '百道浜の清掃活動を始めました', '海洋ゴミ削減活動の一環として毎月1回百道浜海岸の清掃活動を始めました。', 'petcap', 0, '2021-07-29 22:38:46', '2021-07-29 22:38:46');

-- --------------------------------------------------------

--
-- テーブルの構造 `t_inquiry`
--

CREATE TABLE `t_inquiry` (
  `id` int(3) NOT NULL,
  `last_name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(72) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `t_inquiry`
--

INSERT INTO `t_inquiry` (`id`, `last_name`, `first_name`, `tel`, `email`, `subject`, `message`, `created_at`, `is_deleted`) VALUES
(1, '環境', '良子', '09012345678', 'kankyo@test.co.jp', '回収BOXについて', '回収BOXの設置場所を増やして欲しいです。', '2021-07-28 07:10:19', 0),
(4, '地球', '太郎', '09011111111', 'earth@test.co.jp', 'LINEポイントについて', 'BOXに入れた個数に応じて付与するポイントも増やして欲しいです。ご検討よろしくおねがいします。', '2021-07-28 20:25:54', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `t_activites`
--
ALTER TABLE `t_activites`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_inquiry`
--
ALTER TABLE `t_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `t_activites`
--
ALTER TABLE `t_activites`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `t_inquiry`
--
ALTER TABLE `t_inquiry`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
