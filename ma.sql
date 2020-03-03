SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `close` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `alerts_config` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `push_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `alerts_config` (`id`, `user_id`, `push_id`) VALUES
(1, 6, 96971);

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `privileges` int(1) NOT NULL,
  `expires` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `shcool_id` text NOT NULL,
  `inviter_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `privileges` int(1) NOT NULL,
  `ref_token` text NOT NULL,
  `ip` text NOT NULL,
  `token_date` date DEFAULT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `invite_id` text NOT NULL,
  `shcool_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `alerts_config`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `alerts_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
