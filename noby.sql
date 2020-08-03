-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2020 at 01:39 PM
-- Server version: 10.2.31-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u875731674_candy`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `robux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `point`, `robux`) VALUES
(58, 425, 1700),
(59, 850, 3400),
(60, 1275, 5100),
(61, 150, 400),
(62, 2000, 10000),
(63, 3200, 22500);

-- --------------------------------------------------------

--
-- Table structure for table `fcategory`
--

CREATE TABLE `fcategory` (
  `id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(5000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fcategory`
--

INSERT INTO `fcategory` (`id`, `point`, `name`, `link`) VALUES
(3, 45, 'freefire 172 เพรช', 'https://www.img.in.th/images/0e3634d27aa9a9ae2b03e7073024839f.jpg'),
(4, 85, 'freefire 309 เพชร', 'https://www.img.in.th/images/2e36307bf84f67a536e0d20f48947f50.jpg'),
(5, 140, 'freefire 517 เพชร', 'https://scontent.fbkk5-5.fna.fbcdn.net/v/t1.15752-9/84276624_610478846404295_8811343600672571392_n.jpg?_nc_cat=104&_nc_ohc=OOAZIA8qkcgAX8qv4Gk&_nc_ht=scontent.fbkk5-5.fna&oh=fb419071baf1c36364680ad2df80910f&oe=5ED0A9CE'),
(6, 280, 'freefire 1052 เพชร', 'https://scontent.fbkk5-6.fna.fbcdn.net/v/t1.15752-9/83578784_537931980408962_94120669238788096_n.jpg?_nc_cat=101&_nc_ohc=Ese__69ZqjwAX9UWEUW&_nc_ht=scontent.fbkk5-6.fna&oh=d2dc6eaf7d5a64c9b0b0e06d13e2fac8&oe=5E99212B'),
(7, 450, 'freefire 1800 เพชร', 'https://scontent.fbkk5-3.fna.fbcdn.net/v/t1.15752-9/83065900_2521651858154649_364369507675799552_n.jpg?_nc_cat=111&_nc_ohc=v8rq6kXeFUsAX9VF33c&_nc_ht=scontent.fbkk5-3.fna&oh=09be1f6a7c33966e2329489679e8055e&oe=5ED17298'),
(8, 850, 'freefire 3697 เพชร', 'https://scontent.fbkk5-4.fna.fbcdn.net/v/t1.15752-9/82913241_510915119630797_7992293307260600320_n.jpg?_nc_cat=103&_nc_ohc=AfO0a9X0qYAAX-nd__k&_nc_ht=scontent.fbkk5-4.fna&oh=a7c16cc2f8e1a62bdf144665ff7788fd&oe=5ED1DB7B'),
(9, 60, 'freefire เติม 1 สัปดาห์', 'https://scontent.fbkk5-5.fna.fbcdn.net/v/t1.15752-9/82995497_554363838488247_3469801952706035712_n.jpg?_nc_cat=104&_nc_ohc=nGCvWw9VEksAX9oK57i&_nc_ht=scontent.fbkk5-5.fna&oh=4b955f4d2f702eacbaf127f498b1ba95&oe=5EC8B29E'),
(10, 260, 'freefire เติม 1 เดือน', 'https://scontent.fbkk5-4.fna.fbcdn.net/v/t1.15752-9/82979052_481534875844589_7770975622477643776_n.jpg?_nc_cat=103&_nc_ohc=xwCt0N8XAv8AX-aPcV_&_nc_ht=scontent.fbkk5-4.fna&oh=892ad052abb57207bd32b84ee43d3541&oe=5ED9158B');

-- --------------------------------------------------------

--
-- Table structure for table `logfreefire`
--

CREATE TABLE `logfreefire` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `point` int(11) NOT NULL DEFAULT 0,
  `categoryid` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logfreefire`
--

INSERT INTO `logfreefire` (`id`, `username`, `uid`, `status`, `point`, `categoryid`, `date`) VALUES
(5, 'FewEIEI', '32131412421', 2, 20, 3, '1579959594'),
(6, 'drogon454353', '488255963', 1, 45, 3, '1579962265'),
(7, 'DarkblueEX007', '49227680', 1, 45, 3, '1579963641'),
(8, 'DarkblueEX007', '49227680', 1, 45, 3, '1579963686'),
(9, 'DarkblueEX007', '49227680', 1, 85, 4, '1579964492'),
(10, 'Namezaza', '1383798551', 1, 85, 4, '1579964823'),
(11, 'Namezaza', '1383798551', 1, 85, 4, '1579964824'),
(12, 'SHIMURA', '53251319', 1, 85, 4, '1579967540'),
(13, 'monioy', '983270043', 2, 45, 3, '1579969707'),
(14, 'nick225', 'zeroz20019', 2, 85, 4, '1579992295'),
(15, 'Kawinphop', '1664795976', 2, 85, 4, '1580003355'),
(16, 'Kawinphop', '1664795976', 2, 45, 3, '1580003380'),
(17, 'FIWGGYAJO', '505108294', 2, 45, 3, '1580005083'),
(18, '123456789zs', '926875836', 2, 45, 3, '1580019344'),
(19, '123456789zs', '926875836', 2, 85, 4, '1580019361'),
(20, 'TANG04061', '33944078', 2, 85, 4, '1580024597'),
(22, 'FewEIEI', 'test', 2, 45, 3, '1580025450'),
(23, 'FewEIEI', 'TTest', 2, 45, 3, '1580025527'),
(24, 'FewEIEI', 'tests', 2, 45, 3, '1580025563'),
(25, 'FewEIEI', 'tests', 2, 45, 3, '1580025564'),
(26, 'monioy', '983270043', 1, 45, 3, '1580026613'),
(27, 'Afkrit12', '14323065', 1, 45, 3, '1580030010'),
(28, 'TANG04061', '33944078', 1, 85, 4, '1580034271'),
(29, 'Kawinphop', '1664795976', 1, 85, 4, '1580034307'),
(30, 'Kawinphop', '1664795976', 1, 45, 3, '1580034314'),
(31, 'Namezaza', '1383798551', 1, 85, 4, '1580049890'),
(32, 'superohm1234', '1340305619', 1, 45, 3, '1580089140'),
(33, 'Photorovrpo', '1666836218', 1, 280, 6, '1580106701'),
(34, 'TTTUU', '252901332', 1, 45, 3, '1580118251'),
(35, 'TTTUU', '252901332', 1, 45, 3, '1580128069'),
(36, 'oioikai2', '36515769', 1, 45, 3, '1580131542'),
(37, 'Sumnak2019', '532277012', 1, 45, 3, '1580137903'),
(38, 'wave12345', '28720045', 1, 45, 3, '1580140754'),
(39, 'HAPPYXSTORE', '223627958', 1, 45, 3, '1580467487'),
(40, 'HAPPYXSTORE', '223627958', 1, 45, 3, '1580467492'),
(41, 'HAPPYXSTORE', '356846904', 1, 45, 3, '1580467765'),
(42, '0652195933', '784613666', 1, 85, 4, '1580478265'),
(43, 'minxDow', '71151377', 1, 85, 4, '1580530558'),
(44, 'robloxkung77', '196005126', 1, 45, 3, '1580550351'),
(45, 'Autt', '78111293', 1, 85, 4, '1580556562'),
(46, 'thajopgot', '18915349', 1, 140, 5, '1580615986'),
(47, 'thajopgot', '18915349', 1, 45, 3, '1580616007'),
(48, 'mklol36', '225954588', 1, 140, 5, '1580634296'),
(49, 'mklol36', '225954588', 1, 85, 4, '1580634897'),
(50, 'kittithast', '107920440', 1, 280, 6, '1580647482'),
(51, 'nick04050', '24743993', 1, 140, 5, '1580649892'),
(52, 'EEEeEren123', '497807384', 1, 85, 4, '1580650378'),
(53, 'reaper9861', '1237126545', 1, 140, 5, '1580724959'),
(54, 'reaper9861', '1237126545', 1, 45, 3, '1580724991'),
(55, 'reaper9861', '1237126545', 1, 45, 3, '1580724991'),
(56, 'kuykuy', '126065442', 1, 45, 3, '1580795710'),
(57, 'ant14145', '488118617', 1, 280, 6, '1580904485'),
(58, 'Chanonpee', '1633906438', 1, 280, 6, '1580990825'),
(59, 'Chanonpee', '1633906438', 1, 45, 3, '1580999631'),
(60, 'Godnoob1000', '488340907', 1, 45, 3, '1581057327'),
(61, 'User555', '1679230380', 1, 85, 4, '1581081874'),
(62, 'Dieo1470', '576989566', 1, 60, 9, '1581086967'),
(63, 'Nine', '799508998', 1, 45, 3, '1581122819'),
(64, 'Nine', '799508998', 1, 45, 3, '1581122847'),
(65, 'kengkung5', '1658571747', 1, 45, 3, '1581132925'),
(66, 'Boom', '97035608', 1, 45, 3, '1581206383'),
(67, 'Boom', '97035608', 1, 45, 3, '1581206563'),
(68, 'ooppoo', '436710372', 1, 85, 4, '1581223821'),
(69, 'YANGTAIRONG', '359423263', 1, 280, 6, '1581240312'),
(70, 'BEAM9999', '452500451', 1, 85, 4, '1581245919'),
(71, 'Kensokung47', '66389637', 1, 140, 5, '1581304062'),
(72, 'butterkub', '281403522', 1, 45, 3, '1581319549'),
(73, 'butterkub', '281403522', 1, 45, 3, '1581319552'),
(74, 'Dieo1470', '576989566', 1, 45, 3, '1581413278'),
(75, 'Aovopxyz', '78055431', 1, 45, 3, '1581524569'),
(76, 'palmza123ww', '428562079', 1, 280, 6, '1581594947'),
(77, 'MaxG09', '18902091', 1, 85, 4, '1581657595'),
(80, 'sonykak1234', '171577881', 1, 85, 4, '1583236476'),
(81, 'azrgonn', '820035430', 1, 45, 3, '1583669613'),
(82, 'oshi', '286000899', 1, 85, 4, '1584432647'),
(83, 'Pee123456zxc', '1633906438', 1, 45, 3, '1584600280'),
(84, 'pize81io', '1063534719', 1, 45, 3, '1584612688'),
(85, 'kong030', '1721750076', 1, 140, 5, '1584673172'),
(86, 'kong030', '1721750076', 1, 85, 4, '1584673225'),
(87, 'Thanaphat', '46372881', 1, 85, 4, '1584692444'),
(88, 'Thanaphat', '46372881', 1, 85, 4, '1584785392'),
(89, 'Namezaza', '802223877', 1, 45, 3, '1584793915'),
(90, 'kozxv24', '84457941', 1, 140, 5, '1584839464'),
(91, 'Lav', '1726491750', 1, 85, 4, '1584944466'),
(92, 'kuneaster', '78236381', 1, 45, 3, '1585033379'),
(93, 'Wandzen123z', '1572988903', 1, 45, 3, '1585373982'),
(94, 'SCPHDDTV2', '830976259', 1, 45, 3, '1585399962'),
(95, 'm0934474311y', '17122894', 1, 85, 4, '1585647519'),
(96, 'm0934474311y', '17122894', 1, 45, 3, '1585647529'),
(97, 'SPmozaa', '206781668', 1, 85, 4, '1585736985');

-- --------------------------------------------------------

--
-- Table structure for table `logidpass`
--

CREATE TABLE `logidpass` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `robux` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logrov`
--

CREATE TABLE `logrov` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `point` int(11) NOT NULL DEFAULT 0,
  `categoryid` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logrov`
--

INSERT INTO `logrov` (`id`, `username`, `uid`, `status`, `point`, `categoryid`, `date`) VALUES
(80, 'LuxyzX', '5651515415', 1, 444, 11, '1582382302');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `date`) VALUES
(14, 'TEST ประกาศข้อความ', '1587528019');

-- --------------------------------------------------------

--
-- Table structure for table `rcategory`
--

CREATE TABLE `rcategory` (
  `id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(5000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rcategory`
--

INSERT INTO `rcategory` (`id`, `point`, `name`, `link`) VALUES
(13, 55, '55', '55'),
(14, 888, '54wqdwqd', 'https://cdn.discordapp.com/attachments/645211763788218377/679638351359508500/ReaperX.png');

-- --------------------------------------------------------

--
-- Table structure for table `robux`
--

CREATE TABLE `robux` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `robux` int(11) NOT NULL DEFAULT 0,
  `point` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `string1` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `string2` varchar(3000) CHARACTER SET utf8 NOT NULL,
  `string3` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `string4` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `string1`, `string2`, `string3`, `string4`) VALUES
(1, 'Miubux บริการเติมเกม Roblox ราคาสุดคุ้ม', 'https://cdn.discordapp.com/attachments/554664529175511046/702483581531848794/LogoPNG.png', 'Kanit', 'https://cdn.discordapp.com/attachments/523859974447693834/702329317144789062/unknown.png'),
(2, '0642192538', 'jsa453953', '03f622b229ce7fdc4419ae0bad91a46c', 'ธนวัฒน์ สนิทเนาว์'),
(3, '4', '', '', ''),
(4, 'light', 'danger', 'light', 'black'),
(5, '18', '<div class=\"fb-page\" data-href=\"https://www.facebook.com/MIUBUX\" data-tabs=\"timeline\" data-width=\"\" data-height=\"\" data-small-header=\"false\" data-adapt-container-width=\"true\" data-hide-cover=\"false\" data-show-facepile=\"true\"><blockquote cite=\"https://www.facebook.com/MIUBUX\" class=\"fb-xfbml-parse-ignore\"><a href=\"https://www.facebook.com/MIUBUX\">Miubux</a></blockquote></div>', 'Miubux', ''),
(6, '6LcXocgUAAAAADtKVS8OgmPujrbK7o2_05CoVwie', '6LcXocgUAAAAALskPNWnOlfZD2oYMDU3CMHt_6IW\r\n', '', ''),
(7, 'https://scontent.fbkk2-8.fna.fbcdn.net/v/t1.15752-9/80094430_745936945912526_1764760959089377280_n.jpg?_nc_cat=100&_nc_eui2=AeHcpAI-SeHsTyTAJMa_fs8Mq8lsISj-maNXuyC8-BKKBkKW9XgESvEYLQs4pEKRQK9emPjK7JbJlsjv7m6U_9vC4YlbCm-bzHtIG06LfjjYEA&_nc_oc=AQmVWSnxbqap-dZxFX2Pqku4ZJNAAdNoNsHJX4LrVyuneqHhPsSb58J0fnGgIz6MBC4&_nc_ht=scontent.fbkk2-8.fna&oh=3fca062e6d08d5080924110ef359a506&oe=5E66D34C', 'https://scontent.fbkk2-6.fna.fbcdn.net/v/t1.15752-9/79514180_2277955985829688_9117743655581384704_n.jpg?_nc_cat=104&_nc_eui2=AeHcfX_HmrWMAhB3mQLnSh1VChMA6HCjN41FKySLQWoTHs1O_3e0vaVLyRjqDYBtAObr_UKajFJQVYUxlSp1ahl5wr5zwq3Cggxl8osveQx-wA&_nc_oc=AQkksYP88-ZdHrDyYehTPBg_ogW_zgYfDWfduYt8JB03sG45UMPVC4rhjxnY6JWVQhA&_nc_ht=scontent.fbkk2-6.fna&oh=22b3fd62aac4e6c21ac05e8313f47c20&oe=5E726570', 'https://scontent.fbkk2-8.fna.fbcdn.net/v/t1.15752-9/81214613_380605226077556_2589355445395128320_n.jpg?_nc_cat=100&_nc_eui2=AeGQ6-mpGhQKFD9vVSS0EXbOAZkSfEMUAQT2BCuYbMEv9WqX-YZFAqbdFlN_lMd6CRdTFe9NCrW_tCgzOC07RV4oP7ilTAAkM4MYPLaDZDqjBQ&_nc_oc=AQkOhrq6g5FkDSW3QMMWTRkZVy0LKiQERv_9kuQD7Q0ij7yIGehtcwCrxwJbl5Mhg7o&_nc_ht=scontent.fbkk2-8.fna&oh=d5cbc52f09c1860d1f96d4908342de90&oe=5E6C6A89', ''),
(8, 'https://scontent.fbkk5-3.fna.fbcdn.net/v/t1.0-9/88147057_101853854766670_5614224955471298560_n.png?_nc_cat=111&_nc_sid=dd9801&_nc_eui2=AeEk5_XqOpu2VDDfDkcr_BCOe7E-bEgFZb97sT5sSAVlv824QbLPKsouOIGifFJS3RNzdxgWfDD92FVi9eq3pE9l&_nc_ohc=0tpwPVyTljAAX-CwBpv&_nc_ht=scontent.fbkk5-3.fna&oh=70b12496daadb50603e16be938b2c441&oe=5EC57CDE', 'https://scontent.fbkk5-3.fna.fbcdn.net/v/t1.0-9/88147057_101853854766670_5614224955471298560_n.png?_nc_cat=111&_nc_sid=dd9801&_nc_eui2=AeEk5_XqOpu2VDDfDkcr_BCOe7E-bEgFZb97sT5sSAVlv824QbLPKsouOIGifFJS3RNzdxgWfDD92FVi9eq3pE9l&_nc_ohc=0tpwPVyTljAAX-CwBpv&_nc_ht=scontent.fbkk5-3.fna&oh=70b12496daadb50603e16be938b2c441&oe=5EC57CDE', 'https://scontent.fbkk5-3.fna.fbcdn.net/v/t1.0-9/88147057_101853854766670_5614224955471298560_n.png?_nc_cat=111&_nc_sid=dd9801&_nc_eui2=AeEk5_XqOpu2VDDfDkcr_BCOe7E-bEgFZb97sT5sSAVlv824QbLPKsouOIGifFJS3RNzdxgWfDD92FVi9eq3pE9l&_nc_ohc=0tpwPVyTljAAX-CwBpv&_nc_ht=scontent.fbkk5-3.fna&oh=70b12496daadb50603e16be938b2c441&oe=5EC57CDE', ''),
(9, '02:03', '00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL DEFAULT 0,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `point` int(11) NOT NULL DEFAULT 0,
  `totalpoint` int(11) NOT NULL DEFAULT 0,
  `rank` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `point`, `totalpoint`, `rank`) VALUES
(6980, 'Luxyz', 'qwdqwdqwdq@gmail.com', '680c7eec75bc70e472842474667779c4', 0, 0, 1),
(6981, 'timekub123', 'natthaphat.suyananthana@gmail.com', '99132d54a525a8e0b04a0d1041135487', 0, 0, 0),
(6982, 'AdminMiubux', 'phetphonlapat@gmail.com', '2d141162dc3c08fc1a1e0d55b3af2c36', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `transactions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `transactions`, `money`, `date`, `status`) VALUES
(118, '50004173785054', 300, '', 0),
(119, '50004173224279', 538, '', 0),
(120, '50004173143567', 45, '', 0),
(121, '50004172643160', 10, '', 0),
(122, '50004172439326', 55, '', 0),
(123, '50004172320797', 100, '', 0),
(124, '50004172135941', 15, '', 0),
(125, '50004171678848', 30, '', 0),
(126, '50004171678708', 108, '', 0),
(127, '50004170834606', 500, '', 0),
(128, '50004170728885', 50, '', 0),
(129, '50004170722647', 15, '', 0),
(130, '50004170488790', 30, '', 0),
(131, '50004169899494', 20, '', 0),
(132, '50004169457887', 5, '', 0),
(133, '50004166268593', 1, '', 0),
(134, '50004166066818', 10, '', 0),
(135, '50004165694390', 20, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fcategory`
--
ALTER TABLE `fcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logfreefire`
--
ALTER TABLE `logfreefire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logidpass`
--
ALTER TABLE `logidpass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logrov`
--
ALTER TABLE `logrov`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rcategory`
--
ALTER TABLE `rcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `robux`
--
ALTER TABLE `robux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `fcategory`
--
ALTER TABLE `fcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logfreefire`
--
ALTER TABLE `logfreefire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `logidpass`
--
ALTER TABLE `logidpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `logrov`
--
ALTER TABLE `logrov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rcategory`
--
ALTER TABLE `rcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `robux`
--
ALTER TABLE `robux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2312;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2178;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6983;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
