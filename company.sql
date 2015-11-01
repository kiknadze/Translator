

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`ID`, `Name`) VALUES
(1, 'ENG'),
(2, 'GEO'),
(3, 'RUS'),
(4, 'ფრანგული'),
(5, 'vakho'),
(6, 'vava'),
(10, 'asdas'),
(11, 'giorgi');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE IF NOT EXISTS `words` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Text` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Definition` varchar(512) CHARACTER SET utf8 NOT NULL,
  `LangID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`ID`, `Text`, `Definition`, `LangID`) VALUES
(1, 'ვაშლი', 'Apple', 1),
(2, 'ვაშლი', 'яблоко', 3),
(4, 'თემო', 'Temo', 1),
(6, 'მიშა', 'misha', 1),
(7, 'ნუგო', 'nugo', 3),
(8, 'apple', 'ვაშლი', 2);


