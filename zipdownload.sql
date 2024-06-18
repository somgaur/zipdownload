--
-- Database: `zipdownload`
--
CREATE DATABASE IF NOT EXISTS `zipdownload` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `zipdownload`;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`) VALUES
(1, '112201648445318.jpg'),
(2, '123771648445389.jpg'),
(3, '117271648445419.jpg'),
(4, '217271648445419.jpg'),
(5, '317271648445419.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;