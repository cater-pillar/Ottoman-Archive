-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 May 2021, 14:52:26
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `prikaz_nisha`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `household`
--

CREATE TABLE `household` (
  `household_id` int(10) UNSIGNED NOT NULL,
  `member_forname` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `member_surname` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fk_household_member_type_id` int(10) UNSIGNED NOT NULL,
  `household_number` int(10) NOT NULL,
  `fk_location_name_id` int(10) UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `household`
--

INSERT INTO `household` (`household_id`, `member_forname`, `member_surname`, `fk_household_member_type_id`, `household_number`, `fk_location_name_id`, `notes`) VALUES
(23, 'Ahmad-Hüseyin-ve-Ali', 'merhum-Aburrahman-Ağa', 1, 1, 5, ''),
(24, 'Ahmad', 'Osman', 1, 2, 5, ''),
(25, 'Osman', '', 5, 2, 5, ''),
(26, 'Emin', 'Ibrahim', 1, 3, 5, ''),
(27, 'Hafiz-Zid-Al-Abidi-Efendi', 'Süleyman', 1, 4, 5, ''),
(28, 'Ahmad', 'Hasan', 1, 5, 5, 'Merkumun damadı an aslı Edirne\'de -- mahallesi sakinlerinden olup iki seneden akdem Niş\'e gelip mahalle mezburde sakin olduğu\r\nMerkum ihtiyar ve alil olduğundan hizmetkarlığa dahi iktidarı olmayıp...'),
(31, 'Haci-Mustafa', 'Haci-Ahmad', 1, 6, 5, ''),
(32, 'Mehmed', 'Haci-Hafiz-Hüseyin', 6, 6, 5, ''),
(33, '', '', 3, 6, 5, ''),
(34, 'Mustafa', 'Ahmad', 1, 7, 5, 'Merkum ıkı sene akdem Ksmın arzusuyla Rah... tarafına gitmiş'),
(35, '', '', 7, 7, 5, ''),
(36, 'Şerif-Mustafa', 'İsmail', 1, 8, 5, 'Leskofça kazası Mağaş karyesine gidip...'),
(37, 'Ömer', 'Mustafa', 1, 9, 5, ''),
(38, 'Memiş', 'Ali', 1, 10, 5, ''),
(39, 'Ali-Bey', 'Abdulkerim-Bey', 1, 11, 5, ''),
(40, '', '', 2, 11, 5, ''),
(41, '', '', 7, 11, 5, 'hemşireler'),
(42, 'Hüseyin', 'Mehmed', 1, 12, 5, ''),
(44, 'Hacı-Mehmed', 'Hafiz-Ahmad', 1, 13, 5, ''),
(48, 'Numan', 'Süleyman', 1, 14, 5, ''),
(49, 'Ali-ve-karındaşları-Abdurahman-ve-Hasan', 'İbrahim', 1, 15, 5, ''),
(50, 'Abdurrahman', 'İbrahim', 4, 15, 5, ''),
(51, 'Osman', 'Abdurrahman', 1, 16, 29, 'Merkum altı altı --- yetim olup vesiyesi Yahya Paşa mahallesinde sakin Hayrah valad Osman ettiği'),
(52, 'Salih', 'Ahmad', 1, 17, 5, ''),
(53, 'Hafiz-Yusuf', 'Hacı-Mehmed-Efendi', 1, 18, 5, ''),
(54, 'Ali', 'Abdullah', 1, 19, 5, ''),
(55, 'Abdulhalil', 'Hüseyin', 1, 20, 5, ''),
(56, 'Ali', 'Hüseyin', 1, 21, 5, ''),
(57, 'Ali', 'Mustafa', 1, 22, 5, ''),
(58, 'Osman', 'Süleyman', 1, 23, 5, ''),
(59, 'Reşid', 'Ahmad', 1, 24, 5, ''),
(60, 'Haydar', 'Sadık', 1, 25, 5, ''),
(61, 'Ali', 'Abdullah', 1, 26, 5, 'Mehmed Paşa\'ya tabi hizmetkar'),
(62, 'Emin', 'Abdullah', 1, 27, 5, ''),
(63, 'Abdurrahman', 'Emin', 1, 28, 5, 'Vidin tarafına gitmiş'),
(64, 'Mustafa', 'Zeynel', 1, 29, 5, 'Zabtiye neferi olup Leskofça\'da --- tabi'),
(65, 'Ahmad', 'İbrahim', 1, 30, 5, 'Kovanları Goriçe\'de'),
(66, 'Mehmed', 'Haci-Ahmad', 1, 31, 5, 'Merkum zetim olup vesiyesi Taşköprü mahallesinde sakin Matiş valad Abdullatif - Nakden 1500 kuruş'),
(67, 'Ahmad', 'Abdullah', 1, 32, 5, ''),
(68, 'Mehmed', 'Mustafa', 1, 33, 5, ''),
(70, 'Şerif', 'Memiş', 1, 34, 5, ''),
(71, 'Salih', 'Sadık', 1, 35, 5, ''),
(72, 'Hasan', 'Abdullah', 1, 36, 5, ''),
(73, '', '', 5, 36, 5, ''),
(74, 'Abu-Bekir', 'İslam', 1, 37, 5, 'suvari sipahi'),
(75, 'Hüseyin', 'İslam', 4, 37, 5, ''),
(76, 'Hacı-Osman', 'Abdulhalim', 1, 38, 5, 'Merkum an asli Ürgüp olup altı sene akdem Niş\'e gelip mahalle-i mezbure sakin olduğu. Merkumun kaza-i mezburede başka emlakı olduğu'),
(77, 'Hasan', 'Ahmad', 1, 39, 5, ''),
(78, 'Mahmud', 'Ahmad', 1, 40, 5, 'kasap paşaya tabi hizmetkar'),
(81, 'Hacı-Ahmad', 'Ahmad', 1, 41, 5, ''),
(84, 'Merhum Riza... halilesi Ayşe Hatun', '', 1, 42, 5, ''),
(85, 'Ali', 'Mustafa', 1, 43, 5, 'telal koltukuçuluğu ticaretiyle maluf'),
(86, 'Abdulhalim', 'Ahmad', 1, 44, 5, ''),
(87, 'Salim', 'Ali', 1, 45, 5, 'merkum yetim on yaşında olup ve fakir ittüğü'),
(88, 'Mustafa', 'Abdullatif', 1, 46, 5, 'merkum yetim altı yaşında ittüğü'),
(89, 'Mehmed Efendi', 'Kortun', 1, 63, 5, 'şeriki ticaret nisf hisse'),
(90, 'Osman', 'Murat', 1, 64, 5, '...-ya tabit katib'),
(91, 'Mehmed', 'Murat', 1, 65, 5, 'Ali Beye tabi hizmetkar'),
(92, 'Unreadable', 'Abdullah', 1, 66, 5, ''),
(93, 'Mustafa', 'Salih', 1, 67, 5, ''),
(94, 'Ağuş', 'Yusuf', 1, 68, 5, ''),
(95, 'Ahmad', 'Salih', 1, 69, 5, ''),
(96, 'Mehmed', 'Mehmed', 1, 70, 5, ''),
(97, 'Halil', 'Abdullah', 1, 71, 5, ''),
(98, 'Hasan', 'Ali', 1, 72, 5, ''),
(99, 'Hasan Paşa', 'Süleyman', 1, 73, 5, 'Mahalle-i mezburede Cami-i Şerif mütevellisi'),
(100, 'Abdurrahman', 'Hasan Paşa', 5, 73, 5, 'büyük oğul'),
(101, 'Şerif', 'Hasan Paşa', 5, 73, 5, 'diğer oğul'),
(102, 'Yaşar', 'Hermiş', 1, 74, 5, 'Mahmud Paşa\'ya tabi katib'),
(103, 'Yusuf', 'Ali', 1, 75, 5, ''),
(104, 'Hacı Süleyman', 'Mehmed', 1, 76, 5, 'Merkum topçu neferi Mekke\'ye gidip hala gelmedi'),
(105, 'Osman', 'Abu Bekir', 1, 77, 5, ''),
(106, 'Ali', 'Abdullah', 1, 78, 5, ''),
(107, 'Salih', 'Ali', 1, 79, 5, ''),
(108, 'Ömer', 'Ali', 1, 80, 5, 'Paşa Cami-i Şerif kayyumu'),
(109, 'Sadık', 'Abdullah', 1, 81, 5, ''),
(110, 'Ömer', 'Ali', 1, 82, 5, ''),
(111, 'Süleyman', 'Abu Bekir', 1, 83, 5, ''),
(112, 'Ali', 'Süleyman', 5, 83, 5, ''),
(113, 'Abdurrahman', 'Ali', 1, 84, 5, ''),
(114, 'Emin Süleyman Efendi', 'Osman', 1, 85, 5, 'Mahalle-i mezbure Cami-i Şerif\'in ba-berat-ı padişahi imam-ı sani'),
(115, 'Emrullah', 'Ali', 1, 86, 5, ''),
(116, 'Hasan', 'Abdurrahman', 1, 87, 5, ''),
(117, 'Ali', 'Hasan', 1, 88, 5, ''),
(118, 'Mehmed', 'Ali', 1, 89, 5, 'Bosna tarafina gitmiş'),
(119, 'Mehmed', 'Ceyder', 1, 90, 5, ''),
(120, 'Salim', 'Ömer', 1, 91, 5, ''),
(121, 'Mehmed', 'İbrahim', 1, 92, 5, 'Merkum yetim beş yaşında olup vasiyesi Taşköprü mahallesinde sakin tüccar Ali Sipahi ittüğü. Nakden 1500'),
(122, 'Başar', 'Hüseyin', 1, 93, 5, ''),
(123, 'Osman', 'Emin', 1, 94, 5, ''),
(124, 'Hasan', 'Hüseyin', 1, 95, 5, ''),
(125, 'Merhum Hazinedar oğlu Ahmad Ağazade Hasan', '', 1, 96, 5, 'merkum yetim sekiz yaşında olup vasiyesi Ürgüpta sakin Ömüs Ömer Ağa ittüğü. Merkum an asl-ı Ürgüplü olup üç sene akdem Niş\'e gelip mahalle-i mezburede sakin olduğu ve merkumun Ürgüp\'ta başka emlakı olup kaza-i mezburde tahrir ittüğü'),
(126, 'Mustafa', 'Hüseyin', 1, 97, 5, ''),
(127, 'Mürteza', 'Mehmed', 1, 98, 5, ''),
(129, 'Hüseyin', 'Ağuş', 1, 99, 5, ''),
(130, 'Halil', 'Osman', 1, 100, 5, ''),
(131, 'Hasan', 'Tahir', 1, 101, 5, ''),
(132, 'Abdurrahman', 'Mürteza', 1, 102, 5, ''),
(133, 'Mustafa', 'Abdurrahman', 5, 102, 5, ''),
(134, 'Halil', 'İmiş', 1, 103, 5, ''),
(135, 'Raşid', 'İbrahim', 1, 104, 5, 'Merkum an asl-i Ürküplü olup iki sene akdem Niş\'e gelip mahalle-i mezburede sakin ittüğü '),
(136, 'Mustafa', 'Abdullah', 1, 105, 5, 'Bir büçük sene akdem Silistre tarafına gitmiş'),
(137, 'Beşir', 'Ahmad', 1, 106, 5, 'Merkum an asl-i Leskofça kasası Mifaş karyesi sakinlerinden olup bir sene akdem Niş\'e gelip mahalle-i mezburede sakin olduğu'),
(138, 'Halil', 'Abdullah', 1, 107, 5, ''),
(139, 'Hacı Süleyman', 'Hacı Ahmad', 1, 108, 5, 'timar geliri eklenmiş'),
(141, 'Ahmad', 'Abdullah', 1, 109, 5, ''),
(142, 'Ahmad', 'Abdullah', 1, 110, 5, ''),
(143, 'Unreadable', 'Süleyman', 1, 111, 5, 'Merkum an asl-i Yakovalı olup ticaret tarikiyle Niş\'e gelip mahalle-i mezburede sakin olduğu. Merkumun Niş\'te hiç bir nesnesi olmayıp ... rahm etmek üzere Yakova\'ya gidip vefat ittüğü temettuatı olmayıp hanesi dahi kapalı kaldığı '),
(144, 'Başar', 'Süleyman', 1, 112, 5, ''),
(145, 'Yusuf', 'Abu Bekir', 1, 113, 5, ''),
(146, 'Hüseyin Mülazim', 'Mehmed', 1, 114, 5, 'An asl-i Niş\'li olup asakir-i nizamiye-i şahanedebeşinci alayın dördüncü taburunun beşinci bölüğünün mkkam-ı sani ittüğü. Mekumun hanesi olmayup icar ile sakin olduğu.'),
(147, 'Mehmed', 'Ali', 1, 115, 5, ''),
(149, 'Kurto', 'Süleyman', 1, 116, 5, 'occupation possibly wrong'),
(150, 'Abdi', 'Başar', 1, 117, 5, 'Merkumun hanesi olmayıp icar ile sakin olduğu'),
(151, '', '', 4, 117, 5, 'Merkumun hanesi olmayıp icar ile sakin olduğu'),
(152, 'Hafız Ahmad', 'Mehmed Emın', 1, 1, 4, 'Mahalle-i mezburede Cami-i Şerif\'in imamı ve hatibi'),
(153, 'Adem', 'Yakub', 1, 2, 4, ''),
(154, 'Halil', 'Ahmad', 1, 3, 4, ''),
(155, 'Haci Ferhad', 'Abdah', 1, 4, 4, 'Merkum tüccar olup bir senede ahad a\'tasından vaki olan temettu\'u 1500 kuruş'),
(156, 'Hacı Hasan', 'Süleyman', 1, 5, 4, 'Merkum nüfüs nazirliğinde bir senede ba berat-ı alişan müresarrıf olduğu timarda eub\' hisse 2400'),
(157, 'Hüseyin', 'Emin', 1, 6, 4, ''),
(158, 'Vahabi', 'Mustafa', 1, 7, 4, ''),
(159, 'Hüseyin', 'İslam', 1, 8, 4, ''),
(160, 'Osman', 'Abdah', 1, 9, 4, ''),
(161, 'Mehmed', 'Salih', 1, 10, 4, ''),
(162, 'Mahmud', 'Mehmed', 1, 11, 4, ''),
(163, 'Mehmed', 'Abdah', 1, 12, 4, ''),
(164, 'Bahram', 'Numan', 1, 13, 4, ''),
(166, 'Hasan', 'İsmail', 1, 14, 4, ''),
(167, 'Ahmad', 'Mustafa', 1, 15, 4, ''),
(168, '', '', 5, 15, 4, ''),
(169, 'Salih', 'Unreadable', 1, 16, 4, ''),
(170, 'Ali', '', 5, 16, 4, ''),
(171, 'Mehmed', 'Abdah', 1, 17, 4, ''),
(172, '', '', 5, 17, 4, ''),
(173, '', '', 5, 17, 4, ''),
(174, 'Hacı Hüseyin', 'Mustafa', 1, 18, 4, 'couldnt read resm-ı bag'),
(175, '', '', 5, 18, 4, ''),
(176, 'Şeyh İbrahim', 'Nuruddin', 1, 19, 4, 'ba keramet-i ali mahiyesi 1800'),
(177, 'Ali', 'Ömer', 1, 20, 4, ''),
(178, 'Hüseyin Efendi', 'İbrahim', 1, 21, 4, 'imam ve hatib'),
(179, 'Abdi', 'Mustafa', 1, 22, 4, ''),
(180, 'Salih', 'İbrahim', 1, 23, 4, ''),
(181, 'Mehmed', 'Osman', 1, 24, 4, ''),
(182, '', '', 5, 24, 4, ''),
(183, 'Yusuf', 'Ahmad', 1, 25, 4, ''),
(184, 'İbrahim', 'Mustafa', 1, 26, 4, ''),
(185, 'Hüseyin', 'Seidi', 1, 27, 7, 'Bayna Evesinde kovanlık ve tarla kılle 15 kuruş 150'),
(186, 'Ahmad', 'Hasan', 1, 28, 4, ''),
(187, 'Mehmed', 'Hasan', 1, 29, 4, ''),
(188, 'Ali', 'İbrahim', 1, 30, 4, ''),
(189, 'Osman', '', 4, 30, 4, ''),
(190, 'Süleyman', 'Ahmad', 1, 31, 4, ''),
(191, 'Mustafa', 'İsmail', 1, 32, 4, ''),
(192, 'İbrahim', 'Halil', 1, 33, 4, ''),
(193, 'Emin', 'Abdah', 1, 34, 4, ''),
(194, 'Hüseyin', 'Ömer', 1, 35, 4, ''),
(195, 'Nuruddin', 'Arif', 1, 36, 4, ''),
(196, 'Ali', 'Ahmad', 1, 37, 4, ''),
(197, 'Hüseyin', 'Halil', 1, 38, 4, ''),
(198, 'Mehmed', 'Hüseyin', 1, 39, 4, ''),
(199, 'Ömer', 'Ali', 1, 40, 4, 'unknown occupatıon 80 kuruş'),
(200, 'Memiş', 'Ahmad', 1, 41, 4, ''),
(201, 'Hasan', 'İbrahim', 1, 42, 4, ''),
(202, 'Salih', 'Osman', 1, 43, 4, 'Belgrad\'a kadar'),
(203, 'Emin', 'Abdah', 1, 44, 4, ''),
(204, 'Ali', 'Yakub', 1, 45, 4, ''),
(205, 'Salih', 'Memiş', 1, 46, 4, 'Pazarcık canabine kadar gitmiş'),
(206, 'Mehmed', 'Abdah', 1, 47, 4, 'unknown occupation 150 kuruş'),
(207, 'Mustafa', 'Hasan', 1, 48, 4, 'iki seneden beri kadar gitmiş nerede olduğu bilinmez'),
(208, 'Süleyman', 'Osman', 1, 49, 4, ''),
(209, '', '', 5, 49, 4, ''),
(210, 'Ahmad', 'Mehmed', 1, 50, 4, ''),
(211, 'Selim', 'Abdah', 1, 51, 4, ''),
(212, 'Mahmud', 'Ali', 1, 52, 4, ''),
(213, 'İbrahim', 'Numan', 1, 53, 4, ''),
(214, 'Ahmad', 'Hüseyin', 1, 54, 4, ''),
(215, 'Ahmad', 'Hasan', 1, 55, 4, ''),
(216, 'Mazlum', 'Ceydar', 1, 56, 4, ''),
(217, 'Hasan', 'Ahmad', 1, 57, 4, ''),
(218, 'Hüseyin', 'İbrahim', 1, 58, 4, ''),
(219, '', '', 5, 58, 4, ''),
(220, '', '', 5, 58, 4, ''),
(221, 'Abdülkerim', 'Sadık', 1, 59, 4, ''),
(222, 'Mehmed', 'Yusuf', 1, 60, 4, 'muattal tarla 1'),
(223, 'Mehmed', 'Abdah', 1, 61, 4, ''),
(224, 'İbrahim', 'Hasan', 1, 62, 4, ''),
(225, 'Yusuf', 'Ali', 1, 63, 4, ''),
(226, 'Salih', 'Hasan', 1, 64, 4, ''),
(227, 'Hacı Emin', 'Ömer', 1, 65, 4, ''),
(228, 'Emin', 'Ali', 1, 66, 4, ''),
(229, 'Ahmad', 'Kayzah', 1, 67, 4, ''),
(230, 'Hasan', 'Ahmad', 1, 68, 4, ''),
(231, 'Hacı Hüseyin', 'İbrahim', 1, 69, 4, ''),
(232, 'Halid', 'Ömer', 1, 70, 4, ''),
(233, 'Hüseyin', 'Abdah', 1, 71, 4, ''),
(234, 'Yunus', 'İbrahim', 1, 72, 4, ''),
(235, 'İbrahim', 'Beytullah', 1, 73, 4, 'Vela Yone çiftliğinde hissesine asliyet eden'),
(236, 'Osman', 'Mehmed', 1, 74, 4, ''),
(237, 'Mehmed', 'Ali', 1, 75, 4, ''),
(238, 'Mehmed', 'İsmail', 1, 76, 4, ''),
(239, 'Ömer', 'İbrahim', 1, 77, 4, ''),
(240, 'Bahram', 'Mehmed', 1, 78, 4, ''),
(241, 'Hasan', 'Halil', 1, 79, 4, ''),
(242, 'Mürad', 'Mehmed', 1, 80, 4, ''),
(243, 'Hafız Hacı Ali', 'İsmail', 1, 81, 4, ''),
(244, 'Mustafa', 'Hasan', 1, 82, 4, ''),
(245, 'Abdurrahman', 'Mustafa', 1, 1, 8, ''),
(246, '', '', 3, 1, 8, ''),
(247, 'Ömer', 'Şerif', 1, 2, 8, 'merkumun vasiyesi kendi validesi'),
(248, 'Abdurrahman', 'Bakistan', 1, 3, 8, ''),
(249, 'Süleyman', 'Ali', 1, 4, 8, 'bir nesnesi olmayıp şunun bunun ianesiyle geçinmiş olduğu'),
(250, 'İbrahim', 'Zeynel', 1, 5, 8, '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        timarından rub\' hissesinden bir senede 500                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        '),
(251, 'Salih', 'İbrahim', 1, 6, 8, ''),
(252, 'İsmail', 'İbrahim', 1, 7, 8, '                                        Karındaşıyla beraber bir hanede ikamet. Vasiyesi mahalle-i cedidede hacı Ali ben Mustafa                                '),
(253, 'Ahmad Bey', 'Süleyman Bey', 1, 8, 8, 'merkum asakir-i şahane.... ?'),
(254, 'Şeyh Hacı Ömer Efendi', '', 1, 9, 8, ''),
(255, 'Hasan', 'Ali', 1, 10, 8, ''),
(256, 'İsmail', 'Abdah', 1, 11, 8, ''),
(258, 'Abdah ve karındaşı', 'Memiş', 1, 12, 8, 'yetamların vasiyeleri şeyh hacı Ömer efendi'),
(259, 'Salih', 'Hasan', 1, 13, 8, 'itibarlı ve sermayeli                            '),
(260, 'Emin', 'Abdah', 1, 14, 8, '            '),
(261, 'Mustafa', 'Salih', 1, 15, 8, '            '),
(262, 'Mustafa', 'Salih', 1, 16, 8, '            '),
(263, 'Hacı Unreadable Zade Kerimeleri', '', 1, 17, 8, 'Vasiyesi Hacı Ali bin Mustafa'),
(264, '', '', 2, 17, 8, '            '),
(265, 'İslam', 'Unraedable', 1, 18, 8, '            '),
(266, 'Ali', 'Abdah', 1, 19, 8, '            '),
(267, 'Süleyman Bey', 'Süleyman', 1, 20, 8, '                                        Topçu neferatından olup                                      '),
(268, 'Mustafa', 'Abdi', 1, 21, 8, 'İki seneden beri Belgrad\'a gitmiş      '),
(269, 'Hasan', 'Şakir', 1, 22, 8, '            '),
(270, 'Selim', 'Ali', 1, 23, 8, '            '),
(271, 'Aziz', 'Hasan', 1, 24, 8, '            '),
(272, 'Bekir Bey', 'Hamed Bey', 1, 25, 8, '            '),
(273, '', '', 2, 25, 8, '            '),
(274, 'İsmail', 'Mustafa', 1, 28, 8, '            '),
(275, 'Ali', 'Ahmad', 1, 27, 8, 'Semendire Sancağı            '),
(276, 'İbrahim', 'Hacı Davut', 1, 28, 8, '                                                '),
(277, 'İbrahim Bey', 'Ahmad Bey', 1, 29, 8, 'Semendire Sancağı'),
(278, 'Hafız Abdurahman', 'Halil', 1, 30, 8, 'Rizaiyye mahallesi imamı            '),
(279, 'İsmail', 'Mustafa', 1, 31, 8, '            '),
(280, 'Halil', 'Ömer', 1, 32, 8, '            '),
(281, 'Mahmud', 'Hacı Ahmad', 1, 33, 8, 'Riaziyye mahallesi camisinde'),
(282, 'Şerif', 'İbrahim', 1, 32, 8, '            '),
(283, 'Mustafa Bey', 'Hacı Ali', 1, 35, 8, '            ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `household_member_type`
--

CREATE TABLE `household_member_type` (
  `household_member_type_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `household_member_type`
--

INSERT INTO `household_member_type` (`household_member_type_id`, `type`) VALUES
(1, 'hane reisi'),
(2, 'valide'),
(3, 'halile'),
(4, 'kardeş'),
(5, 'oğul'),
(6, 'kemin'),
(7, 'hemşire');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `land`
--

CREATE TABLE `land` (
  `land_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `land`
--

INSERT INTO `land` (`land_id`, `type`) VALUES
(6, 'Bağ'),
(1, 'Gayri Mezru Tarla'),
(2, 'Mezru Tarla'),
(4, 'Müstecir Mezru Tarla'),
(5, 'Sebze Bahçesi'),
(7, 'Çayır'),
(8, 'Çiftlik'),
(3, 'İcar ile Verildiği Tarla');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `land_household`
--

CREATE TABLE `land_household` (
  `land_household_id` int(10) UNSIGNED NOT NULL,
  `fk_land_id` int(10) UNSIGNED NOT NULL,
  `fk_household_id` int(10) UNSIGNED NOT NULL,
  `area` int(10) UNSIGNED NOT NULL,
  `income` int(10) UNSIGNED NOT NULL,
  `payed_rent` int(10) UNSIGNED NOT NULL,
  `location` text COLLATE utf8mb4_bin DEFAULT NULL,
  `description` text COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `land_household`
--

INSERT INTO `land_household` (`land_household_id`, `fk_land_id`, `fk_household_id`, `area`, `income`, `payed_rent`, `location`, `description`) VALUES
(10, 8, 23, 0, 0, 0, 'Bala Virtop karyesi', ''),
(11, 8, 23, 0, 0, 0, 'Ofsinçe karyesi', ''),
(12, 8, 23, 0, 0, 0, 'Zir Ksrhmir', ''),
(13, 2, 23, 3, 135, 0, 'Bubna nam arazisi', ''),
(14, 3, 23, 600, 1039, 0, 'Bubna nam arazisi', ''),
(15, 7, 23, 80, 1600, 0, 'Bubna nam arazisi', ''),
(16, 6, 23, 4, 48, 0, 'Vinik nam bayırda', ''),
(17, 6, 23, 15, 15, 0, 'Vinik nam bayırda', ''),
(18, 6, 23, 2, 0, 0, '', 'muattal'),
(19, 5, 23, 6, 300, 0, '', 'kıt\'a 2'),
(20, 6, 24, 3, 36, 0, '', ''),
(21, 3, 24, 60, 250, 0, '', ''),
(30, 2, 31, 25, 666, 0, '', ''),
(31, 3, 31, 80, 150, 0, '', ''),
(32, 7, 31, 15, 300, 0, '', 'kıt\'a 3'),
(33, 6, 31, 3, 36, 0, '', ''),
(34, 3, 32, 210, 496, 0, '', ''),
(35, 3, 33, 12, 120, 0, '', ''),
(36, 7, 33, 2, 40, 0, '', ''),
(37, 4, 37, 7, 100, 12, '12', ''),
(38, 2, 38, 40, 657, 0, 'Kotna karyesi', ''),
(39, 8, 38, 0, 0, 0, 'Emin Kotna karyesi', 'bir miktar hisse'),
(40, 7, 38, 20, 400, 0, '', ''),
(41, 6, 38, 10, 120, 0, '', ''),
(42, 8, 39, 0, 0, 0, 'Çiçine karyesi', ''),
(43, 8, 39, 0, 0, 0, 'Rosna karyesi', 'rub\' hisse'),
(44, 8, 39, 0, 0, 0, 'Pokofça karyesi', 'nisf hisse'),
(45, 8, 39, 0, 0, 0, 'Brestofça karyesi', 'nisf hisse'),
(46, 8, 39, 0, 0, 0, 'Kutlemiş karyesi', 'nisf hisse'),
(47, 8, 39, 0, 0, 0, 'İvrela karyesi', 'on iki büçük hissede bir hisse'),
(48, 7, 39, 20, 400, 0, 'Boyna nam arazi', 'nisf hisse'),
(49, 3, 39, 108, 150, 0, 'Boyna nam arazisi', 'nisf hisse'),
(50, 7, 39, 4, 80, 0, 'Topolniçe karyesi', 'rub\' hisse'),
(51, 3, 39, 84, 75, 0, 'Vinik', 'nisf hisse'),
(52, 5, 39, 5, 200, 0, 'Niş civarında', ''),
(53, 5, 40, 2, 0, 0, '', 'cedid'),
(54, 6, 40, 8, 84, 0, '', ''),
(55, 6, 40, 0, 0, 0, '', 'ma bahçe muattal'),
(56, 2, 42, 3, 22, 0, '', ''),
(57, 4, 42, 2, 30, 0, '', ''),
(58, 8, 44, 0, 0, 0, 'Bala Tırnova karyesi', ''),
(59, 7, 44, 25, 500, 0, 'yoşa', ''),
(60, 8, 44, 0, 0, 0, 'Doğuplana karyesi', ''),
(61, 6, 44, 1, 24, 0, 'Gubriçe karyesi', ''),
(62, 3, 44, 60, 60, 0, 'Gubriçe karyesi', ''),
(63, 1, 44, 30, 0, 0, 'Gubriçe karyesi', ''),
(64, 3, 44, 48, 50, 0, 'Taşlı Bayır', ''),
(86, 8, 49, 0, 0, 0, 'Barbat karyesi', ''),
(87, 8, 49, 0, 0, 0, 'Brzi Brod', 'kovanlık'),
(88, 2, 49, 36, 1003, 0, '', ''),
(89, 6, 56, 2, 36, 0, '', ''),
(90, 6, 58, 2, 24, 0, '', ''),
(91, 6, 65, 11, 132, 0, 'Goriçe', ''),
(92, 6, 65, 4, 0, 0, '', 'yeni dikilmiş'),
(93, 2, 65, 8, 216, 0, '', ''),
(94, 8, 65, 0, 0, 0, 'Goriçe', 'kovanlık'),
(95, 6, 68, 0, 4, 0, '', 'dönümden az miktar'),
(96, 8, 75, 0, 0, 0, 'Pasyaça karyesi', ''),
(97, 6, 77, 7, 90, 0, '', ''),
(100, 6, 81, 2, 24, 0, '', ''),
(102, 3, 84, 0, 250, 0, 'Ravna', ''),
(103, 6, 86, 3, 36, 0, '', ''),
(104, 8, 89, 0, 0, 0, 'Miroşna karyesi Ürgüp Kazası', 'nisf hisse'),
(105, 2, 94, 6, 135, 0, '', 'Şeriki Hacı Abdurrahman çiftliğinde... 135 (nisf hisse)'),
(106, 3, 94, 90, 150, 0, '', ''),
(107, 7, 94, 16, 320, 0, '', ''),
(108, 6, 99, 3, 48, 0, '', ''),
(109, 6, 105, 2, 24, 0, '', ''),
(110, 8, 110, 0, 0, 0, 'Prekop Kotna Karyesi', ''),
(111, 7, 110, 6, 120, 0, '', ''),
(112, 2, 111, 69, 999, 0, 'Goriçe Kovanlığı', ''),
(113, 8, 111, 0, 0, 0, 'Goriçe Kovanlığı', ''),
(114, 6, 111, 6, 96, 0, '', ''),
(115, 8, 115, 0, 0, 0, 'Lazar karyesi', ''),
(116, 2, 115, 14, 138, 0, 'Lazar karyesi', ''),
(117, 6, 119, 13, 192, 0, '', ''),
(118, 3, 119, 140, 140, 0, '', ''),
(119, 6, 121, 2, 24, 0, '', ''),
(120, 6, 124, 2, 24, 0, '', ''),
(121, 6, 130, 1, 18, 0, '', ''),
(122, 6, 132, 1, 0, 0, '', 'cedid'),
(123, 6, 134, 1, 12, 0, '', ''),
(124, 8, 135, 0, 0, 0, 'Gare karyesi', ''),
(125, 4, 137, 6, 100, 12, 'Trupala karyesi', ''),
(126, 4, 137, 4, 80, 10, '', 'vesil oğluna tezyil'),
(127, 3, 138, 80, 150, 0, '', ''),
(128, 6, 144, 1, 12, 0, '', ''),
(129, 2, 153, 5, 250, 0, '', ''),
(130, 3, 153, 36, 332, 0, '', ''),
(131, 8, 153, 0, 0, 0, 'Leskovik', ''),
(132, 8, 153, 0, 0, 0, 'Batuşniçe', 'Urgüp kazası, nisf hisse'),
(133, 8, 153, 0, 0, 0, 'Malçe hududu', 'kovanlık'),
(134, 6, 153, 3, 36, 0, '', ''),
(135, 8, 154, 0, 0, 0, 'Kiravya', ''),
(136, 3, 154, 3, 600, 0, '', ''),
(137, 7, 154, 0, 1400, 0, '', 'kıta 1'),
(138, 6, 154, 5, 60, 0, '', ''),
(139, 5, 154, 0, 100, 0, '', 'kıta 1'),
(140, 8, 155, 0, 0, 0, 'Malnofça', ''),
(141, 6, 155, 5, 50, 0, '', ''),
(142, 3, 156, 8, 90, 0, '', ''),
(143, 5, 156, 0, 250, 0, '', 'kıt\'a 1'),
(144, 7, 156, 0, 400, 0, '', 'kıt\'a 1 araba 22'),
(145, 6, 156, 5, 60, 0, '', ''),
(146, 3, 157, 7, 75, 0, '', ''),
(147, 7, 157, 0, 200, 0, '', 'nisf çayır, araba 15'),
(148, 6, 157, 3, 36, 0, '', ''),
(149, 8, 157, 0, 0, 0, 'Batuniçe (Ürgüp)', 'nisf hisse'),
(150, 3, 158, 6, 75, 0, '', ''),
(151, 6, 158, 10, 100, 0, '', ''),
(152, 6, 160, 2, 36, 0, '', ''),
(153, 6, 167, 2, 15, 0, '', ''),
(154, 6, 174, 7, 84, 0, '', ''),
(155, 6, 176, 5, 60, 0, '', ''),
(156, 6, 177, 4, 72, 0, '', ''),
(157, 6, 179, 4, 48, 0, '', ''),
(158, 6, 183, 2, 24, 0, '', ''),
(159, 6, 184, 5, 60, 0, '', ''),
(160, 6, 185, 2, 24, 0, '', ''),
(161, 2, 188, 13, 1125, 0, '', ''),
(162, 1, 188, 14, 0, 0, '', ''),
(163, 6, 188, 11, 180, 0, '', ''),
(164, 6, 192, 2, 24, 0, '', ''),
(165, 6, 196, 3, 48, 0, '', ''),
(166, 6, 197, 6, 72, 0, '', ''),
(167, 6, 199, 1, 12, 0, '', ''),
(168, 8, 199, 0, 0, 0, 'Yerinçe', ''),
(169, 3, 200, 3, 30, 0, '', ''),
(170, 6, 204, 4, 12, 0, '', ''),
(171, 6, 208, 1, 18, 0, '', ''),
(172, 6, 210, 4, 54, 0, '', ''),
(173, 6, 211, 4, 48, 0, '', ''),
(174, 6, 218, 4, 24, 0, '', ''),
(175, 6, 222, 5, 60, 0, '', ''),
(176, 2, 225, 6, 0, 0, '', ''),
(177, 3, 225, 4, 0, 0, 'Bubna', ''),
(178, 1, 225, 11, 0, 0, '', ''),
(179, 7, 225, 0, 100, 0, '', 'kıt\'a 1'),
(180, 6, 225, 15, 200, 0, '', ''),
(181, 5, 225, 0, 240, 0, '', 'kıt\'a 2'),
(182, 6, 226, 2, 24, 0, '', ''),
(183, 6, 227, 4, 48, 0, '', ''),
(184, 6, 229, 3, 36, 0, '', ''),
(185, 6, 233, 3, 36, 0, '', ''),
(186, 3, 233, 3, 75, 0, '', ''),
(187, 6, 234, 5, 24, 0, '', ''),
(188, 6, 235, 5, 60, 0, '', ''),
(189, 3, 235, 5, 75, 0, '', ''),
(190, 7, 235, 0, 375, 0, 'Niş civarında', ''),
(191, 6, 244, 1, 6, 0, '', '                                                                                                cedid'),
(192, 8, 245, 0, 0, 0, 'Brestofiçe', 'altı(mış) hisseden bir hisse'),
(193, 8, 245, 0, 0, 0, 'Kutlemiş', 'altı hisseden bir hisse'),
(194, 8, 246, 0, 0, 0, 'Botofiçe', ''),
(195, 3, 247, 150, 300, 0, '', ''),
(196, 6, 247, 1, 28, 0, '', ''),
(197, 6, 250, 2, 45, 0, '', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                '),
(198, 4, 250, 12, 460, 0, '', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                '),
(199, 2, 251, 100, 1620, 0, '                                ', '                                '),
(200, 3, 251, 312, 765, 0, '                                ', '                                '),
(201, 7, 251, 7, 140, 0, '                                ', '                                '),
(202, 6, 251, 4, 72, 0, '                                ', '                                '),
(203, 8, 251, 0, 0, 0, 'Zir Dükat', '                                süls hisse'),
(204, 8, 251, 0, 0, 0, 'Barbat', '                                süls hisse'),
(205, 8, 251, 0, 0, 0, 'Bubna', '                                kovanlık'),
(206, 5, 251, 12, 500, 0, '                                ', '                                '),
(207, 3, 252, 385, 890, 0, '', '                                                                '),
(208, 7, 252, 4, 80, 0, '', '                                                                '),
(209, 5, 252, 6, 350, 0, '', '                                                                '),
(210, 8, 252, 0, 0, 0, 'Barbat', '                                                                rub\' hisse'),
(211, 8, 252, 0, 0, 0, 'Zir Dukat', '                                                                rub\' hisse'),
(212, 2, 254, 12, 338, 0, '', ''),
(213, 7, 254, 12, 240, 0, '', ''),
(214, 5, 254, 2, 63, 0, '', 'rub hisse'),
(215, 6, 254, 2, 30, 0, '', ''),
(216, 8, 254, 0, 0, 0, 'Knejiçe', 'nisf hisse'),
(217, 8, 254, 0, 0, 0, 'Trupala', 'altı... hisse?'),
(218, 8, 254, 0, 0, 0, 'İyazofiçe', 'rub hisse'),
(219, 6, 256, 1, 18, 0, '', ''),
(220, 7, 258, 12, 240, 0, '', ''),
(221, 5, 258, 0, 62, 0, '', 'kıta 1 rub hisse'),
(222, 8, 258, 0, 0, 0, 'Trupala', 'hisse ?'),
(223, 8, 258, 0, 0, 0, 'Abazofçe', 'kovanlık'),
(224, 8, 258, 0, 0, 0, 'Knezifçe', ''),
(225, 8, 258, 0, 0, 0, 'Barbat', ''),
(226, 6, 259, 2, 24, 0, '', ''),
(227, 6, 260, 2, 24, 0, '', ''),
(228, 7, 261, 12, 240, 0, '', ''),
(229, 3, 261, 90, 210, 0, 'Bayna Sahrası', ''),
(230, 3, 261, 72, 180, 0, 'Macar Sahrası', ''),
(231, 8, 261, 0, 0, 0, 'Diragola', 'nisf hisse'),
(232, 8, 261, 0, 0, 0, 'Baline', 'nisf hisse'),
(233, 8, 261, 0, 0, 0, 'Kanoviçe', 'nisf hisse'),
(234, 8, 261, 0, 0, 0, 'Gürkofiçe', 'rub hisse'),
(235, 3, 262, 17, 157, 0, 'Taşlı Bayır', ''),
(236, 3, 262, 18, 50, 0, 'Karye-i Balina Sahrasında', ''),
(237, 7, 262, 2, 40, 0, '', ''),
(238, 3, 264, 96, 150, 0, '', ''),
(239, 6, 267, 3, 36, 0, '                                                                ', '                                                                '),
(240, 7, 267, 10, 200, 0, '                                                                ', '                                                                '),
(241, 8, 267, 0, 0, 0, '                                                                Emin Kotna', '                                                                bir miktar hisse'),
(242, 8, 267, 0, 0, 0, '                                                                BRS', '                                                                '),
(243, 3, 268, 48, 90, 0, 'Bubna', ''),
(244, 7, 268, 8, 160, 0, 'Diraifçe', ''),
(245, 6, 268, 3, 54, 0, '', ''),
(246, 8, 269, 0, 0, 0, 'Emin Kotna', 'bir miktar hisse'),
(247, 6, 269, 1, 24, 0, '', ''),
(248, 6, 272, 1, 12, 0, '', ''),
(249, 7, 272, 7, 140, 0, 'Bayna Sahrası', ''),
(250, 3, 272, 504, 1260, 0, 'Bayna Sahrası', ''),
(251, 3, 272, 96, 160, 0, 'Bala İvrajya', ''),
(252, 8, 273, 0, 0, 0, 'Bala Makurva', ''),
(253, 8, 273, 0, 0, 0, 'Zir Diragola', ''),
(254, 7, 273, 30, 600, 0, 'Bayna', ''),
(255, 6, 274, 1, 27, 0, '', ''),
(256, 6, 277, 1, 27, 0, '', ''),
(257, 4, 279, 20, 400, 0, '', ''),
(258, 2, 279, 20, 108, 0, '', ''),
(259, 3, 279, 20, 60, 0, '', ''),
(260, 6, 279, 8, 144, 0, '', ''),
(261, 6, 280, 5, 90, 0, '', ''),
(262, 3, 280, 30, 90, 0, 'Pupofça', ''),
(263, 1, 280, 120, 0, 0, '', ''),
(264, 7, 283, 20, 400, 0, '', ''),
(265, 6, 283, 2, 48, 0, '', ''),
(266, 6, 283, 4, 0, 0, 'bakofiçe', 'muattal'),
(267, 3, 283, 210, 465, 0, 'Macar Sahrası', ''),
(268, 3, 283, 48, 180, 0, 'bayna sahrası', ''),
(269, 3, 283, 60, 125, 0, 'Pasya Polana', 'Mahmud Ali Bey'),
(270, 5, 283, 5, 100, 0, '', ''),
(271, 5, 283, 4, 120, 0, '', ''),
(272, 8, 283, 0, 0, 0, 'Matifçe', ''),
(273, 8, 283, 0, 0, 0, 'Kaltinçe', 'Mahmud Ali Bey');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `livestock`
--

CREATE TABLE `livestock` (
  `livestock_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `livestock`
--

INSERT INTO `livestock` (`livestock_id`, `type`) VALUES
(31, 'Arı Kovanı - bahçe'),
(30, 'Arı Kovanı - kıt\'a'),
(1, 'Arı Kovanı - ras'),
(11, 'At - asab'),
(14, 'At - bebek'),
(12, 'At - kısrak'),
(13, 'At - kısrak tay'),
(10, 'Bargir'),
(8, 'Keçi - kısır'),
(9, 'Keçi - oğlak'),
(7, 'Keçi - oğlak furuht'),
(6, 'Keçi - sağman'),
(5, 'Koyun - kuzu'),
(3, 'Koyun - kuzu furuht'),
(4, 'Koyun - kısır'),
(2, 'Koyun - sağman'),
(23, 'Manda - buzağı, dişi'),
(22, 'Manda - buzağı, erkek'),
(19, 'Manda - dana'),
(21, 'Manda - erkek'),
(20, 'Manda - kısır'),
(18, 'Manda - sağman'),
(16, 'Merkeb - dişi'),
(15, 'Merkeb - erkek'),
(17, 'Öküz'),
(27, 'İnek - buzağı, dişi'),
(26, 'İnek - buzağı, erkek'),
(29, 'İnek - dana'),
(25, 'İnek - kısır'),
(24, 'İnek - sağman'),
(28, 'İnek - tosun');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `livestock_household`
--

CREATE TABLE `livestock_household` (
  `livestock_household_id` int(10) UNSIGNED NOT NULL,
  `fk_livestock_id` int(10) UNSIGNED NOT NULL,
  `fk_household_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `income` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `livestock_household`
--

INSERT INTO `livestock_household` (`livestock_household_id`, `fk_livestock_id`, `fk_household_id`, `quantity`, `income`) VALUES
(1, 1, 23, 5, 0),
(2, 20, 23, 1, 0),
(3, 22, 23, 1, 0),
(4, 25, 23, 2, 0),
(5, 27, 23, 1, 0),
(6, 26, 23, 1, 0),
(7, 10, 23, 3, 0),
(14, 24, 31, 2, 20),
(15, 26, 31, 4, 0),
(16, 10, 31, 0, 0),
(17, 16, 32, 0, 0),
(18, 10, 37, 0, 0),
(19, 20, 38, 2, 0),
(20, 17, 38, 3, 0),
(21, 10, 38, 1, 0),
(22, 1, 39, 6, 24),
(23, 10, 39, 0, 0),
(24, 1, 40, 6, 24),
(25, 24, 40, 1, 10),
(26, 27, 40, 1, 0),
(27, 18, 40, 1, 15),
(28, 23, 40, 1, 0),
(29, 10, 40, 2, 0),
(30, 31, 44, 1, 20),
(31, 10, 44, 0, 0),
(38, 1, 49, 4, 16),
(39, 20, 49, 1, 0),
(40, 23, 49, 1, 0),
(41, 10, 49, 1, 0),
(42, 24, 56, 1, 10),
(43, 27, 56, 1, 0),
(44, 10, 58, 1, 0),
(45, 25, 64, 1, 0),
(46, 26, 64, 1, 0),
(47, 29, 64, 0, 0),
(48, 31, 65, 1, 50),
(49, 1, 65, 11, 44),
(50, 18, 65, 1, 20),
(51, 23, 65, 1, 0),
(52, 15, 65, 1, 0),
(53, 24, 66, 1, 10),
(54, 18, 68, 1, 20),
(55, 17, 70, 2, 0),
(56, 24, 74, 2, 20),
(57, 20, 74, 1, 0),
(58, 23, 74, 1, 0),
(59, 18, 76, 1, 20),
(60, 22, 76, 1, 0),
(61, 24, 76, 1, 10),
(62, 27, 76, 1, 0),
(63, 10, 76, 2, 0),
(64, 15, 77, 1, 0),
(67, 24, 85, 2, 20),
(68, 26, 85, 1, 0),
(69, 27, 85, 1, 0),
(70, 24, 89, 1, 10),
(71, 26, 89, 0, 0),
(72, 10, 90, 1, 0),
(73, 27, 94, 1, 0),
(74, 21, 95, 2, 0),
(75, 10, 98, 1, 0),
(76, 20, 99, 2, 0),
(77, 10, 99, 1, 0),
(78, 1, 110, 7, 28),
(79, 24, 110, 1, 10),
(80, 27, 110, 1, 0),
(81, 10, 110, 1, 0),
(82, 1, 111, 20, 80),
(83, 18, 111, 1, 15),
(84, 22, 111, 1, 0),
(85, 21, 111, 1, 0),
(86, 1, 115, 3, 12),
(87, 17, 115, 2, 0),
(88, 24, 115, 1, 10),
(89, 25, 115, 1, 0),
(90, 29, 115, 1, 0),
(91, 10, 115, 1, 0),
(92, 24, 124, 1, 10),
(93, 27, 124, 1, 0),
(94, 18, 125, 1, 20),
(95, 22, 125, 1, 0),
(96, 10, 127, 0, 0),
(98, 10, 129, 1, 0),
(99, 24, 130, 2, 20),
(100, 26, 130, 2, 0),
(101, 10, 130, 1, 0),
(102, 25, 132, 1, 0),
(103, 26, 132, 1, 0),
(104, 10, 132, 1, 0),
(105, 20, 137, 2, 0),
(106, 22, 137, 1, 0),
(107, 17, 138, 4, 0),
(108, 10, 138, 1, 0),
(109, 10, 139, 1, 0),
(111, 17, 141, 2, 0),
(113, 10, 149, 3, 0),
(114, 24, 153, 1, 7),
(115, 29, 153, 1, 0),
(116, 1, 153, 20, 80),
(117, 11, 153, 1, 0),
(118, 10, 153, 1, 0),
(119, 18, 154, 2, 30),
(120, 1, 154, 5, 20),
(121, 10, 154, 2, 0),
(122, 24, 155, 1, 10),
(123, 26, 155, 1, 0),
(124, 12, 155, 1, 0),
(125, 10, 155, 1, 0),
(126, 11, 155, 1, 0),
(127, 18, 156, 1, 15),
(128, 17, 156, 1, 0),
(129, 1, 156, 5, 20),
(130, 10, 156, 2, 0),
(131, 10, 157, 2, 0),
(132, 10, 161, 1, 0),
(133, 24, 167, 1, 7),
(134, 15, 174, 1, 0),
(135, 29, 176, 1, 0),
(136, 10, 176, 1, 0),
(137, 15, 176, 1, 0),
(138, 20, 179, 1, 0),
(139, 15, 183, 1, 0),
(140, 24, 185, 1, 10),
(141, 18, 188, 2, 30),
(142, 17, 188, 2, 0),
(143, 1, 199, 2, 8),
(144, 10, 208, 1, 0),
(145, 1, 208, 2, 8),
(146, 10, 210, 1, 0),
(147, 15, 210, 1, 0),
(148, 18, 213, 1, 15),
(149, 24, 213, 1, 10),
(150, 29, 213, 1, 0),
(151, 18, 225, 2, 30),
(152, 10, 225, 2, 0),
(153, 24, 233, 1, 7),
(154, 25, 234, 1, 0),
(155, 29, 234, 1, 0),
(156, 24, 235, 1, 10),
(157, 10, 240, 1, 0),
(158, 10, 242, 1, 0),
(159, 24, 244, 1, 7),
(160, 10, 245, 2, 0),
(161, 20, 250, 1, 0),
(162, 25, 250, 1, 0),
(163, 10, 250, 1, 0),
(164, 10, 251, 2, 0),
(165, 1, 251, 15, 60),
(166, 25, 251, 1, 0),
(167, 24, 251, 1, 10),
(168, 17, 251, 4, 0),
(169, 20, 251, 2, 0),
(170, 1, 252, 4, 16),
(171, 1, 254, 8, 32),
(172, 24, 254, 1, 10),
(173, 20, 254, 1, 0),
(174, 10, 254, 2, 0),
(175, 10, 256, 1, 0),
(176, 1, 258, 8, 32),
(177, 24, 258, 1, 10),
(178, 1, 261, 6, 24),
(179, 10, 266, 1, 0),
(180, 18, 267, 1, 10),
(181, 20, 267, 1, 0),
(182, 10, 267, 1, 0),
(183, 10, 269, 1, 0),
(184, 10, 272, 1, 0),
(185, 1, 273, 5, 20),
(186, 10, 274, 1, 0),
(187, 10, 275, 1, 0),
(188, 10, 276, 1, 0),
(189, 10, 277, 1, 0),
(190, 24, 279, 1, 7),
(191, 26, 279, 1, 0),
(192, 17, 279, 2, 0),
(193, 10, 279, 1, 0),
(194, 18, 283, 1, 15),
(195, 1, 283, 4, 16),
(196, 24, 283, 1, 10),
(197, 10, 283, 3, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `location_name`
--

CREATE TABLE `location_name` (
  `location_name_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `fk_location_type_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `fk_location_name_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `location_name`
--

INSERT INTO `location_name` (`location_name_id`, `name`, `fk_location_type_id`, `fk_location_name_id`) VALUES
(1, 'Niş', 2, NULL),
(2, 'Niş', 1, 1),
(3, 'Niş', 5, 2),
(4, 'Hünkar', 3, 2),
(5, 'Defterdar', 3, 2),
(6, 'Taşköprü', 3, 2),
(7, 'Hacı Bekir', 3, 2),
(8, 'Rizaiyye', 3, 2),
(9, 'Belgrad', 3, 2),
(10, 'Cedide', 3, 2),
(11, 'Yahyapaşa', 3, 2),
(12, 'Papaz Kosto', 3, 2),
(13, 'Papaz İstanko', 3, 2),
(14, 'Papaz Gorki', 3, 2),
(15, 'Papaz Yone', 3, 2),
(16, 'Papaz Naon', 4, 3),
(17, 'Papaz Yovan Kefere', 4, 3),
(18, 'Papaz Mito', 4, 3),
(19, 'Papaz Yovan', 4, 3),
(20, 'Yagodin', 3, 2),
(21, 'Kebir-i Çinçar', 3, 2),
(22, 'Sağir-i Çinçar', 3, 2),
(23, 'Kebir-i Koptiyan', 3, 2),
(24, 'Sağir-i Koptiyan', 3, 2),
(25, 'Mitçe Konluğu', 8, 2),
(28, 'At Pazarında Dükkanlar', 8, 2),
(29, 'Acı Goko Konluğu', 8, 2),
(30, 'Kojuşko Asıyab', 8, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `location_type`
--

CREATE TABLE `location_type` (
  `location_type_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `location_type`
--

INSERT INTO `location_type` (`location_type_id`, `type`) VALUES
(8, 'Diğer'),
(2, 'Kaza'),
(6, 'Köy'),
(3, 'Mahalle'),
(4, 'Neverye'),
(5, 'Varoş'),
(7, 'Çiftlik'),
(1, 'Şehir');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `occupation`
--

CREATE TABLE `occupation` (
  `occupation_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `fk_occupation_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `occupation`
--

INSERT INTO `occupation` (`occupation_id`, `name`, `fk_occupation_id`) VALUES
(1, 'Esnaf', NULL),
(2, 'Görevli', NULL),
(3, 'Ziraat', NULL),
(4, 'Mesleksiz', NULL),
(5, 'Ticaret', NULL),
(6, 'Askeri Alanda Hizmet Veren Görevliler', 2),
(7, 'Dini Alanda Hizmet Veren Görevliler', 2),
(8, 'İctimai ve İdari Alanda Hizmet Veren Görevliler', 2),
(9, 'İşçi', NULL),
(10, 'Unknown', NULL),
(11, 'Derıden Mal Ureten ve Satan Esnaf', 1),
(12, 'Metaldan Mal Üreten ve Satan Esnaf', 1),
(13, 'Dokumacılık Alanındaki Meslekler', 1),
(14, 'Kumaştan Mal Üreten ve Satan Esnaf', 1),
(15, 'Diğer Mal Üreten ve Satan Esnaf', 1),
(16, 'Çeşitli Hizmetleri Yerine Getirenler', 1),
(17, 'Yiyecek Maddeleri Üreten ve Satan Esnaf', 1),
(18, 'Taşımacılık Alanındaki Meslekler', 1),
(19, 'Askeri Mülazım', 6),
(20, 'Asakir-i Nizamiyye', 6),
(21, 'Binbaşı', 6),
(22, 'İşkenci Süvar', 6),
(23, 'Kır Bölük Başı', 6),
(24, 'Sekban', 6),
(25, 'Sipahi', 6),
(26, 'Sipahi Kulağası', 6),
(27, 'Zabit', 6),
(28, 'Zabit Sekban', 6),
(29, 'Zabit Sipahi', 6),
(30, 'Yüzbaşı', 6),
(142, 'Topçu', 6),
(143, 'Topçu Onbaşı', 6),
(144, 'Topçu Çavuş', 6),
(145, 'Topçu Mülazim', 6),
(146, 'Topçu Yüzbaşı', 6),
(147, 'Berber', 16),
(148, 'Çalgıcı', 16),
(149, 'Dellal', 16),
(150, 'Hamamcı', 16),
(151, 'Hamam Naziri', 16),
(152, 'Hancı', 16),
(153, 'Kahveci', 16),
(154, 'Kahveci Tabi', 16),
(155, 'Meyhaneci', 16),
(156, 'Seyis', 16),
(157, 'Şarkıcı', 16),
(158, 'Dülger', 15),
(159, 'Debbağ', 11),
(160, 'Göncü', 11),
(161, 'Kürkçü', 11),
(162, 'Saraç', 11),
(163, 'Semerci', 11),
(164, 'Yemenici', 11),
(165, 'Kalpakçı', 11),
(166, 'Çömlekçi', 15),
(167, 'Çubukçu', 15),
(168, 'Doğramacı', 15),
(169, 'Hasırcı', 15),
(170, 'İpçi', 15),
(171, 'Kiremitçi', 15),
(172, 'Koltukçu', 15),
(173, 'Lulacı', 15),
(174, 'Saatçı', 15),
(175, 'Tüfekçi', 15),
(176, 'Mumcu', 15),
(177, 'Derviş', 7),
(178, 'İmam', 7),
(179, 'Muezzin', 7),
(180, 'Müderris', 7),
(181, 'Mütevelli', 7),
(182, 'Şeyh', 7),
(183, 'Talebe-i Ulum', 7),
(184, 'Papas', 7),
(185, 'Müftü', 7),
(186, 'Abacı', 13),
(187, 'Boyacı', 13),
(188, 'Hallaç', 13),
(189, 'Kazzaz', 13),
(190, 'Keçeci', 13),
(191, 'Mutaf', 13),
(192, 'Alil', 4),
(193, 'İhtiyar', 4),
(194, 'İhtiyar ve Alil', 4),
(195, 'Dülkar', 4),
(196, 'Nisa Taifesinden', 4),
(197, 'Mecnun', 4),
(198, 'Fukara', 4),
(199, 'Yetim', 4),
(200, 'Salcı', 4),
(201, 'Bakıcı', 8),
(202, 'Çocuklar Okutma', 8),
(203, 'Gezginci', 8),
(204, 'Katib', 8),
(205, 'Kavas', 8),
(206, 'Kayyum', 8),
(207, 'Mezarcı', 8),
(208, 'Muhtar', 8),
(209, 'Muhzır', 8),
(210, 'Nüfüs Naziri', 8),
(211, 'Ziraat Müdürü', 8),
(212, 'Bahçevan', 9),
(213, 'Çapacı', 9),
(214, 'Çoban', 9),
(215, 'Irgat', 9),
(216, 'Hizmetkar', 9),
(217, 'Dikici', 14),
(218, 'Papuççu', 14),
(219, 'Terzi', 14),
(220, 'Yorgancı', 14),
(221, 'Bıçakçı', 12),
(222, 'Dökmeci', 12),
(223, 'Kalaycı', 12),
(224, 'Kazancı', 12),
(225, 'Kuyumcu', 12),
(226, 'Mineci', 12),
(227, 'Nalbant', 12),
(228, 'Kantarcı', 12),
(229, 'Demirci', 12),
(230, 'Aktar Ticareti', 5),
(231, 'Tuz Ticareti', 5),
(232, 'Eskici', 5),
(233, 'Duhancı', 5),
(234, 'Oduncu', 5),
(235, 'Avrupa Ticareti', 5),
(236, 'Erbab-ı Ticaret', 5),
(237, 'Ayak Ticareti', 5),
(238, 'Bezirgan', 5),
(239, 'Araba Kiracı', 18),
(240, 'Kiracı', 18),
(241, 'Koçucu', 18),
(242, 'Aşçı', 17),
(243, 'Bakkal', 17),
(244, 'Ekmekçi', 17),
(245, 'Kadayifçi', 17),
(246, 'Kasap', 17),
(247, 'Simitçi', 17),
(248, 'Yemişçi', 17),
(249, 'Ashab-ı Alaka', 3),
(250, 'Erbab-ı Ziraat', 3),
(251, 'Rençber', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `occupation_household`
--

CREATE TABLE `occupation_household` (
  `occupation_household_id` int(10) UNSIGNED NOT NULL,
  `fk_occupation_id` int(10) UNSIGNED NOT NULL,
  `fk_household_id` int(10) UNSIGNED NOT NULL,
  `income` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('Usta','Kalfa','Çırak') COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `occupation_household`
--

INSERT INTO `occupation_household` (`occupation_household_id`, `fk_occupation_id`, `fk_household_id`, `income`, `type`) VALUES
(14, 249, 23, 0, 'Usta'),
(15, 159, 24, 0, 'Usta'),
(16, 142, 25, 120, 'Usta'),
(17, 147, 26, 100, 'Kalfa'),
(18, 142, 26, 120, 'Usta'),
(19, 185, 27, 2500, 'Usta'),
(20, 208, 28, 100, 'Usta'),
(23, 236, 31, 0, 'Usta'),
(24, 216, 37, 100, 'Usta'),
(25, 250, 38, 0, 'Usta'),
(26, 249, 39, 0, 'Usta'),
(27, 25, 39, 0, 'Usta'),
(28, 248, 42, 48, 'Usta'),
(29, 250, 44, 0, 'Usta'),
(33, 236, 48, 200, 'Usta'),
(34, 25, 48, 0, 'Usta'),
(35, 250, 49, 0, 'Usta'),
(36, 142, 49, 120, 'Usta'),
(37, 142, 50, 120, 'Usta'),
(38, 199, 51, 0, 'Usta'),
(39, 142, 52, 120, 'Usta'),
(40, 183, 53, 0, 'Usta'),
(41, 216, 54, 100, 'Usta'),
(42, 154, 55, 100, 'Usta'),
(43, 243, 56, 250, 'Usta'),
(44, 142, 56, 120, 'Usta'),
(45, 198, 57, 0, 'Usta'),
(46, 162, 58, 250, 'Usta'),
(47, 239, 59, 150, 'Usta'),
(48, 194, 60, 0, 'Usta'),
(49, 216, 61, 200, 'Usta'),
(50, 154, 62, 100, 'Usta'),
(51, 142, 62, 120, 'Usta'),
(52, 27, 64, 150, 'Usta'),
(53, 250, 65, 0, 'Usta'),
(54, 199, 66, 0, 'Usta'),
(55, 162, 67, 150, 'Usta'),
(56, 142, 67, 120, 'Usta'),
(57, 164, 68, 100, 'Usta'),
(58, 239, 70, 150, 'Usta'),
(59, 142, 70, 120, 'Usta'),
(60, 162, 71, 100, 'Kalfa'),
(61, 142, 71, 120, 'Usta'),
(62, 162, 72, 50, 'Usta'),
(63, 142, 73, 120, 'Usta'),
(64, 25, 74, 0, 'Usta'),
(65, 25, 76, 0, 'Usta'),
(66, 246, 77, 150, 'Usta'),
(67, 216, 78, 100, 'Usta'),
(70, 236, 81, 200, 'Usta'),
(71, 172, 85, 150, 'Usta'),
(72, 236, 86, 300, 'Usta'),
(73, 199, 87, 0, 'Usta'),
(74, 199, 88, 0, 'Usta'),
(75, 183, 89, 0, 'Usta'),
(76, 236, 89, 300, 'Usta'),
(77, 204, 90, 150, 'Usta'),
(78, 216, 91, 150, 'Usta'),
(79, 142, 92, 120, 'Usta'),
(80, 142, 93, 120, 'Usta'),
(81, 250, 94, 0, 'Usta'),
(82, 239, 95, 100, 'Usta'),
(83, 216, 96, 100, 'Usta'),
(84, 243, 97, 150, 'Usta'),
(85, 27, 98, 200, 'Usta'),
(86, 236, 99, 600, 'Usta'),
(87, 181, 99, 120, 'Usta'),
(88, 143, 100, 180, 'Usta'),
(89, 142, 101, 120, 'Usta'),
(90, 204, 102, 250, 'Usta'),
(91, 164, 103, 150, 'Usta'),
(92, 142, 103, 120, 'Usta'),
(93, 142, 104, 0, 'Usta'),
(94, 159, 105, 150, 'Usta'),
(95, 143, 105, 180, 'Usta'),
(96, 147, 106, 150, 'Usta'),
(97, 143, 106, 180, 'Usta'),
(98, 216, 107, 150, 'Usta'),
(99, 206, 108, 285, 'Usta'),
(100, 216, 109, 100, 'Usta'),
(101, 142, 110, 120, 'Usta'),
(102, 250, 111, 0, 'Usta'),
(103, 188, 111, 0, 'Usta'),
(104, 142, 112, 120, 'Usta'),
(105, 147, 113, 200, 'Usta'),
(106, 142, 113, 120, 'Usta'),
(107, 178, 114, 250, 'Usta'),
(108, 250, 115, 0, 'Usta'),
(109, 29, 116, 0, 'Usta'),
(110, 29, 117, 0, 'Usta'),
(111, 216, 118, 0, 'Usta'),
(112, 159, 119, 600, 'Usta'),
(113, 219, 120, 100, 'Usta'),
(114, 199, 121, 0, 'Usta'),
(115, 159, 122, 50, 'Kalfa'),
(116, 142, 122, 120, 'Usta'),
(117, 154, 123, 50, 'Usta'),
(118, 159, 124, 150, 'Kalfa'),
(119, 142, 124, 120, 'Usta'),
(120, 199, 125, 0, 'Usta'),
(121, 142, 126, 120, 'Usta'),
(122, 29, 127, 0, 'Usta'),
(124, 216, 129, 50, 'Usta'),
(125, 159, 130, 550, 'Usta'),
(126, 198, 131, 0, 'Usta'),
(127, 243, 132, 200, 'Usta'),
(128, 142, 133, 120, 'Usta'),
(129, 248, 134, 100, 'Usta'),
(130, 250, 135, 0, 'Usta'),
(131, 216, 136, 0, 'Usta'),
(132, 250, 137, 0, 'Usta'),
(133, 216, 138, 500, 'Usta'),
(134, 25, 139, 432, 'Usta'),
(136, 239, 141, 100, 'Usta'),
(137, 198, 142, 0, 'Usta'),
(138, 243, 144, 200, 'Usta'),
(139, 142, 144, 120, 'Usta'),
(140, 216, 145, 200, 'Usta'),
(141, 154, 147, 50, 'Usta'),
(144, 163, 149, 200, 'Usta'),
(145, 142, 149, 120, 'Usta'),
(146, 142, 150, 120, 'Usta'),
(147, 142, 151, 120, 'Usta'),
(148, 178, 152, 500, 'Usta'),
(149, 250, 153, 0, 'Usta'),
(150, 150, 154, 0, 'Usta'),
(151, 236, 155, 1500, 'Usta'),
(152, 210, 156, 2400, 'Usta'),
(153, 233, 157, 300, 'Usta'),
(154, 200, 158, 0, 'Usta'),
(155, 216, 159, 150, 'Usta'),
(156, 216, 160, 100, 'Usta'),
(157, 233, 161, 500, 'Usta'),
(158, 204, 162, 250, 'Usta'),
(159, 216, 163, 100, 'Usta'),
(160, 147, 164, 50, 'Kalfa'),
(161, 142, 164, 120, 'Usta'),
(163, 153, 166, 100, 'Usta'),
(164, 204, 167, 300, 'Usta'),
(165, 142, 168, 120, 'Usta'),
(166, 144, 169, 300, 'Usta'),
(167, 142, 170, 120, 'Usta'),
(168, 248, 171, 100, 'Usta'),
(169, 142, 172, 120, 'Usta'),
(170, 142, 173, 120, 'Usta'),
(171, 147, 174, 150, 'Usta'),
(172, 142, 175, 120, 'Usta'),
(173, 182, 176, 1800, 'Usta'),
(174, 216, 177, 100, 'Usta'),
(175, 178, 178, 200, 'Usta'),
(176, 216, 179, 0, 'Usta'),
(177, 216, 180, 120, 'Usta'),
(178, 248, 181, 120, 'Usta'),
(179, 142, 182, 120, 'Usta'),
(180, 248, 183, 120, 'Usta'),
(181, 24, 184, 150, 'Usta'),
(182, 144, 185, 300, 'Usta'),
(183, 147, 186, 100, 'Kalfa'),
(184, 232, 187, 50, 'Usta'),
(185, 142, 187, 120, 'Usta'),
(186, 250, 188, 0, 'Usta'),
(187, 142, 189, 120, 'Usta'),
(188, 193, 190, 0, 'Usta'),
(189, 142, 191, 120, 'Usta'),
(190, 193, 192, 0, 'Usta'),
(191, 248, 193, 0, 'Çırak'),
(192, 157, 194, 100, 'Usta'),
(193, 219, 195, 100, 'Usta'),
(194, 142, 195, 120, 'Usta'),
(195, 194, 196, 0, 'Usta'),
(196, 147, 197, 100, 'Usta'),
(197, 143, 197, 180, 'Usta'),
(198, 203, 198, 200, 'Usta'),
(199, 142, 199, 120, 'Usta'),
(200, 200, 200, 0, 'Usta'),
(201, 142, 201, 120, 'Usta'),
(202, 168, 202, 100, 'Usta'),
(203, 142, 203, 120, 'Usta'),
(204, 198, 204, 0, 'Usta'),
(205, 243, 208, 200, 'Usta'),
(206, 142, 209, 120, 'Usta'),
(207, 231, 210, 800, 'Usta'),
(208, 233, 211, 100, 'Usta'),
(209, 149, 212, 100, 'Usta'),
(210, 142, 212, 120, 'Usta'),
(211, 149, 213, 100, 'Usta'),
(212, 216, 214, 100, 'Usta'),
(213, 173, 215, 30, 'Kalfa'),
(214, 142, 215, 120, 'Usta'),
(215, 153, 216, 60, 'Usta'),
(216, 216, 217, 30, 'Usta'),
(217, 142, 217, 120, 'Usta'),
(218, 193, 218, 0, 'Usta'),
(219, 145, 219, 600, 'Usta'),
(220, 143, 220, 180, 'Usta'),
(221, 198, 221, 0, 'Usta'),
(222, 204, 222, 100, 'Usta'),
(223, 216, 223, 100, 'Usta'),
(224, 147, 224, 100, 'Usta'),
(225, 250, 225, 0, 'Usta'),
(226, 216, 226, 100, 'Usta'),
(227, 143, 226, 180, 'Usta'),
(228, 193, 227, 0, 'Usta'),
(229, 204, 228, 0, 'Çırak'),
(230, 227, 229, 50, 'Kalfa'),
(231, 142, 229, 120, 'Usta'),
(232, 243, 230, 150, 'Usta'),
(233, 243, 231, 200, 'Usta'),
(234, 149, 232, 150, 'Usta'),
(235, 233, 233, 1000, 'Usta'),
(236, 216, 234, 150, 'Usta'),
(237, 216, 235, 600, 'Usta'),
(238, 237, 236, 300, 'Usta'),
(239, 193, 237, 0, 'Usta'),
(240, 142, 238, 120, 'Usta'),
(241, 193, 239, 0, 'Usta'),
(242, 216, 240, 250, 'Usta'),
(243, 216, 241, 150, 'Usta'),
(244, 216, 242, 150, 'Usta'),
(245, 179, 243, 100, 'Usta'),
(246, 207, 244, 75, 'Usta'),
(247, 204, 245, 200, 'Usta'),
(248, 199, 247, 0, 'Usta'),
(249, 239, 248, 150, 'Usta'),
(250, 142, 248, 120, 'Usta'),
(251, 25, 250, 500, 'Usta'),
(252, 249, 251, 0, 'Usta'),
(253, 199, 252, 0, 'Usta'),
(254, 182, 254, 0, 'Usta'),
(255, 249, 254, 0, 'Usta'),
(256, 204, 255, 250, 'Usta'),
(257, 216, 256, 250, 'Usta'),
(258, 199, 258, 0, 'Usta'),
(259, 236, 259, 800, 'Usta'),
(260, 233, 260, 400, 'Usta'),
(261, 249, 261, 0, 'Usta'),
(262, 189, 262, 50, 'Kalfa'),
(263, 199, 263, 0, 'Usta'),
(264, 216, 265, 120, 'Usta'),
(265, 142, 265, 120, 'Usta'),
(266, 216, 266, 200, 'Usta'),
(267, 249, 267, 0, 'Usta'),
(268, 142, 269, 120, 'Usta'),
(269, 230, 269, 600, 'Usta'),
(270, 142, 270, 120, 'Usta'),
(271, 216, 271, 140, 'Usta'),
(272, 249, 272, 0, 'Usta'),
(273, 233, 274, 900, 'Usta'),
(274, 25, 275, 533, 'Usta'),
(275, 142, 275, 120, 'Usta'),
(276, 216, 276, 100, 'Usta'),
(277, 25, 277, 2000, 'Usta'),
(278, 178, 278, 850, 'Usta'),
(279, 250, 279, 0, 'Usta'),
(280, 204, 280, 500, 'Usta'),
(281, 179, 281, 200, 'Usta'),
(282, 216, 282, 300, 'Usta'),
(283, 249, 283, 0, 'Usta');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `real_estate`
--

CREATE TABLE `real_estate` (
  `real_estate_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `real_estate`
--

INSERT INTO `real_estate` (`real_estate_id`, `type`) VALUES
(1, 'Asiyab'),
(8, 'Dükkan'),
(6, 'Gümrükhane'),
(2, 'Hamam'),
(3, 'Han'),
(4, 'Kahvehane'),
(7, 'Kirahane'),
(5, 'Meyhane');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `real_estate_household`
--

CREATE TABLE `real_estate_household` (
  `real_estate_household_id` int(10) UNSIGNED NOT NULL,
  `fk_real_estate_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `fk_household_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `rent_income` int(10) UNSIGNED DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `description` text COLLATE utf8mb4_bin DEFAULT NULL,
  `location` text COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `real_estate_household`
--

INSERT INTO `real_estate_household` (`real_estate_household_id`, `fk_real_estate_id`, `fk_household_id`, `rent_income`, `quantity`, `description`, `location`) VALUES
(9, 2, 23, 1000, 1, '', 'Nişava karibinde'),
(10, 8, 23, 2060, 16, '', ''),
(11, 3, 23, 375, 1, 'nisf hisse', 'At pazarında'),
(12, 8, 23, 715, 20, 'nisf hisse', 'at pazarındaki hana muttasil dükkanlar'),
(13, 8, 23, 0, 5, 'diğer, kapalı, harap', ''),
(14, 8, 24, 0, 0, 'muattal', 'debbahane'),
(15, 7, 24, 250, 5, 'yahudi', ''),
(16, 7, 26, 20, 1, '', ''),
(19, 8, 31, 100, 1, '', ''),
(20, 8, 32, 50, 1, 'nisf hisse', ''),
(21, 1, 33, 1050, 1, 'dört hissede üç hisse', ''),
(22, 7, 34, 600, 30, 'çiftlikhane', 'varoş'),
(23, 8, 34, 530, 6, '', ''),
(24, 7, 34, 60, 1, 'kendi hanesi icara verdi', ''),
(25, 1, 35, 150, 1, 'dört hissede bir hisse', 'Birnebirud karyesi'),
(26, 3, 38, 400, 1, 'dükkan ile', 'Kotna karyesi'),
(27, 3, 39, 300, 1, '', 'Çiçine'),
(28, 7, 40, 392, 7, 'ma dükkan kıt\'a 1 nisf hisse', ''),
(29, 8, 40, 900, 10, '', ''),
(30, 8, 40, 0, 3, 'muattal', ''),
(31, 7, 40, 70, 5, '', ''),
(32, 3, 40, 375, 1, 'nisf hisse', 'At pazarı'),
(33, 8, 40, 715, 20, '', ''),
(34, 8, 41, 450, 3, '', ''),
(35, 3, 44, 200, 1, '', 'Bala Tırnova'),
(36, 8, 44, 200, 2, '', ''),
(37, 8, 44, 0, 1, 'muattal', ''),
(47, 7, 65, 72, 6, 'çiftlik hane', ''),
(48, 8, 65, 0, 1, 'muattal', ''),
(49, 8, 66, 120, 1, '', 'Saraç çarşısında'),
(50, 1, 66, 525, 1, 'Nisf hisse - Taş 3', 'Kotna deresinde'),
(52, 8, 81, 80, 1, '', ''),
(53, 7, 94, 130, 3, 'çiftlik hane ma 1 meyhane', 'Nefs-i Niş'),
(54, 7, 94, 180, 5, 'çiftlik hane', 'nefs-i Niş'),
(55, 5, 94, 250, 1, '', ''),
(56, 8, 94, 500, 5, '', ''),
(57, 8, 94, 0, 1, 'muattal', ''),
(58, 8, 99, 200, 1, '', ''),
(59, 8, 105, 10, 1, 'rub\' hisse', 'Debbağhane'),
(60, 1, 110, 450, 1, 'Taş 1', 'Prekop Kotna Karyesi'),
(61, 8, 110, 30, 1, 'bir miktar hisse', ''),
(62, 8, 111, 60, 1, '', ''),
(63, 8, 113, 60, 1, '', ''),
(64, 1, 115, 150, 1, 'taş 2', 'Lazar karyesi'),
(65, 8, 119, 120, 2, '', ''),
(66, 7, 121, 650, 10, 'çiftlik hane', ''),
(67, 8, 121, 30, 1, 'nisf hisse', 'Debbahane'),
(68, 8, 124, 15, 1, 'rub\' hisse', ''),
(69, 8, 130, 60, 1, '', 'Debbahane'),
(70, 8, 132, 15, 1, 'rub\' hisse', 'Debbahane'),
(71, 8, 139, 15, 1, 'rub\' hisse', 'Debbahane'),
(72, 8, 144, 80, 1, '', ''),
(73, 8, 153, 150, 1, 'mutafçı', ''),
(74, 8, 153, 120, 1, 'mutafçı', ''),
(75, 8, 153, 70, 1, 'duhancı?', ''),
(76, 2, 154, 1000, 1, '', ''),
(77, 8, 154, 240, 1, 'bakkal', ''),
(78, 8, 155, 500, 2, 'bakkal', ''),
(79, 8, 155, 350, 2, 'saraç', ''),
(80, 8, 155, 180, 1, 'papuççu', ''),
(81, 8, 155, 250, 1, '', ''),
(82, 1, 155, 400, 1, 'taş 2', ''),
(83, 8, 156, 520, 4, 'kürkçü', ''),
(84, 8, 156, 360, 4, 'bakkal', ''),
(85, 1, 156, 300, 1, 'taş 3. 24 -den 5 - hisse', 'Yaşinçe'),
(86, 7, 156, 120, 1, 'yahudi hane', ''),
(87, 8, 157, 180, 1, 'kürkçü', ''),
(88, 8, 157, 150, 1, 'kalaycı', ''),
(89, 1, 179, 600, 1, '?', ''),
(90, 1, 179, 150, 1, '?', ''),
(91, 4, 188, 100, 1, '', ''),
(92, 8, 211, 24, 1, '', ''),
(93, 4, 211, 100, 1, '', ''),
(94, 1, 225, 200, 1, '', ''),
(95, 8, 225, 0, 1, 'boş', ''),
(96, 8, 225, 190, 1, '', ''),
(97, 8, 225, 190, 1, 'terzi', ''),
(98, 8, 225, 190, 1, 'saraç', ''),
(99, 7, 233, 300, 1, '', ''),
(100, 1, 246, 120, 1, 'kıt\'a 1 taş 2 ma tarla dönüm 2', 'Yeliştiçe'),
(101, 7, 246, 20, 2, 'Çiftlik hane kıt\'a 1', 'Niş varoşunda'),
(102, 7, 247, 90, 9, 'çiftlik hane kıt\'a 1', 'kasaba civarında'),
(103, 7, 251, 364, 40, 'çiftlik hane kıta 1', 'Civarı kasaba'),
(104, 8, 251, 2367, 19, '', 'Düt kasabada'),
(105, 2, 251, 200, 1, 'rub hisse', ''),
(106, 3, 252, 750, 1, 'nisf hisse', ''),
(107, 7, 252, 280, 13, 'çiftlik hane kıta 1', 'Civarı kasabada'),
(108, 8, 252, 3310, 20, '', ''),
(109, 1, 254, 45, 1, 'taş 2', 'Knejiçe'),
(110, 8, 254, 347, 3, '', ''),
(111, 7, 254, 50, 4, 'çiftlik hane kıta 1', 'civarı kasabada'),
(112, 8, 258, 200, 1, '', ''),
(113, 1, 258, 22, 1, 'rub hisse taş 2', ''),
(114, 7, 258, 30, 1, 'kıta 1 (???)', 'cedid mahallesi'),
(115, 8, 259, 150, 1, 'kendi ikamet', ''),
(116, 8, 261, 150, 2, '', ''),
(117, 7, 261, 128, 12, 'çiftlik hane kıta 1', 'civarı kasaba'),
(118, 1, 261, 500, 1, 'taş 2 nisf hisse', 'Balina karyesi'),
(119, 8, 262, 60, 4, '', ''),
(120, 8, 263, 1236, 9, '', ''),
(121, 8, 264, 300, 3, '', ''),
(122, 1, 267, 1500, 1, 'taş 3', ''),
(123, 3, 267, 500, 1, '', 'Emin Kotna'),
(124, 8, 267, 40, 1, 'rub hisse', ''),
(125, 7, 268, 200, 12, 'yahudi kıt\'a 1', ''),
(126, 7, 269, 20, 1, '', ''),
(127, 8, 269, 200, 3, '', 'Dut kasabada'),
(128, 8, 269, 100, 1, '', ''),
(129, 1, 269, 60, 1, 'bir miktar hisse taş 3', 'Emin Kotna'),
(130, 8, 273, 428, 7, 'nisf hisse', ''),
(131, 3, 273, 300, 1, 'nisf hisse', ''),
(132, 8, 274, 120, 1, '', ''),
(133, 7, 277, 120, 14, 'çiftlik', ''),
(134, 8, 277, 600, 2, '', ''),
(135, 1, 279, 800, 1, 'nisf hisse taş 3', 'Emin Kotna'),
(136, 8, 281, 120, 4, '', ''),
(137, 3, 283, 290, 1, 'ma\' 2 dükkan', 'durur kasaba'),
(138, 1, 283, 0, 0, '', ''),
(139, 7, 283, 420, 5, 'Yahudi kıt\'a 1 ma\' 4 dükkan ', ''),
(140, 8, 283, 180, 2, '', ''),
(141, 7, 283, 50, 3, 'çiftlik hane kıt\'a 1', ''),
(142, 8, 283, 200, 1, '', 'durur kasabada'),
(143, 8, 283, 220, 3, 'nisf hisse', ''),
(144, 8, 283, 67, 1, 'süls hisse', ''),
(145, 7, 283, 38, 1, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tax`
--

CREATE TABLE `tax` (
  `tax_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `tax`
--

INSERT INTO `tax` (`tax_id`, `type`) VALUES
(3, 'bedel-i öşr-i bostan'),
(4, 'bedel-i öşr-i kovan'),
(8, 'cizye'),
(7, 'resm-i adet-i ağnam'),
(6, 'resm-i asıyab'),
(5, 'resm-i bağ'),
(1, 'vergi-i mahsuse'),
(2, 'öşür (tarla)');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tax_household`
--

CREATE TABLE `tax_household` (
  `tax_household_id` int(10) UNSIGNED NOT NULL,
  `fk_tax_id` int(10) UNSIGNED NOT NULL,
  `fk_household_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `is_exused` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `tax_household`
--

INSERT INTO `tax_household` (`tax_household_id`, `fk_tax_id`, `fk_household_id`, `amount`, `is_exused`) VALUES
(14, 1, 23, 333, 0),
(15, 2, 23, 15, 0),
(16, 4, 23, 2, 0),
(17, 5, 23, 8, 0),
(18, 1, 24, 29, 0),
(19, 5, 24, 6, 0),
(20, 1, 31, 143, 0),
(21, 2, 31, 74, 0),
(22, 5, 31, 6, 0),
(23, 1, 34, 100, 0),
(24, 1, 37, 3, 0),
(25, 2, 37, 12, 0),
(26, 1, 38, 35, 0),
(27, 2, 38, 73, 0),
(28, 5, 38, 20, 0),
(29, 1, 39, 284, 0),
(30, 4, 39, 9, 0),
(31, 5, 39, 18, 0),
(32, 1, 44, 150, 0),
(33, 5, 44, 3, 0),
(40, 1, 48, 32, 0),
(41, 1, 49, 57, 0),
(42, 2, 49, 111, 0),
(43, 4, 49, 3, 0),
(44, 1, 56, 5, 0),
(45, 5, 56, 4, 0),
(46, 1, 58, 10, 0),
(47, 5, 58, 4, 0),
(48, 1, 61, 4, 0),
(49, 1, 64, 10, 0),
(50, 1, 65, 29, 0),
(51, 2, 65, 24, 0),
(52, 4, 65, 8, 0),
(53, 1, 67, 4, 0),
(54, 1, 68, 4, 0),
(55, 1, 77, 4, 0),
(56, 5, 77, 11, 0),
(58, 1, 81, 19, 0),
(59, 5, 81, 4, 0),
(61, 1, 84, 16, 0),
(62, 1, 86, 16, 0),
(63, 5, 86, 6, 0),
(64, 1, 94, 61, 0),
(65, 2, 94, 30, 0),
(66, 1, 95, 3, 0),
(67, 1, 98, 5, 0),
(68, 1, 99, 33, 0),
(69, 5, 99, 6, 0),
(70, 1, 102, 5, 0),
(71, 1, 105, 4, 0),
(72, 5, 105, 4, 0),
(73, 1, 110, 57, 0),
(74, 4, 110, 5, 0),
(75, 1, 111, 23, 0),
(76, 4, 111, 16, 0),
(77, 5, 111, 14, 0),
(78, 2, 111, 111, 0),
(79, 1, 113, 6, 0),
(80, 1, 115, 30, 0),
(81, 4, 115, 3, 0),
(82, 6, 115, 5, 0),
(83, 2, 115, 15, 0),
(84, 1, 119, 81, 0),
(85, 5, 119, 29, 0),
(86, 1, 121, 17, 0),
(87, 5, 121, 4, 0),
(88, 5, 124, 5, 0),
(89, 1, 130, 28, 0),
(90, 5, 130, 3, 0),
(91, 1, 132, 9, 0),
(92, 5, 132, 3, 0),
(93, 1, 134, 1, 0),
(94, 5, 134, 2, 0),
(95, 2, 137, 22, 0),
(96, 1, 138, 20, 0),
(97, 1, 139, 8, 0),
(98, 1, 144, 3, 0),
(99, 5, 144, 2, 0),
(100, 1, 149, 8, 0),
(101, 1, 153, 40, 0),
(102, 5, 153, 6, 0),
(104, 1, 154, 172, 0),
(105, 5, 154, 10, 0),
(106, 1, 155, 172, 0),
(107, 5, 155, 10, 0),
(108, 1, 156, 172, 0),
(109, 5, 156, 10, 0),
(110, 1, 157, 68, 0),
(111, 5, 157, 6, 0),
(112, 1, 158, 5, 0),
(113, 5, 158, 20, 0),
(114, 5, 160, 4, 0),
(115, 1, 161, 4, 0),
(116, 1, 162, 3, 0),
(117, 1, 163, 3, 0),
(118, 1, 166, 2, 0),
(119, 1, 167, 4, 0),
(120, 5, 167, 4, 0),
(121, 1, 171, 2, 0),
(122, 1, 174, 4, 0),
(123, 5, 174, 11, 0),
(124, 5, 176, 10, 0),
(125, 1, 177, 4, 0),
(126, 5, 177, 8, 0),
(127, 1, 179, 15, 0),
(128, 5, 179, 8, 0),
(129, 1, 183, 4, 0),
(130, 5, 183, 4, 0),
(131, 1, 184, 3, 0),
(132, 5, 184, 10, 0),
(133, 1, 185, 4, 0),
(134, 5, 185, 4, 0),
(135, 1, 186, 2, 0),
(136, 1, 188, 25, 0),
(137, 5, 188, 23, 0),
(138, 2, 188, 125, 0),
(139, 5, 192, 4, 0),
(140, 5, 196, 6, 0),
(141, 1, 197, 3, 0),
(142, 5, 197, 12, 0),
(143, 1, 199, 29, 0),
(144, 5, 199, 2, 0),
(145, 5, 204, 8, 0),
(146, 1, 206, 2, 0),
(147, 1, 208, 5, 0),
(148, 5, 208, 3, 0),
(149, 1, 210, 29, 0),
(150, 5, 210, 9, 0),
(151, 1, 211, 8, 0),
(152, 5, 211, 8, 0),
(153, 1, 212, 4, 0),
(154, 1, 213, 3, 0),
(155, 5, 218, 8, 0),
(156, 1, 222, 3, 0),
(157, 5, 222, 10, 0),
(158, 1, 223, 2, 0),
(159, 1, 224, 3, 0),
(160, 1, 225, 172, 0),
(161, 5, 225, 30, 0),
(162, 1, 226, 3, 0),
(163, 5, 226, 4, 0),
(164, 1, 227, 2, 0),
(165, 5, 227, 8, 0),
(166, 5, 229, 6, 0),
(167, 1, 230, 3, 0),
(168, 1, 231, 4, 0),
(169, 1, 232, 3, 0),
(170, 1, 233, 60, 0),
(171, 5, 233, 6, 0),
(172, 1, 234, 4, 0),
(173, 5, 234, 10, 0),
(174, 1, 235, 40, 0),
(175, 5, 235, 10, 0),
(176, 1, 236, 8, 0),
(177, 1, 240, 4, 0),
(178, 1, 241, 2, 0),
(179, 5, 244, 2, 0),
(180, 1, 247, 8, 0),
(181, 5, 247, 3, 0),
(182, 2, 250, 46, 0),
(183, 1, 251, 247, 0),
(184, 2, 251, 180, 0),
(185, 5, 251, 8, 0),
(186, 1, 252, 247, 0),
(187, 1, 254, 112, 0),
(188, 2, 254, 37, 0),
(189, 5, 254, 5, 0),
(190, 5, 256, 3, 0),
(191, 1, 258, 128, 0),
(192, 1, 259, 40, 0),
(193, 5, 259, 4, 0),
(194, 1, 260, 12, 0),
(195, 5, 260, 4, 0),
(196, 1, 261, 208, 0),
(197, 1, 262, 24, 0),
(198, 1, 267, 120, 0),
(199, 5, 267, 13, 0),
(200, 1, 268, 16, 0),
(201, 5, 268, 13, 0),
(202, 1, 269, 40, 0),
(203, 5, 269, 3, 0),
(204, 1, 272, 40, 0),
(205, 5, 272, 2, 0),
(206, 1, 274, 28, 0),
(207, 5, 274, 3, 0),
(208, 1, 277, 62, 0),
(209, 5, 277, 3, 0),
(210, 1, 279, 32, 0),
(211, 2, 279, 62, 0),
(212, 5, 279, 16, 0),
(213, 1, 280, 16, 0),
(214, 5, 280, 10, 0),
(215, 1, 283, 244, 0),
(216, 5, 283, 5, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`household_id`),
  ADD KEY `fk_household_member_type_id` (`fk_household_member_type_id`),
  ADD KEY `fk_location_name_id` (`fk_location_name_id`);

--
-- Tablo için indeksler `household_member_type`
--
ALTER TABLE `household_member_type`
  ADD PRIMARY KEY (`household_member_type_id`);

--
-- Tablo için indeksler `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`land_id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Tablo için indeksler `land_household`
--
ALTER TABLE `land_household`
  ADD PRIMARY KEY (`land_household_id`),
  ADD KEY `fk_land_id_land_land_id` (`fk_land_id`),
  ADD KEY `fk_household_id_household_land_household_id` (`fk_household_id`);

--
-- Tablo için indeksler `livestock`
--
ALTER TABLE `livestock`
  ADD PRIMARY KEY (`livestock_id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Tablo için indeksler `livestock_household`
--
ALTER TABLE `livestock_household`
  ADD PRIMARY KEY (`livestock_household_id`),
  ADD KEY `fk_livestock_id_livestock_livestock_id` (`fk_livestock_id`),
  ADD KEY `fk_household_id_livestock_household_household_id` (`fk_household_id`);

--
-- Tablo için indeksler `location_name`
--
ALTER TABLE `location_name`
  ADD PRIMARY KEY (`location_name_id`),
  ADD KEY `fk_location_name_id_location_name` (`fk_location_name_id`),
  ADD KEY `fk_location_type_id_location_type` (`fk_location_type_id`);

--
-- Tablo için indeksler `location_type`
--
ALTER TABLE `location_type`
  ADD PRIMARY KEY (`location_type_id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Tablo için indeksler `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`occupation_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fk_occupation_id_occupation_id` (`fk_occupation_id`);

--
-- Tablo için indeksler `occupation_household`
--
ALTER TABLE `occupation_household`
  ADD PRIMARY KEY (`occupation_household_id`),
  ADD KEY `fk_occupation_id` (`fk_occupation_id`),
  ADD KEY `fk_household_id` (`fk_household_id`);

--
-- Tablo için indeksler `real_estate`
--
ALTER TABLE `real_estate`
  ADD PRIMARY KEY (`real_estate_id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Tablo için indeksler `real_estate_household`
--
ALTER TABLE `real_estate_household`
  ADD PRIMARY KEY (`real_estate_household_id`),
  ADD KEY `fk_household_id_household` (`fk_household_id`),
  ADD KEY `fk_real_estate_id_real_estate` (`fk_real_estate_id`);

--
-- Tablo için indeksler `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Tablo için indeksler `tax_household`
--
ALTER TABLE `tax_household`
  ADD PRIMARY KEY (`tax_household_id`),
  ADD KEY `fk_tax_id_tax_tax_id` (`fk_tax_id`),
  ADD KEY `fk_household_id_household_household_id` (`fk_household_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `household`
--
ALTER TABLE `household`
  MODIFY `household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- Tablo için AUTO_INCREMENT değeri `household_member_type`
--
ALTER TABLE `household_member_type`
  MODIFY `household_member_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `land`
--
ALTER TABLE `land`
  MODIFY `land_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `land_household`
--
ALTER TABLE `land_household`
  MODIFY `land_household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- Tablo için AUTO_INCREMENT değeri `livestock`
--
ALTER TABLE `livestock`
  MODIFY `livestock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `livestock_household`
--
ALTER TABLE `livestock_household`
  MODIFY `livestock_household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- Tablo için AUTO_INCREMENT değeri `location_name`
--
ALTER TABLE `location_name`
  MODIFY `location_name_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `location_type`
--
ALTER TABLE `location_type`
  MODIFY `location_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `occupation`
--
ALTER TABLE `occupation`
  MODIFY `occupation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- Tablo için AUTO_INCREMENT değeri `occupation_household`
--
ALTER TABLE `occupation_household`
  MODIFY `occupation_household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- Tablo için AUTO_INCREMENT değeri `real_estate`
--
ALTER TABLE `real_estate`
  MODIFY `real_estate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `real_estate_household`
--
ALTER TABLE `real_estate_household`
  MODIFY `real_estate_household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- Tablo için AUTO_INCREMENT değeri `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `tax_household`
--
ALTER TABLE `tax_household`
  MODIFY `tax_household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `household`
--
ALTER TABLE `household`
  ADD CONSTRAINT `fk_household_member_type_id` FOREIGN KEY (`fk_household_member_type_id`) REFERENCES `household_member_type` (`household_member_type_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_location_name_id` FOREIGN KEY (`fk_location_name_id`) REFERENCES `location_name` (`location_name_id`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `land_household`
--
ALTER TABLE `land_household`
  ADD CONSTRAINT `fk_household_id_household_land_household_id` FOREIGN KEY (`fk_household_id`) REFERENCES `household` (`household_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_land_id_land_land_id` FOREIGN KEY (`fk_land_id`) REFERENCES `land` (`land_id`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `livestock_household`
--
ALTER TABLE `livestock_household`
  ADD CONSTRAINT `fk_household_id_livestock_household_household_id` FOREIGN KEY (`fk_household_id`) REFERENCES `household` (`household_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_livestock_id_livestock_livestock_id` FOREIGN KEY (`fk_livestock_id`) REFERENCES `livestock` (`livestock_id`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `location_name`
--
ALTER TABLE `location_name`
  ADD CONSTRAINT `fk_location_name_id_location_name` FOREIGN KEY (`fk_location_name_id`) REFERENCES `location_name` (`location_name_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_location_type_id_location_type` FOREIGN KEY (`fk_location_type_id`) REFERENCES `location_type` (`location_type_id`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `occupation`
--
ALTER TABLE `occupation`
  ADD CONSTRAINT `fk_occupation_id_occupation_id` FOREIGN KEY (`fk_occupation_id`) REFERENCES `occupation` (`occupation_id`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `occupation_household`
--
ALTER TABLE `occupation_household`
  ADD CONSTRAINT `fk_household_id` FOREIGN KEY (`fk_household_id`) REFERENCES `household` (`household_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_occupation_id` FOREIGN KEY (`fk_occupation_id`) REFERENCES `occupation` (`occupation_id`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `real_estate_household`
--
ALTER TABLE `real_estate_household`
  ADD CONSTRAINT `fk_household_id_household` FOREIGN KEY (`fk_household_id`) REFERENCES `household` (`household_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_real_estate_id_real_estate` FOREIGN KEY (`fk_real_estate_id`) REFERENCES `real_estate` (`real_estate_id`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `tax_household`
--
ALTER TABLE `tax_household`
  ADD CONSTRAINT `fk_household_id_household_household_id` FOREIGN KEY (`fk_household_id`) REFERENCES `household` (`household_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tax_id_tax_tax_id` FOREIGN KEY (`fk_tax_id`) REFERENCES `tax` (`tax_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
