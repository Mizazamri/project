-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307:3307
-- Generation Time: Jun 22, 2025 at 11:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_bloodlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation_record`
--

CREATE TABLE `donation_record` (
  `donation_id` varchar(200) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `event_id` varchar(200) DEFAULT NULL,
  `blood_serial_num` varchar(200) NOT NULL,
  `weight` decimal(10,3) NOT NULL,
  `height` decimal(10,3) NOT NULL,
  `donation_date` date NOT NULL,
  `volume_donation` int(5) NOT NULL,
  `hemoglobin` decimal(10,3) NOT NULL,
  `state` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_record`
--

INSERT INTO `donation_record` (`donation_id`, `donor_id`, `event_id`, `blood_serial_num`, `weight`, `height`, `donation_date`, `volume_donation`, `hemoglobin`, `state`) VALUES
('DN124e1b9ac2483', 23, NULL, '871223876', 57.500, 152.900, '2024-01-19', 350, 12.400, 'Johor'),
('DN4b72b2e91876d', 9, 'EVT20250417100000595', '611334896', 70.000, 177.500, '2025-04-17', 450, 13.900, 'Melaka'),
('DN5d4c4eb7ad2a3', 18, 'EVT20230915090000210', '963378913', 58.700, 158.200, '2023-09-15', 350, 12.700, 'Kelantan'),
('DN6857299dd5bfd', 3, NULL, '430136270', 84.000, 162.000, '2023-04-27', 350, 13.000, 'Perlis'),
('DN68572b074613d', 3, NULL, '430132822', 82.000, 162.000, '2022-12-19', 350, 14.000, 'Perlis'),
('DN68572b53902f4', 3, NULL, '430138755', 84.000, 162.000, '2025-07-27', 350, 13.000, 'Perlis'),
('DN6857403b2bc92', 6, 'EVT20240320173000585', '623113311', 80.000, 162.000, '2024-03-24', 350, 13.000, 'Melaka'),
('DN6857403d2bc92', 3, 'EVT20240320173000585', '620633311', 80.000, 162.000, '2024-03-24', 350, 13.000, 'Melaka'),
('DN6857408fc80f5', 3, 'EVT20231108100000881', '620623002', 72.000, 163.000, '2023-11-08', 350, 13.000, 'Melaka'),
('DN685741c79f9e6', 3, NULL, '430153722', 80.000, 163.000, '2025-02-21', 350, 13.000, 'Perlis'),
('DN6857428686da4', 3, 'EVT20240927090000858', '430149433', 76.000, 163.000, '2024-09-27', 350, 13.000, 'Perlis'),
('DN68bfa4a71de93', 14, NULL, '237345897', 68.400, 165.000, '2024-01-27', 350, 12.300, 'Sabah'),
('DN6b4ae7c4f3451', 22, NULL, '497128354', 62.000, 161.300, '2024-03-30', 350, 13.100, 'Putrajaya'),
('DN6c1a2c9f17833', 12, 'EVT20250405100000581', '438913245', 60.000, 160.500, '2025-04-05', 400, 12.500, 'Johor'),
('DN7c9be882e3a40', 8, NULL, '324891753', 76.200, 172.000, '2024-04-01', 450, 14.000, 'Pahang'),
('DN87d204e3a4cf2', 19, 'EVT20250419080000806', '703681253', 66.000, 169.500, '2025-04-19', 400, 14.300, 'Kelantan'),
('DN931dd7a3fdf01', 7, NULL, '221845112', 72.500, 175.300, '2024-01-18', 400, 13.200, 'Selangor'),
('DNa902b2e0f6a32', 11, 'EVT20250220093000529', '349837412', 74.000, 179.000, '2025-02-20', 450, 14.100, 'Negeri Sembilan'),
('DNa9287cd9f7354', 26, 'EVT20241217090000511', '564451235', 67.500, 165.800, '2024-12-17', 350, 13.300, 'Pahang'),
('DNab5f6bd3d908c', 17, 'EVT20250109090000582', '741234567', 64.200, 167.200, '2025-01-09', 350, 13.700, 'Pahang'),
('DNaf6a4feac9320', 20, 'EVT20250325210000589', '520948123', 60.400, 156.700, '2025-03-25', 350, 12.600, 'Negeri Sembilan'),
('DNc13ea4f0b2ee5', 10, 'EVT20250213100000803', '792791453', 65.000, 168.000, '2025-02-13', 350, 12.800, 'Johor'),
('DNc36a53ff2a3e1', 25, 'EVT20241207090000945', '640198734', 65.900, 170.000, '2024-12-07', 400, 13.500, 'Pahang'),
('DNcba14dc3d1b84', 15, NULL, '849948123', 79.100, 182.400, '2024-02-03', 400, 13.800, 'Selangor'),
('DNce317a77d40c2', 16, NULL, '929134567', 59.000, 155.000, '2024-02-22', 350, 13.400, 'Penang'),
('DNd14fd3e1574b0', 24, NULL, '404112336', 75.400, 173.500, '2024-03-03', 400, 13.600, 'Perlis'),
('DNdfd309a7c885b', 13, NULL, '608123786', 62.300, 159.700, '2024-03-12', 350, 13.000, 'Melaka');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_card_number` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `password` varchar(500) NOT NULL,
  `profile_pic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `full_name`, `username`, `email`, `id_card_number`, `age`, `date_of_birth`, `gender`, `mobile_number`, `bloodtype`, `password`, `profile_pic`) VALUES
(3, 'AZYAN ADIBA BINTI ZAIDI', 'azyan', 'azyan.adibaz@gmail.com', '050424-16-0098', 20, '2005-04-24', 'Female', '017-4540517', 'O', '$2y$10$TcBLSPQ97A33v08KSMxDW.QbbGyyZ5d89jZ3L9ZBtb/SRONgQX5mW', 'gambar.png'),
(4, 'NUR INDAH FARAHANA BINTI ASRI', 'indah', 'indhfrhna@gmail.com', '050223-01-0368', 20, '2005-02-23', 'Female', '011-11437978', 'NA', '$2y$10$SmsWcZcSquo.vx3hC9tNCeXBXFvr/WrhxaFuFmhlp9gaYB1ZkGx32', ''),
(5, 'WAN NUR AESHAH BINTI WAN MOHD ZAIDI', 'aeshahcomel', 'aeshah@gmail.com', '050714030988', 20, '2005-07-14', 'Female', '0137284830', 'B', '$2y$10$jTTaqT0rgKzyhX0oyVcc7OrN/O.xUu54eiYE5o1Z6hOI6Tl0GVMxS', 'WhatsApp Image 2025-06-17 at 23.42.28_0d2148a0.jpg'),
(6, 'FARAH IZZLYANA BINTI MOHD FAIZAL', 'farahizz', 'farahizzlyana@gmail.com', '050607100530', 20, '2005-06-07', 'Female', '01128172620', 'O', '$2y$10$geC5qavw8dPomS1xRza8XuAfj6werZQOfPSq8FvLTfxe5ydeyA59i', 'WhatsApp Image 2025-06-17 at 23.47.17_44287d87.jpg'),
(7, 'Alyssa Tan Mei Ling', 'alyssatan', 'alyssa.tan@gmail.com', '900101-14-5678', 34, '1990-01-01', 'Female', '0123456789', 'A+', '$2y$10$1KF2Po9cD1yNIXCszByRAOlPEKT7qAQasCKkqxxjYo0Zg13yF7e9u', 'uploads/alyssa.jpg'),
(8, 'Muhammad Amirul Hakim', 'amirulhakim', 'amirul.hakim@gmail.com', '910202-10-1234', 33, '1991-02-02', 'Male', '0134567890', 'B+', '$2y$10$yZy9s3kJ7F1fOmXZ0LdzgejFrU4H8yxKg9OnbqUF4ZBOKQgxd38Va', 'uploads/amirul.jpg'),
(9, 'Lim Wei Jie', 'weijie_lim', 'lim.weijie@gmail.com', '920303-01-4321', 32, '1992-03-03', 'Male', '0145678901', 'O−', '$2y$10$AtuL2OXonVDrPlc9mJYyS.9ybCEb.vlzvRprOYD1JgAcdRQJKbAEe', 'uploads/weijie.jpg'),
(10, 'Siti Aisyah Zulkifli', 'aisyahz', 'siti.aisyah@gmail.com', '930404-12-8765', 31, '1993-04-04', 'Female', '0156789012', 'AB+', '$2y$10$7EDnZKo1rGMY3XLbYqzRU.WPlSvzXBJ9HssfpUEaNNPZYUjLHLIPu', 'uploads/aisyah.jpg'),
(11, 'Tan Yong Hao', 'tanyonghao', 'tan.yh@gmail.com', '940505-14-3456', 30, '1994-05-05', 'Male', '0167890123', 'B−', '$2y$10$rAv8gx4iUOj1wCv.gPy9EOs9s4b3eMd/CpDR7cgWB71M2gkoIF6cm', 'uploads/yonghao.jpg'),
(12, 'Nur Izzati Rahman', 'izzati_rahman', 'nur.izzati@gmail.com', '950606-11-6789', 29, '1995-06-06', 'Female', '0178901234', 'A−', '$2y$10$z2q1IHTjMkDOAecTEXlFquuXvMZqUKh8A1L4IEZ3EyQnr.Snsrfn2', 'uploads/izzati.jpg'),
(13, 'John Lee Han', 'johnlee', 'john.lee@gmail.com', '960707-08-1122', 28, '1996-07-07', 'Male', '0189012345', 'O+', '$2y$10$n1sRg8fTx2.VsBxFqGBlDeED/Ob4I7lPbKt6uq76z7L6zEqGlZoyK', 'uploads/johnlee.jpg'),
(14, 'Mei Chen Wong', 'meichen', 'mei.chen@gmail.com', '970808-10-3344', 27, '1997-08-08', 'Female', '0190123456', 'AB−', '$2y$10$53yt8I3cdhTWVdugMBzvxOTvDlj22LKdVlyZkZwhCyH6v0I8RYWNa', 'uploads/meichen.jpg'),
(15, 'Syed Faizal', 'syedfaizal', 'syed.faizal@gmail.com', '980909-14-5566', 26, '1998-09-09', 'Male', '0111234567', 'A+', '$2y$10$2D7z8X8JhIYIDEm1KPzByuVbEkvA0HYoMXa5z4G9iW.y56I5J7/y6', 'uploads/faizal.jpg'),
(16, 'Lisa Chong Yee', 'lisachong', 'lisa.chong@gmail.com', '990101-02-7788', 25, '1999-01-01', 'Female', '0122345678', 'O−', '$2y$10$Kc8rOiQ5jHnl3mf6gKq94ODHk9uI7t1vZ08mK2a6U8t92T6KZqlfW', 'uploads/lisa.jpg'),
(17, 'Ahmad Zikri', 'zikriahmad', 'ahmad.zikri@gmail.com', '000202-01-8899', 24, '2000-02-02', 'Male', '0133456789', 'AB+', '$2y$10$csnxhDP/06KZdRPN2EmBIeLykg8xYrUe2hsEvYvJ/UMs8VDwzqHe2', 'uploads/zikri.jpg'),
(18, 'Chong Wei Ling', 'weilingc', 'chong.weiling@gmail.com', '010303-10-9900', 23, '2001-03-03', 'Female', '0144567890', 'B+', '$2y$10$Uc3Bhf5Cb4LZjjQhVGZCdu19ZDsIh4XbMEZbdnBqYTbFDNVJNoUxa', 'uploads/weiling.jpg'),
(19, 'Mohd Fadhil Bin Ismail', 'fadhilismail', 'fadhil.ismail@gmail.com', '020404-12-2211', 22, '2002-04-04', 'Male', '0155678901', 'A−', '$2y$10$RZo4oBNN6u7eUF5aDpGxMeibVnAKFL93JvMdi.Pem/V1Zm5JYZz2W', 'uploads/fadhil.jpg'),
(20, 'Emily Tan Hui', 'emilytan', 'emily.tan@gmail.com', '030505-14-3322', 21, '2003-05-05', 'Female', '0166789012', 'B−', '$2y$10$WxuMB3ZHaTdfmO3rRCB1hOOPP3dbR1hNwR1Z6fOTtS8Uo4pNPZPNS', 'uploads/emilytan.jpg'),
(21, 'Zulkarnain Hassan', 'zulhassan', 'zulkarnain.h@gmail.com', '040606-01-4433', 20, '2004-06-06', 'Male', '0177890123', 'O+', '$2y$10$IfCGDO5mfDQmDJ0ZwDnhNOBQpbz5ReuNsIl7BStDoDmf1N3C2Uz/q', 'uploads/zul.jpg'),
(22, 'Farah Nadia', 'farahnadia', 'farah.nadia@gmail.com', '050707-14-5544', 19, '2005-07-07', 'Female', '0188901234', 'A+', '$2y$10$5cEnb/JHAcwGLzNbmXnYxuLMN8/E3pZPzGIt19zWcfGGRiEjBzFe2', 'uploads/farah.jpg'),
(23, 'Lee Jia Ming', 'jia_ming', 'lee.jiaming@gmail.com', '060808-10-6655', 18, '2006-08-08', 'Male', '0199012345', 'AB−', '$2y$10$uXYc8KwC3IRqYskLrkBrJOuWDOSld2lXJzC0aHZfC5dIbPHd9aU9q', 'uploads/jiaming.jpg'),
(24, 'Aina Sofea Binti Mohd', 'ainasofea', 'aina.sofea@gmail.com', '070909-11-7766', 17, '2007-09-09', 'Female', '0110123456', 'O−', '$2y$10$PGzG2eLwsNgX/OVv.mujHe27Z7bTx3uBOvJkK0biR0ZyyoRrkhbZ2', 'uploads/aina.jpg'),
(25, 'Hafiz Ramli', 'hafizramli', 'hafiz.ramli@gmail.com', '081010-01-8877', 16, '2008-10-10', 'Male', '0121234567', 'B+', '$2y$10$SC3ax9W41WZy6i5F9vlYGuJFE.5fJ7nOG4AE7xXkrTpgGc/hYtk/y', 'uploads/hafiz.jpg'),
(26, 'Yasmin Khairuddin', 'yasmink', 'yasmin.k@gmail.com', '091111-14-9988', 15, '2009-11-11', 'Female', '0132345678', 'AB+', '$2y$10$3Ng9.WvLZyYOdXKkzRBCNuSvLQj7vNR91nZ0e6kgvlM4V7l.xDRpe', 'uploads/yasmin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` varchar(200) NOT NULL,
  `event_name` varchar(500) NOT NULL,
  `event_date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `event_details` varchar(1000) NOT NULL,
  `location` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `image_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_date`, `starttime`, `endtime`, `event_details`, `location`, `state`, `district`, `image_path`) VALUES
('EVT20200512203000115', 'PROGRAM DERMA DARAH 2.0', '2020-05-12', '20:30:00', '22:30:00', 'Hai warga Pendang! ✨\r\n\r\nHARI INI ada program derma darah, jom derma darah kerana hanya setitik darah adalah sangat berharga ❣️\r\n\r\n❣️Tarikh : 12/5/2020 Selasa (19 Ramadan 1441H)\r\n❣️Masa : 8.30mlm\r\n❣️Tempat : Dewan IPD Polis Daerah Pendang\r\n\r\n‼️Sila patuhi Arahan PKPB. Anda juga boleh terus walk-in ke Dewan IPD Polis Daerah Pendang.\r\n\r\n✨Sila join link Telegram ( https://t.me/joinchat/Lbsd0BsTOjfNyOkIWhuOtQ ) untuk susunan jadual bagi mengelakkan penderma menunggu lama.', 'Dewan Utama IPD Pendang', 'Kedah', 'Pendang', 'eventimg/68575063a5b04_96389531_2689068874655810_189892246596747264_n.jpg'),
('EVT20210124100000518', 'Blood Donation Campaign', '2021-01-24', '10:00:00', '14:00:00', 'Jom Warga Muar, derma darah pada hari ahad di Bangunan St.John Ambulans Kawasan Muar.\r\n\r\nMarilah bantu kami stabilkan stok darah yang semakin kurang kutipan darah semasa Perintah Kawalan Pergerakan 2.0 ini😟😥\r\n\r\nKempen derma darah bergerak diadakan dengan mematuhi SOP yang ditetapkan oleh KKM. Keselamatan anda keutamaan kami🙂\r\n\r\nPihak PDRM Johor dan MKN Negeri Johor telah memberi Kelulusan dan kebenaran untuk menjalankan aktiviti pendermaan darah sepanjang PKP 2.0\r\n\r\nKebenaran ini turut terpakai kepada penganjur yang ingin mengadakan kempen derma darah dan penderma yang ingin hadir untuk menderma darah🙂🤗\r\n\r\nAnda yang ingin menderma darah hanya perlu bawa buku merah (sekiranya ada) dan slip perjalanan hadir menderma darah.\r\n\r\nklik pautan link dibawah untuk mendapatkan slip perjalanan👇👇👇\r\n\r\nhttps://forms.gle/SQ6YQuvUYsa7b4qJ6\r\n\r\nSlip perjalanan akan dihantar ke email anda selepas 5 minit🙂\r\n\r\nBesar harapan min pada hari esok terhadap bantuan Muar Blood Warriors 🦸🦸🦸\r\n\r\nSama-sama kita bantu ', 'St.John Ambulans Kawasan Muar, 61 Jalan Perdana 6, Taman Junid Perdana 84000, Muar', 'Johor', 'Muar', 'eventimg/6857652096d23_139921812_1831035067062610_1203136127544657159_n.jpg'),
('EVT20210204105900651', 'Jom Derma Darah', '2021-02-04', '10:59:00', '16:00:00', 'JOM DERMA DARAH !!❤️❤️❤️\r\nni nak habaq mai kat semua yang cukup syarat nak menderma darah, meh kita turun p derma darah bantu tabung darah kita, negeri Kedah tercinta & Perlis jiran kita sekali yang tengah sangat² memerlukan!\r\nHat mana orang Langkawi berdarah 0, A, B, AB sihat tubuh badan tak dak penyakit apa² mai lekaihh bantu. Habaq kat semua naaa. \r\nHat mana jenis duk sembang deraih tapi pengsan bila tengok darah x digalakkan mai na, sat lagi jenuh plak min nak pederaih panggil ambulans🤭🤣\r\nHat mai derma darah, kita tak bagi balik saja.. in sha Allah..dapat info dari pihak penganjur, Hospital Sultanah Maliha & y connect Langkawi, hangpa akan dapat 1 pek makanan keperluan asas PERCUMA! Ada macam² dalam tu, beras, sardin dan lain². tapi ni sekadar bonus dari penaja-penaja, NIAT NAK TOLONG ORANG LAIN TU PALING PENTING, min salute🤩🤩\r\nTerima kasih semua.💐\r\n#KitaMestiMenang #stayathome #pkdlangkawi #prayforlangkawi #MaiPakatSihat #Sihatitumahal #infokesihatansemasalangkawi\r\n‎اَللهُمَّ صَلِ', 'Langkawi Parade Shopping Center', 'Kedah', 'Langkawi', 'eventimg/68574c8ab8756_146014296_222520689601681_6962620419977210627_n.jpg'),
('EVT20211030100000941', 'Derma Darah', '2021-10-30', '10:00:00', '16:00:00', 'Kepada semua hero yang nak menderma darah pada hari Sabtu ni di Paradigm Mall, perlu daftar dulu ya.. 👇🏻\r\n\r\nhttps://forms.gle/q1LK4TqFW3fMAT2j8\r\n\r\nhttps://forms.gle/q1LK4TqFW3fMAT2j8\r\n\r\nhttps://forms.gle/q1LK4TqFW3fMAT2j8\r\n\r\nhttps://forms.gle/q1LK4TqFW3fMAT2j8\r\n\r\nContact : 011-1142 9487 LINA / 012-750 6008 LIM ', 'Paradigm Mall Johor Bahru', 'Johor', 'Johor Bahru', 'eventimg/6857547dcc54d_472892648_1017159363781614_5938293566260236487_n.jpg'),
('EVT20220311090000160', 'PROGRAM DERMA DARAH AMAL MEGA BLOOD DONATION', '2022-03-11', '09:00:00', '16:00:00', 'السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ\r\n\r\n*PROGRAM DERMA DARAH AMAL MEGA BLOOD DONATION* 🤝🏻\r\n\r\n🔹 *11/03/2022*| Jumaat\r\n🔸 *9.00pg - 4.00ptg*\r\n➖ *Kompleks Pendidikan Islam(KPI), Badak*\r\n🔻 Anjuran Jabatan Amal Kawasan Bachok\r\n\r\nKriteria untuk menderma:-\r\n🔹Umur 17-60 tahun\r\n🔸Berat badan sekurang-kurangnya 45 kg\r\n🔹Sihat tubuh badan\r\n🔸Tidur cukup sekurang-kurangnya 5 jam\r\n\r\n*🎁Cabutan Bertuah Bagi Penderma Yang Berdaftar Melalui Googleform👇🏻*\r\n\r\nDaftar di :\r\nhttps://forms.gle/p1VzJ1sdYVU4J7d98\r\n\r\nWhatsapp Group :\r\nhttps://chat.whatsapp.com/CCOl6pKibHJHc1UAooFyw7\r\n\r\nAtau hubungi :\r\nhttp://www.wasap.my/+601118688741/\r\nPegawai Tadbir\r\nJabatan Amal Kawasan Bachok See less\r\nComments\r\nMost relevant is selected, so some comments may have been filtered out.\r\n\r\n\r\n', 'Kompleks Pendidikan Islam(KPI), Badak', 'Kelantan', 'Bachok', 'eventimg/68576e8ac5ce2_480424396_3898535867058937_5919517068272761181_n.jpg'),
('EVT20221214093000265', 'Kempen Derma Darah', '2022-12-14', '09:30:00', '13:00:00', 'Program Derma Darah anjuran Unit Tabung Darah, Hospital Sultan Ismail Petra, Kuala Krai akan diadakan di Klinik Kesihatan Chiku 3 minggu depan.\r\n\r\nTarikh: 14 Disember 2022\r\nHari: Rabu\r\nWaktu: 9.30 pagi - 1 tengahari\r\n\r\n1 beg darah dapat menyelamatkan 3 nyawa. Jom pakat derma darah.', 'Klink Kesihatan Chiku 3', 'Kelantan', 'Gua Musang', 'eventimg/68576fc36bba9_473324069_908516548107212_833622030127118594_n.jpg'),
('EVT20230107103000303', 'Kempen Derma Darah', '2023-01-07', '10:30:00', '16:30:00', 'Salam Sabtu 07 Januari 2023..\n\nLokasi kempen derma darah hari ini sekitar Alor Setar : -\n\n📌 Econsave Pokok Sena\n(Bas Tabung Darah)\n10:00 pagi hingga 4:30 petang', 'Econsave Pokok Sena', 'Kedah', 'Pokok Sena', 'eventimg/6857523053474_480688690_961280256187385_8629464730225292528_n.jpg'),
('EVT20230128100000870', 'Kempen Derma Darah', '2023-01-28', '10:00:00', '15:00:00', 'Hi #johorbloodwarriors dah cukup 3 bulan pendermaan terakhir? Kalau dah cukup, jom derma darah. \r\n\r\nAyuh jangan lepaskan peluang untuk bantu kami membantu pesakit-pesakit yang sedang bertarung nyawa dan memerlukan bekalan darah dari anda semua. \r\n\r\nTerima kasih juga kepada penderma-penderma budiman yang telah hadir menderma darah semasa cuti perayaan tempoh hari.\r\n\r\n#pendermakonsisten\r\n#darahtakpernahcuti \r\n#dermadarah\r\n#dermadarahjb ', 'Aeon Mall, Kulai, Johor', 'Johor', 'Kulaijaya', 'eventimg/68575e8850d4c_480067894_1047248570772693_5888838192625035291_n.jpg'),
('EVT20230915090000210', 'Jom Derma Darah', '2023-09-15', '09:00:00', '12:00:00', 'Assalamualaikum. 😎\r\n\r\nWow.!! Istimewa untuk semuanya. Jom derma darah dan lakukan saringan kesihatan anda di stesen minyak Five Petrol Kuala Krai . Program bermula pada jam 9pagi sehingga 12 tengahari sahaja pada Hari Jumaat 15/09/2023.\r\n\r\nKami juga ada buka booth untuk mereka yang nak tahu dengan lebih lanjut tentang Five apps dan cara untuk daftar aplikasi tersebut. 🥰\r\n\r\n15/09/2023, Jumaat. Save the date gaissss. Jumpa nanti 😎', 'Perkarangan Stesen Minyak Five Petrol Kulaa Krai', 'Kelantan', 'Kuala Krai', 'eventimg/685771ce1f85a_473574681_462756596886430_2950478375941290862_n.jpg'),
('EVT20231108100000881', 'Kempen Derma Darah', '2023-11-08', '10:00:00', '15:00:00', 'Assalamualaikum dan Salam Sejahtera.\r\n\r\n🩸KEMPEN DERMA DARAH🩸\r\n\r\nJemput semua pelajar UTeM untuk menyertai kempen menderma darah! Satu sumbangan yang kecil boleh menyelamatkan nyawa. Sertailah kami dalam membina sebuah komuniti yang prihatin dan bertanggungjawab. Bersama kita berikan harapan kepada yang memerlukan!\r\n\r\n🔴 KEMPEN DERMA DARAH \r\n\r\n📅Tarikh  : 8 November 2023 (Rabu)\r\n🕦Masa   : 10:00 pagi - 3:00 petang\r\n📍Lokasi  : Dewan Auditorium Fakulti Teknologi & Kejuruteraan Industri & Pembuatan (FTKIP)\r\n\r\n“We Soar With Pride” 🕊\r\n\r\nUntuk maklumat lebih lanjut, like dan follow kami di :\r\n-——————————————-\r\nInstagram:  @kklekiu \r\nFacebook : Satria Lekiu\r\n\r\n#JaksisLekiu2023\r\n#KolejKediamanSatria\r\n#MyUTeM\r\n#AlwaysAPioneer\r\n#AlwaysAhead', 'Dewan Auditorium Fakulti Teknologi & Kejuruteraan Industri & Pembuatan (FTKIP)\r\n', 'Melaka', 'Alor Gajah', 'eventimg/68572e1ff295d_WhatsApp Image 2025-06-22 at 06.02.21_5c235c0a.jpg'),
('EVT20240320173000585', 'PROGRAM DERMA DARAH RAMADAN 2024', '2024-03-20', '17:30:00', '22:00:00', 'Assalamualaikum wrt. wbt. dan Salam Sejahtera\r\n\r\n\r\nY.Bhg. Datuk / Dato\' / Prof. / Prof. Madya/ Dr./ Tuan / Puan,\r\n\r\nSukacita dimaklumkan bahawa satu program derma darah sempena ramadan 1445H dengan kerjasama Jabatan Perubatan Transfusi Hospital Melaka, Kelab Rakan Kesihatan (KRK), Pusat Kesihatan UTeM dan Pusat Islam UTeM akan menganjurkan PROGRAM DERMA DARAH RAMADAN 2024 pada ketetapan yang berikut :-\r\n\r\nTarikh     :  20 & 26 MAC 2024\r\nMasa      :  05.30 Petang – 10.00 Malam\r\nTempat  :  Masjid Sayyidina Abu Bakar UTeM\r\n\r\nSehubungan dengan itu, seluruh pelajar dan warga UTeM tanpa mengira bangsa dan agama dijemput hadir bagi mengambil bahagian sebagai penderma darah. Untuk makluman, Jabatan Perubatan Transfusi Hospital Melaka mengalami pengurangan jumlah beg darah pada bulan ramadan dan amat memerlukan bekalan beg darah yang mencukupi dalam usaha untuk menyelamatkan nyawa. Jabatan Perubatan Transfusi Hospital Melaka mensasarkan kutipan sebanyak 250 beg darah pada sesi kempen pada kali ', 'Masjid Sayyidina Abu Bakar UTeM\r\n', 'Melaka', 'Alor Gajah', 'eventimg/68573e0ada845_WhatsApp Image 2025-06-22 at 06.12.49_59235885.jpg'),
('EVT20240326173000820', 'PROGRAM DERMA DARAH RAMADAN 2024', '2024-03-26', '17:30:00', '22:00:00', 'Assalamualaikum wrt. wbt. dan Salam Sejahtera\r\n\r\n\r\nY.Bhg. Datuk / Dato\' / Prof. / Prof. Madya/ Dr./ Tuan / Puan,\r\n\r\nSukacita dimaklumkan bahawa satu program derma darah sempena ramadan 1445H dengan kerjasama Jabatan Perubatan Transfusi Hospital Melaka, Kelab Rakan Kesihatan (KRK), Pusat Kesihatan UTeM dan Pusat Islam UTeM akan menganjurkan PROGRAM DERMA DARAH RAMADAN 2024 pada ketetapan yang berikut :-\r\n\r\nTarikh     :  20 & 26 MAC 2024\r\nMasa      :  05.30 Petang – 10.00 Malam\r\nTempat  :  Masjid Sayyidina Abu Bakar UTeM\r\n\r\nSehubungan dengan itu, seluruh pelajar dan warga UTeM tanpa mengira bangsa dan agama dijemput hadir bagi mengambil bahagian sebagai penderma darah. Untuk makluman, Jabatan Perubatan Transfusi Hospital Melaka mengalami pengurangan jumlah beg darah pada bulan ramadan dan amat memerlukan bekalan beg darah yang mencukupi dalam usaha untuk menyelamatkan nyawa. Jabatan Perubatan Transfusi Hospital Melaka mensasarkan kutipan sebanyak 250 beg darah pada sesi kempen pada kali ', 'Masjid Sayyidina Abu Bakar UTeM\r\n', 'Melaka', 'Alor Gajah', 'eventimg/68573d71b2955_WhatsApp Image 2025-06-22 at 06.12.49_59235885.jpg'),
('EVT20240614093000923', 'Celebrating 20 Years of Giving: \"Thank You Blood Donors\"', '2024-06-14', '09:30:00', '16:30:00', 'Jumpa anda pada 14 Jun 2024\r\n\r\nProgram Sempena Hari Derma Darah Sedunia Peringkat Hospital Bentong.\r\n\r\nMohon sebarkan kepada komuniti anda\r\n\r\ndan\r\n\r\nAnda mampu menyelamatkan insan lain yang memerlukan bantuan anda', 'Dewan Bunga Raya, Hospital Bentong', 'Pahang', 'Bentong', 'eventimg/68577bf05d4c8_476162057_589821450490435_193293968181589534_n.jpg'),
('EVT20240927090000858', 'PROGRAM MAI DERMA DARAH - Be a Hero !🩸', '2024-09-27', '09:00:00', '16:00:00', 'Assalamualaikum wbt.\r\n\r\nPROGRAM MAI DERMA DARAH - Be a Hero !🩸 \r\n\r\nUMNO bahagian Kangar dengan kerjasama Pergerakan Puteri UMNO Bahagian Kangar dan Unit Tabung Darah Hospital Tuanku Fauziah sekali lagi akan menganjurkan satu program derma darah. Program ini akan diadakan seperti ketetapan berikut : \r\n\r\n🗓 27 SEPTEMBER 2024 (Jumaat)\r\n🕣 9.00 pagi - 5.00 petang\r\nPendaftaran akhir : 4.30 petang\r\nRehat : 12.00 t/hari - 2.45 petang\r\n📍 Unit Tabung Darah Hospital Tuanku Fauziah, Kangar.\r\n\r\nAnda semua wira kami !\r\n\r\n✨50 kupon cabutan bertuah disediakan untuk 50 yang terawal✨\r\n\r\nSemoga dengan sumbangan tuan/puan dapat membantu menyediakan stok darah yang mencukupi seterusnya dapat menyelamatkan nyawa orang lain. \r\n\r\n\r\nTerima kasih', 'Unit Tabung Darah Hospital Tuanku Fauziah, Kangar.\r\n', 'Perlis', '', 'eventimg/68574222b6de7_WhatsApp Image 2025-06-22 at 07.32.10_7351e1c8.jpg'),
('EVT20241207090000945', 'Donate Blood Save Lives', '2024-12-07', '09:00:00', '14:00:00', 'Hai penderma darah yang dihormati semua. Kami akan mengadakan kempen derma darah di lokasi berikut :\r\n\r\nLokasi : NuCare Pharmacy, Tanah Rata Cameron Highlands\r\n\r\nTarikh : 7 Disember 2024 (Sabtu)\r\n\r\nMasa : 9.00 pagi - 2.00 petang\r\n\r\nJumpa kami esok di sana ya.\r\n\r\n#jomdermadarah\r\n#darahtakpernahcuti\r\n#BeADonorBeAHero', 'NuCare Pharmacy, Tanah Rata Cameron Highlands', 'Pahang', 'Cameron Highlands', 'eventimg/68577dad06e99_498244708_1278780847587533_3389956065514080512_n.jpg'),
('EVT20241217090000511', 'Jom Derma Darah', '2024-12-17', '09:00:00', '14:00:00', 'Assalamualaikum..orang awam dijemput untuk menghadiri program derma darah anjuran Unit Tabung Darah hospital bentong bertempat di Balai Bomba Dan Penyelamat Bentong dari jam 9 pagi sehingga 2 petang\r\n\r\n\"1 pek darah boleh menyelamatkan 3 nyawa\"..', 'Balai Bomba & Penyelamat Bentong', 'Pahang', 'Bentong', 'eventimg/68577c4fa17c3_487511950_1138935761599759_706937620451953486_n.jpg'),
('EVT20250109090000582', 'Derma Darah Selamatkan Nyawa', '2025-01-09', '09:00:00', '15:00:00', '🩸🩸Program Derma Darah Selamatkan Nyawa dengan kerjasama Hospital Bentong 🩸🩸\r\n\r\nTarikh : 9 Januari 2025 (Khamis)\r\nMasa : 9.00 pagi - 3.00 petang\r\nTempat : Bilik Seminar KVTAA\r\n\r\nAnjuran : Jabatan HEP KVTAA', 'Bilik Seminar, KVTAA', 'Pahang', 'Bentong', 'eventimg/68577cb99198c_472586931_17916168006024533_7203943043787160387_n.jpg'),
('EVT20250123090000526', 'Jom Derma Darah', '2025-01-23', '09:00:00', '12:00:00', '𝑷𝑬𝑵𝑮𝑼𝑴𝑼𝑴𝑨𝑵 𝑷𝑹𝑶𝑮𝑹𝑨𝑴 𝑫𝑬𝑹𝑴𝑨 𝑫𝑨𝑹𝑨𝑯\r\n\r\nKoperasi Keluarga Haji Roslan Kedah Berhad dengan sukacitanya menjemput orang ramai ke Program Derma Darah dan Pemeriksaan Kesihatan sempena Hari Terbuka Koperasi.\r\n\r\nButiran program adalah seperti berikut:\r\n\r\n📅 Tarikh: 𝟐𝟑 𝐉𝐚𝐧𝐮𝐚𝐫𝐢 𝟐𝟎𝟐𝟓 (𝐊𝐡𝐚𝐦𝐢𝐬)\r\n🕘 Masa: 𝟗.𝟎𝟎 𝐩𝐚𝐠𝐢 - 𝟏𝟐.𝟎𝟎 𝐭𝐞𝐧𝐠𝐚𝐡 𝐡𝐚𝐫𝐢\r\n📍 Lokasi: 𝐑𝐑 𝐇𝐨𝐦𝐞𝐬𝐭𝐚𝐲 & 𝐄𝐯𝐞𝐧𝐭𝐬𝐩𝐚𝐜𝐞 (𝐛𝐞𝐫𝐡𝐚𝐝𝐚𝐩𝐚𝐧 𝐓𝐚𝐩𝐚𝐤 𝐍𝐚𝐭 𝐓𝐮𝐚𝐥𝐚𝐧𝐠)\r\n\r\nMarilah bersama-sama menderma darah untuk membantu mereka yang memerlukan sambil menjalani pemeriksaan kesihatan percuma.', '𝐑𝐑 𝐇𝐨𝐦𝐞𝐬𝐭𝐚𝐲 & 𝐄𝐯𝐞𝐧𝐭𝐬𝐩𝐚𝐜𝐞 (𝐛𝐞𝐫𝐡𝐚𝐝𝐚𝐩𝐚𝐧 𝐓𝐚𝐩𝐚𝐤 𝐍𝐚𝐭 𝐓𝐮𝐚𝐥𝐚𝐧𝐠)', 'Kedah', 'Padang Terap', 'eventimg/68574b13055c0_474472947_122178730526128560_6112543572798103925_n.jpg'),
('EVT20250123100000583', 'Kempen Derma Darah @ Jelebu', '2025-01-23', '10:00:00', '15:00:00', 'Kempen Derma Darah@Jelebu telah bermula tepat jam 10 pagi. Yang berdekatan dijemput datang ke Dewan Besar Kuala Klawang untuk sama-sama menunaikan tanggungjawab sosial.\r\n\"Setitis Darah, Sejuta Harapan\"\r\n #jomdermadarah #jolobu\r\n', 'Dewan Besar Kuala Klawang', 'Negeri Sembilan', 'Jelebu', 'eventimg/685779c9d443e_486571782_978945764427448_6752109423975520294_n.jpg'),
('EVT20250213100000803', 'Program Derma Darah Setitis Darah, Sejuta Harapan', '2025-02-13', '10:00:00', '15:00:00', 'Kelab Sukan dan Kebajikan Perbadanan Pengangkutan Awam Johor (PAJ) dengan kerjasama MBIP - Majlis Bandaraya Iskandar Puteri & Hospital Sultanah Aminah Johor Bahru akan menganjurkan Program Derma Darah seperti ketetapan berikut :\r\n\r\nTarikh : 13 Februari 2025 (Khamis)\r\nMasa : 10.00 pagi - 3.00 petang\r\nTempat : Dewan Utama MBIP, Bangunan Temenggong Ibrahim, Bandar Medini\r\n\r\nUntuk pendaftaran, sila imbas kod QR pada lampiran poster atau isi di link https://forms.gle/T1PFfV228VwK37WH6\r\n\r\n#PAJ\r\n#PerbadananPengangkutanAwamJohor\r\n#KelabSukanPAJ\r\n#MBIP\r\n#HSA', 'Dewan Utama MBIP, Bangunan Temenggong Ibrahim, Bandar Medini', 'Johor', 'Johor Bahru', 'eventimg/685753f6d25ee_487537048_1094295379409259_1694371202751577383_n.jpg'),
('EVT20250220093000529', 'Kempen Derma Darah : Kami Memerlukan Darah Anda ', '2025-02-20', '09:30:00', '15:00:00', 'Jom menderma darah', 'Ruang Legar Unit Pendidikan Kesihatan', 'Negeri Sembilan', 'Jempol', 'eventimg/68577ae97827a_482274834_967633008888330_6325111750674142951_n.jpg'),
('EVT20250325210000589', 'Kempen Derma Darah : Setitis Darah Sejuta Harapan', '2025-03-25', '21:00:00', '23:30:00', 'Selamat pagi & salam Sejahtera...\r\nStok Darah kini diperlukan bagi menampung keperluan pesakit menjelang musim perayaan nanti. Tabung Darah HTAN menyeru warga Kuala Pilah untuk sama-sama bergandingan dalam memastikan stok darah yang selamat dapat dibekalkan kepada mereka yang memerlukan...\r\n\r\nDijemput warga berhampiran untuk hadir ke lokasi yang telah dinyatakan...\r\n25 Mac 2025 (Selasa)\r\nMasjid Jamek Yam Tuan Raden Kuala Pilah\r\n9pm - 11.30pm (Selepas Solat Tarawih)\r\nSila follow fb, instagram & tiktok Tabung Darah Hospital Tuanku Ampuan Najihah (HTAN)\r\n\r\np/s mohon sebar & viralkan pada kenalan2\r\n#kempendermadarah\r\n#tabungdarahhtan\r\n#blooddonation\r\n#perubatantransfusi\r\n#probloodbank\r\n#mobile', 'Masjid Jamek Yam Tuan Raden Kuala Pilah', 'Negeri Sembilan', 'Kuala Pilah', 'eventimg/68577956d2938_491927920_1076250104529344_965459569001096336_n.jpg'),
('EVT20250405100000581', 'Blood Donation Campaign', '2025-04-05', '10:00:00', '15:00:00', 'Salam Aidilfitri ✨\r\n\r\nKempen Derma Darah HSAJB akan berada di Dewan Che Ru Khor, Endau Mersing pada 5 April 2025, Sabtu bermula 10.00 pagi - 3.00 petang. Ayuh bantu kami tingkatkan jumlah bekalan darah agar semua pesakit dapat meneruskan pemindahan darah dan dapat meneruskan kehidupan yang sihat.\r\n\r\n\r\n#pendermakonsisten\r\n#darahtakpernahcuti\r\n#dermadarah\r\n#dermadarahjb', 'Dewan Che Ru Khor, Endau Mersing', 'Johor', 'Mersing', 'eventimg/685763b423b6f_488590583_18031754789634884_5783554705851783395_n.jpg'),
('EVT20250417100000595', 'Jom Derma Darah @MPJ', '2025-04-17', '10:00:00', '15:00:00', '🩸JOM DERMA DARAH 💉🩸\r\n\r\nSedia tubuh, sedia jiwa — derma darah, selamatkan nyawa!\r\nJom kita derma darah pada…\r\n\r\nTarikh : 17 April 2025 (Khamis)\r\nMasa : 10.00 pagi - 3.00 petang\r\nTempat : Lobi Vista Alamanda, MPJ\r\n\r\nSekantong darah, tiga nyawa diselamatkan — satu derma, impak berganda!\r\n\r\nJumpa anda nanti!!\r\n\r\n𝗠𝗮𝗻𝗮 𝗟𝗮𝗴𝗶? 𝗠𝗲𝗹𝗮𝗸𝗮 𝗟𝗲𝗿...\r\n𝐉𝐨𝐦! “𝐋𝐢𝐤𝐞, 𝐅𝐨𝐥𝐥𝐨𝐰 𝐝𝐚𝐧 𝐒𝐡𝐚𝐫𝐞”\r\n\r\n𝐌𝐞𝐝𝐢𝐚 𝐒𝐨𝐬𝐢𝐚𝐥 𝐑𝐚𝐬𝐦𝐢 𝐌𝐚𝐣𝐥𝐢𝐬 𝐏𝐞𝐫𝐛𝐚𝐧𝐝𝐚𝐫𝐚𝐧 𝐉𝐚𝐬𝐢𝐧\r\n𝐅𝐚𝐜𝐞𝐛𝐨𝐨𝐤 / 𝐈𝐧𝐬𝐭𝐚𝐠𝐫𝐚𝐦 / 𝐘𝐨𝐮𝐭𝐮𝐛𝐞 / 𝐗 / 𝐓𝐢𝐤𝐓𝐨𝐤 : @𝐦𝐩𝐣𝐚𝐬𝐢𝐧𝐨𝐟𝐟𝐢𝐜𝐢𝐚𝐥\r\n𝐖𝐞𝐛𝐬𝐢𝐭𝐞 : 𝐰𝐰𝐰.𝐦𝐩𝐣𝐚𝐬𝐢𝐧.𝐠𝐨𝐯.𝐦𝐲\r\n𝐄𝐦𝐞𝐥 : 𝐢𝐧𝐟𝐨@𝐦𝐩𝐣𝐚𝐬𝐢𝐧.𝐠𝐨𝐯.𝐦𝐲\r\n\r\nYAB Datuk Seri Utama Ab Rauf Yusoh\r\nYB Pejabat Setiausaha Kerajaan Negeri Melaka\r\nYB Datuk Rais Yasin\r\nYB Datuk Zulkiflee Bin Datuk Seri Hj. Mohd Zin\r\nKerajaan Negeri Melaka\r\nMelaka Hari Ini\r\n\r\n#MelakakuMajuJayaRakyatBahagiaMengamitDunia\r\n#BijakLaksanaTuahBeraniLaksanaJebat\r\n#MelakaRESPONSIVE\r\n#MalaysiaMadani\r\n#MPJPrihatinDiHatiku\r\n#worldtourismday2025\r\n#worldtourismconference2025\r\n\r\nSebarang pertanyaan boleh menghubungi:\r\nMajlis Perbandaran Jasin\r\n📞 06-5291', 'Lobi Vista Alamanda, MPJ', 'Melaka', 'Jasin', 'eventimg/68577543cdad4_490353060_1065272402297844_7114132562170417510_n.jpg'),
('EVT20250419080000806', 'Majlis Hari Raya Aidilfitri', '2025-04-19', '08:00:00', '11:00:00', 'Ayuh warga tanah merah....\r\n\r\nJom bersama-sama menderma darah di\r\nmasjid AL FALAH MUKIM MANAL 1\r\n\r\nPada 19 April 2025\r\nHari Sabtu\r\nBermula jam 9pagi hingga 12 tghr\r\n\r\nJumpa anda semua di sana...😃\r\n#jomdermadarah', 'Perkarangan Masjid Al-Falah Mukim Manal 1', 'Kelantan', 'Tanah Merah', 'eventimg/68576d062e180_491311336_653679537306993_1434418163175325711_n.jpg'),
('EVT20250425090000342', 'Derma Darah Perpaduan', '2025-04-25', '09:00:00', '17:00:00', '500 hadiah menarik untuk para penderma! 🤩 Terima kasih kepada para penganjur kempen yang bertungkus lumus menyediakan semua hadiah ini 🥰\r\nWow, jangan lupa ya temujanji kita pada Jumaat ini, 25 April. Kita akan bermula dari 9 pagi hingga 5 petang! 🥳 Tak sabar nak jumpa semua disana ❤️\r\nNak taw lokasi? Boleh ikut google maps ini ya https://maps.app.goo.gl/B1LmXd4MeWMPQZCF6?g_st=iw\r\n#dermadarahperpaduan #darahtakpernahcuti #dermadarahselamatkannyawa #jomdermadarah #dermadarahkelantan #pendermakonsisten', 'Leng Eng Tian Temple', 'Kelantan', 'Kota Bharu', 'eventimg/68576b2fe41a0_Screenshot 2025-06-22 102945.png'),
('EVT20250430090000747', 'Save Lives: Donate Blood Today!', '2025-04-30', '09:00:00', '15:00:00', 'Khas untuk warga Pasir Mas.\r\nTemui kami Rabu ini\r\n\r\n#jomdermadarah #dermadarahselamatkannyawa #dermadarahkelantan', 'Dewan Permai, Hospital Pasir Mas', 'Kelantan', 'Pasir Mas', 'eventimg/68576a0cae65b_493736717_661978529810427_37430659086203490_n.jpg'),
('EVT20250504090000482', 'Blood Donors: Your Blood, Their Hope', '2025-05-04', '09:00:00', '14:00:00', 'Bagi penderma yang telah melepasi tempoh 90 hari, anda boleh hadir menderma darah.', 'Persatuan Pendidekan Akhlak Che Teck Khor Port Dickson', 'Negeri Sembilan', 'Port Dickson', 'eventimg/685778994fd90_494643597_1008117824843575_5380295734276520792_n.jpg'),
('EVT20250505090000747', 'Program Derma Darah Anda Hero 10.0', '2025-05-05', '09:00:00', '15:30:00', 'Jom Warga Tumpat!\r\n\r\nKami ada disini.\r\n\r\nJumpa nanti! 🤩\r\n\r\n#darahtakpernahcuti #dermadarahselamatkannyawa #jomdermadarah #dermadarahkelantan #pendermakonsisten', 'Dewan Hidayah, Hospital Tumpat', 'Kelantan', 'Tumpat', 'eventimg/6857691447706_495593229_666772815997665_2207662703633577730_n.jpg'),
('EVT20250510093000699', 'SAMBUTAN 100 TAHUN SK HOSBA: DERMA DARAH', '2025-05-10', '09:30:00', '16:30:00', 'Salam Sabtu , 10 Mei 2025 ...\r\nJemput datang kepada yang sudah cukup tempoh untuk menderma semula.\r\nKepada yang baru hendak menderma darah, juga dialu-alukan.\r\nJom datang derma darah hari ini.\r\nTerima kasih kerna menderma darah.\r\n#teamhospitalsultanahbahiyah \r\n#dermadarahkedahperlis \r\n#setitisdarahsejutaharapan \r\n#dermadarahselamatkannyawa \r\n#jomdermadarah', 'Sekolah Kebangsaan Hosba', 'Kedah', 'Kubang Pasu', 'eventimg/6857493b05ff9_495496052_1020322956949781_2992768920862148570_n.jpg'),
('EVT20250511090000190', 'Blood Donation Day', '2025-05-11', '09:00:00', '14:00:00', 'Ayuh #negeriblood donor semua\r\n\r\nKebaikan yang anda lakukan ini secara tidak langsung dapat membantu pesakit-pesakit yang sangat memerlukannya.\r\n\r\n#jomdermadarah #negerisembilan #dermadarahselamatkannyawa #blooddonation', 'Akhlak Che Shi Khor Gemas', 'Negeri Sembilan', 'Tampin', 'eventimg/6857776605a78_495960465_1013253827663308_8197075664831633023_n.jpg'),
('EVT20250517083000116', 'Program Derma Darah', '2025-05-17', '08:30:00', '13:00:00', 'JOM DERMA DARAH!!\r\nTemui kami pada 17/5/2025 (Sabtu) di Masjid Mukim Teluk Kitang.\r\nJom derma darah, bantu selamatkan nyawa insan yang memerlukan.\r\n#dermadarahselamatkannyawa \r\n#dermadarahkelantan', 'Parkir Masjid Mukim Teluk Kitang', 'Kelantan', 'Kota Bharu', 'eventimg/6857687d177b4_496008870_673565041985109_2004755730836579874_n.jpg'),
('EVT20250517093000332', 'Program Derma Darah Asy Syujaah 14.0', '2025-05-17', '09:30:00', '14:00:00', '*Program Derma Darah Asy Syujaah 14.0*\r\n\r\nTarikh : 17.5.2025 (Sabtu)\r\nMasa : 9.30pg - 2.00 tghr\r\nLokasi : Lobi Masjid Asy Syujaah Merlimau\r\n(Hadapan Politeknik Merlimau)\r\nSemua boleh hadir\r\n(Melayu, Cina, India dijemput hadir)\r\n\r\n#dermadarahselamatkannyawa #dermadarahmelaka2025 #pendermakonsisten #asysyujaah', 'Lobi Masjid Asy Syujaah Merlimau\r\n(Hadapan Politeknik Merlimau)', 'Melaka', 'Jasin', 'eventimg/6857744f4aec2_497515960_1120012750168848_797337313696940894_n.jpg'),
('EVT20250524100000597', 'Blood Donation Drive @ Aeon Nilai', '2025-05-24', '10:00:00', '16:00:00', 'Jom hadir menderma darah di AEON Mall Nilai (berhampiran outlet minuman Jom Cha).', 'Aeon Mall Nilai', 'Negeri Sembilan', 'Seremban', 'eventimg/6857768a5e9c9_499782601_1023736429948381_4106711729318900320_n.jpg'),
('EVT20250526090000639', 'Program Derma Darah', '2025-05-26', '09:00:00', '15:00:00', 'Sapa geng pasir puteh? 😋 Esok kami di Hospital Tengku Anis, Pasir Puteh. \r\n\r\nPakat mari la belako deh, stok darah masih tak stabil 🥹 marilah bantu para pesakit di hospital. Darah kito boleh tolong sambung nyawa pesakit yang memerlukan. \r\n\r\n#darahtakpernahcuti #dermadarahselamatkannyawa #jomdermadarah #dermadarahkelantan #pendermakonsisten', 'Dewan Ibnu Sina', 'Kelantan', 'Pasir Puteh', 'eventimg/6857679f99d7a_photo_2025-05-25_17-43-30.jpg'),
('EVT20250527100000568', 'Program Derma Darah', '2025-05-27', '10:00:00', '14:00:00', 'Jom Derma Darah\r\n\r\nProgram Derma Darah\r\n\r\n27 Mei 2025/Selasa\r\nPejabat Tapak JKR Kg. Som\r\n10.00 pagi - 2.00 petang', 'Pejabat Tapak JKR Kg. Som', 'Pahang', 'Jerantut', 'eventimg/68577eaa33899_500452458_2174316366321916_5123249901896542749_n.jpg'),
('EVT20250527103000969', 'Kempen Derma Darah', '2025-05-27', '10:30:00', '15:00:00', 'Kempen derma darah anjuran Pasaraya Lotus’s dengan kerjasama Tabung Darah Hospital Sultan Abdul Halim akan diadakan pada:\r\n\r\n📅 Tarikh: 27 Mei 2025 (Selasa)\r\n⏰ Masa: 10.30 AM – 3.00 PM\r\n📍 Lokasi: Lotus’s Sungai Petani Selatan\r\n\r\nAnda semua dijemput untuk hadir menderma darah bersama kami.\r\n\r\nJumpa anda semua di sana!!\r\n\r\nGive Blood Save Life 🩸♥️🩸♥️\r\n\r\n#dermadarahkedahperlis\r\n#darahtakpernahcuti\r\n#setitisdarahsejutaharapan\r\n#jomdermadarah\r\n#dermadarahselamatkannyawa', 'Lotus’s Sungai Petani Selatan', 'Kedah', 'Kuala Muda', 'eventimg/68574872c3794_500257413_1031579749157435_7347830895070187434_n.jpg'),
('EVT20250529100000257', 'Sentuhan KASIH Ibu', '2025-05-29', '10:00:00', '14:09:00', 'Kempen derma darah anjuran Lembaga Penduduk dan Pembangunan Keluarga Negara (LPPKN) Negeri Perlis dengan kerjasama Tabung Darah HTF akan diadakan seperti ketetapan berikut:\r\n\r\n📆 29 Mei 2025, Khamis\r\n⏱ 10 pagi hingga 2 petang\r\n📍 Lobi, Bangunan Persekutuan\r\n\r\nSetitis darah, sejuta harapan. Jom laksanakan tanggungjawab sosial anda dengan tampil menderma darah ', 'Lobi, Bangunan Persekutuan', 'Perlis', '', 'eventimg/68518522f0817_WhatsApp Image 2025-05-28 at 15.59.57_fdd2db45.jpg'),
('EVT20250531100000876', 'KEMPEN DERMA DARAH & JOM IKRAR DERMA ORGAN', '2025-05-31', '10:00:00', '15:00:00', '📢 JOM SERTAI KEMPEN DERMA DARAH & JOM IKRAR DERMA ORGAN! 🩸🫀\r\n\r\nKami bawakan satu program kesedaran kesihatan yang penuh manfaat untuk anda semua! 🧑‍⚕️✨\r\n\r\n📅 Tarikh: Sabtu, 31 Mei 2025\r\n🕙 Masa: 10.00 pagi – 3.00 petang\r\n📍 Lokasi: Pentas Utama, KIPMall Kota Tinggi\r\n\r\n✨ Antara aktiviti menarik yang menanti anda:\r\n✅ Booth pendaftaran Kelab Penderma Darah Negeri Johor + Kuiz Kesedaran Derma Darah\r\n✅ Pemeriksaan kesihatan PERCUMA oleh Klinik Dr Huda\r\n✅ Booth Jom Ikrar Derma Organ oleh Hospital Kota Tinggi\r\n\r\n💪 Jom tampil sebagai wira tanpa jubah – derma darah, daftar sebagai penderma organ, dan jalani pemeriksaan kesihatan secara percuma!\r\n\r\n📣 Jangan lupa ajak keluarga & rakan-rakan – sama-sama kita sebarkan kesedaran dan hulurkan harapan kepada yang memerlukan ❤️\r\n\r\n📌 Anjuran: Pergerakan Pemuda MIC Bahagian Kota Tinggi\r\n🤝 Dengan kerjasama: KIPMall Kota Tinggi, Klinik Dr Huda, Kelab Penderma Darah Negeri Johor, Hospital Sultanah Aminah & Hospital Kota Tinggi\r\n\r\n#KIPMall #KIPMallKotaTinggi #K', 'Pentas Utama KIPMall Kota Tinggi', 'Johor', 'Kota Tinggi', 'eventimg/6857627276fc5_499552407_1076633097819541_3169764969094683407_n.jpg'),
('EVT20250531110000825', 'Kempen Derma Darah Give Blood Save Life', '2025-05-31', '11:00:00', '15:30:00', '🩸🩸 SAVE THE DATE🩸🩸\r\n\r\n📅 31 Mei 2025 dan 1 Jun 2025\r\n📍 Ground Floor AEON Mall Seremban 2\r\n⏰️ 11.00 am sehingga 3.30 pm', 'Ground Floor Aeon Mall Seremban 2', 'Negeri Sembilan', 'Seremban', 'eventimg/685775e3a584a_500763277_1027630866225604_1430045691291498735_n.jpg'),
('EVT20250602110000948', 'Kempen Derma Darah', '2025-06-02', '11:00:00', '15:00:00', 'JOM DERMA DARAH!! 🩸🅰️🅱️🅾️🆎🩸\r\nWarga Kulim & sekitarnya,temui kami pada 02/06/2025 ( Isnin) di Kulim Central dari jam 11 pagi hingga 3 petang\r\nJom derma darah, bantu selamatkan nyawa insan yang memerlukan.\r\n#dermadarahselamatkannyawa \r\n#jomjadihero \r\n#dermadarahhospitalkulim', 'Kulim Central', 'Kedah', 'Kulim', 'eventimg/6857457c63d31_503371346_1036299915352085_8958328072063636810_n.jpg'),
('EVT20250602120000624', 'Kempen Derma Darah', '2025-06-02', '12:00:00', '18:00:00', 'Jom derma darah, selamatkan nyawa! 🩸✨\r\n\r\nHospital Baling dengan kerjasama Econsave menjemput anda ke Kempen Derma Darah bertemakan \"Setitis Darah, Sejuta Harapan\".\r\n\r\n📅 2 Jun 2025 (Isnin)\r\n🕛 12:00 tengah hari – 6:00 petang\r\n📍 Econsave Baling\r\n\r\nSetiap titisan darah anda mampu menjadi harapan kepada mereka yang memerlukan. Jangan lepaskan peluang untuk membuat kebaikan—cenderahati eksklusif menanti semua penderma!\r\n\r\nMari bersama-sama meringankan beban pesakit dan menjadi wira 🌟\r\n', 'ECONSAVE BALING', 'Kedah', 'Baling', 'eventimg/68574f444f7fa_501592506_1268667471720770_6682863733576038716_n.jpg'),
('EVT20250613100000165', 'Kempen Derma Darah : Farmasi Astaraya Gurun', '2025-06-13', '10:00:00', '16:00:00', 'Salam Jumaat 13 Jun 2025..\r\nKami  telah bersiap sedia menanti para penderma darah yang budiman di perkarangan Farmasi Astaraya, Gurun hari ini.\r\nKaunter pendaftaran penderma darah akan di tutup sementara pada jam 1 petang hingga 2 petang untuk petugas bersolat. Kaunter akan dibuka semula pada jam 2 petang.\r\nJom warga DDKP sekitar Gurun datang derma darah hari ini.\r\nAda sedikit \' manis-manis\' daripada pihak Farmasi Astaraya kepada penderma darah hari ini.\r\nKami tunggu anda datang.\r\nTerima kasih kerana menderma darah.\r\n#dermadarahkedahperlis \r\n#dermadarahselamatkannyawa ', 'Farmasi Astaraya, Gurun', 'Kedah', 'Kuala Muda', 'eventimg/685744ed9852c_506443204_1044828684499208_8796911334888741730_n.jpg'),
('EVT20250614100000318', 'Program Sahabat Maritim : Zon Maritim Kuala Kedah', '2025-06-14', '10:00:00', '16:00:00', 'Sabtu 14 Jun 2025, bertempat di Jeti Tanjung Dawai dari jam 10 pagi hingga 4 petang sempena program Sahabat Maritim.\r\nKami siap sedia menunggu  kedatangan para penderma darah yang berada di sekitar kawasan yang berdekatan.\r\nJom hadir derma darah.\r\nTerima kasih kerana menderma darah.\r\n#dermadarahkedahperlis \r\n#dermadarahselamatkannyawa \r\n#jomdermadarah', 'Jeti Tanjung Dawai, Merbok, Kedah', 'Kedah', 'Kuala Muda', 'eventimg/68574736807a0_506685162_1045578571090886_4695799786219887421_n.jpg'),
('EVT20250614110000880', 'SAMBUTAN HARI PENDERMA DARAH SEDUNIA PERINGKAT NEGERI MELAKA 2025 🎙', '2025-06-14', '11:00:00', '16:00:00', 'SAMBUTAN HARI PENDERMA DARAH SEDUNIA PERINGKAT NEGERI MELAKA 2025 🎙\r\n\r\n🗓️ 14 JUN 2025 (SABTU)\r\n⏰ 11.00 A.M. - 2.00 P.M.\r\n📍 KIPMall Melaka\r\n\r\nJOM meriahkan hujung minggu anda bersama kami di KIPMall Melaka 🥰🥰\r\n\r\n#kipmallmelaka #kipmall #melaka #kipreit #kip #kipgroup', 'Pentas Utama KIPMall Melaka', 'Melaka', 'Melaka Tengah', 'eventimg/6857739cec79d_506254640_751103607245066_7497886546023425814_n.jpg'),
('EVT20250616090000377', 'Kempen Derma Darah Perdana', '2025-06-16', '09:00:00', '14:00:00', 'Khas untuk warga Machang.\r\nTeam mobile Hosp Tanah Merah akan berada di Foyer Blok D, UiTM Machang pada Isnin dan Selasa ini (16 & 17 Jun 2025) jam 9am-2pm.', 'Foyer Blok D, UiTM Machang', 'Kelantan', 'Machang', 'eventimg/685766c4429a6_506460442_695849466423333_2153210796398952097_n.jpg'),
('EVT20250616093000167', 'Jom Derma Darah!', '2025-06-16', '09:30:00', '14:00:00', 'Kempen Derma Darah di Klinik Kesihatan Chiku 3, Gua Musang Anjuran Jabatan Pathologi & Transfusi Darah Hospital Kuala Krai. ', 'Klinik Kesihatan Chiku 3', 'Kelantan', 'Gua Musang', 'eventimg/685770147a2f9_508341171_1685092372128042_686181057228607265_n.jpg'),
('EVT20250616100000575', 'Kempen Derma Darah Perdana \'UiTM HeartBeat\' - UiTM Cawangan Perlis\r\n', '2025-06-16', '10:00:00', '16:00:00', 'Kempen Derma Darah Perdana \'UiTM HeartBeat\' - UiTM Cawangan Perlis\r\n\r\nSempena sambutan Hari Penderma Darah Sedunia, ayuh bersama menjayakan \'UiTM HeartBeat: Nationwide Blood Drive for a Better Tomorrow\' — kempen derma darah peringkat nasional yang julung kalinya dianjurkan!\r\n\r\n📅 Tarikh: 16 Jun  2025 (Isnin)\r\n🕘 Masa: 10:00 pagi – 4:00 petang\r\n📍 Lokasi: Unit Kesihatan, UiTM Cawangan Perlis\r\n\r\n❤ “Setitis Darah, Sejuta Harapan”\r\n\r\nSumbangan anda mampu menyelamatkan nyawa. Jom tampil sebagai wira!\r\n\r\n🔗 Terbuka kepada semua warga UiTM Cawangan Perlis, alumni, rakan industri dan komuniti setempat yang memenuhi kriteria untuk menderma darah.\r\n\r\n#UiTMHeartBeat  #SetitisDarahSejutaHarapan  #UiTMdihatiku #UiTMCawanganPerlis', 'Unit Kesihatan, UiTM Cawangan Perlis\r\n', 'Perlis', '', 'eventimg/6857af098cac5_WhatsApp Image 2025-06-14 at 18.53.20_9dd6d46c.jpg'),
('EVT20250617090000185', 'Kempen Derma Darah', '2025-06-17', '09:00:00', '15:00:00', 'Assalamualaikum & salam sejahtera\r\nSukacita dimaklumkan, Satu *PROGRAM DERMA DARAH* akan diadakan pada:\r\nTarikh : 17/6/25 ( Selasa )\r\nMasa  : 9.00pagi sehingga 3.00 petang\r\nTempat:  Unit Patologi & Tabung Darah Hospital Jerantut\r\nSemua dijemput hadir untuk menambah stok darah yang kian berkurang.\r\nTerima kasih\r\nHOSPITAL JERANTUT \r\ntahun ni kita bgi spesial hadiah untuk bulan derma darah iaitu fridge magnet.. jadi semua dijemput hadir ye untuk memeriahkan majlis\r\nSelain itu turut disediakan jamuan ringan serta cenderahati berupa goodies beg yg comel terhad kepada 40 penderma terawal..', 'Unit Patologi & Tabung Darah Hospital Jerantut', 'Pahang', 'Jerantut', 'eventimg/68577e531ea48_508129879_1267730358685446_7668520410791098364_n.jpg'),
('EVT20250618100000255', 'Program Derma Darah', '2025-06-18', '10:00:00', '13:30:00', 'Anda sudah cukup tempoh masa matang 3 bulan untuk menderma dan memenuhi kriteria seperti gambar dibawah?\r\n\r\nJika YA, mari menderma kerana darah anda mampu menyelamatkan 3 nyawa 🩸Ayuh temui kami di lokasi berikut:\r\n\r\nTarikh: 18 Jun 2025 Rabu\r\nMasa: 10.00 am -1.30 pm\r\nLokasi: LG, Segamat Central (Area Mr Diy)\r\nAnjuran: Segamat Central & Unit Perubatan Transfusi Hospital Segamat\r\n\r\nLink maps:\r\nhttps://maps.app.goo.gl/aVU6tpKBwXShkq8E8\r\n\r\nJangan lepaskan peluang ini. Setitis darah anda memberikan sinar harapan kepada pesakit kami. Bawalah rakan-rakan anda untuk bersama-sama menderma. Jumpa anda di sana.\r\n\r\n#SegamatBoleh\r\n#johorbloodwarriors\r\n#Darahtidakpernahcuti\r\n#Jomdermadarah\r\n#DermadarahSegamat\r\n#HospitalSegamat', 'LG, Segamat Central (Area Mr Diy)', 'Johor', 'Segamat', 'eventimg/6857661baeb3d_508525933_1149214333912365_428694447461299744_n.jpg'),
('EVT20250619090000281', 'Program Derma Darah', '2025-06-19', '09:00:00', '13:00:00', 'Kami berada di Tingkat 4 (Bilik Mesyuarat), Wisma Ng Hoo Tee (Kia Lim), Parit Sulong.\r\nShared route: https://maps.app.goo.gl/18T474mmVmQgQ92HA?g_st=ac\r\n\r\nOrang ramai yang tinggal di sekitar Parit Sulong boleh datang esok. Kami berada di sana dari jam 9.00 pagi - 1.00 petang 💪\r\n\r\n#dermadarahselamatkannyawa\r\n#johorbloodwarriors\r\n#tdhsni', 'Wisma Ng Hoo Tee (Kia Lim), Parit Sulong', 'Johor', 'Batu Pahat', 'eventimg/6857614fae3cd_508818586_720790866978381_3711571759404872025_n.jpg'),
('EVT20250619090000562', 'Kempen Derma Darah', '2025-06-19', '09:00:00', '15:00:00', 'Mohon sebarkan agar Program Derma Darah pada kali ini lebih meriah.', 'Dewan Ilmiah Hospital Jeli', 'Kelantan', 'Jeli', 'eventimg/68576c2dcf388_508823245_1105990104915731_179927543713079355_n.jpg'),
('EVT20250619090000985', 'Kempen Derma Darah', '2025-06-19', '09:00:00', '15:00:00', 'Mohon sebarkan agar Program Derma Darah pada kali ini lebih meriah.', 'Dewan Ilmiah Hospital Jeli', 'Kelantan', 'Jeli', 'eventimg/68576c33a66f7_508823245_1105990104915731_179927543713079355_n.jpg'),
('EVT20250621083000633', 'SAMBUTAN HARI PENDERMA DARAH SEDUNIA', '2025-06-21', '08:30:00', '16:00:00', 'Assalamualaikum dan Salam Sejahtera,\r\n\r\n300 T-shirt percuma untuk penderma darah yang terawal. Jom datang derma darah pada hari Sabtu ini sempena Sambutan Hari Penderma Darah Sedunia. Jumpa anda di sana!\r\n\r\nFacebook: https://www.facebook.com/share/p/15VX8neRg4/', 'Lobi Utama, Hospital Sultanah Bahiyah', 'Kedah', 'Kota Setar', 'eventimg/68574440b92bc_508231080_1047250490923694_8623942359776644281_n.jpg'),
('EVT20250621100000364', 'Sambutan Hari Penderma Darah Sedunia Peringkat Negeri Johor 2025', '2025-06-21', '10:00:00', '14:00:00', 'Selamat menyambut Hari Penderma Darah Sedunia #johorbloodwarriors !\r\n\r\nJom raikan bersama-sama kami di Dewan Tunku Ibrahim Ismail, Kluang pada Sabtu ini, 21 Jun 2025, dari 10.00 pagi hingga 2.00 petang. Pelbagai pameran dan aktiviti menarik disediakan kepada para pengunjung yang hadir.\r\n\r\n“Derma Darah, Semai Harapan: Bersama Selamatkan Nyawa”\r\n\r\n#wbddjohor25kluang\r\n#pendermasetia\r\n#dermadarah\r\n#bloodbridge\r\n#flexpress', 'Dewan Tunku Ibrahim Ismail, Taman Tasik Kluang', 'Johor', 'Kluang', 'eventimg/68575e02be51d_508995790_18040257749634884_5408539012039813635_n.jpg'),
('EVT20250622100000307', 'Blood Donation', '2025-06-22', '10:00:00', '15:00:00', '🌟 AYUH KUANTAN! MASA UNTUK JADI HERO! 🌟\r\n\r\nTak perlu jadi doktor untuk selamatkan nyawa 💉\r\nCuma datang, derma, dan BOOM! 💥 Anda dah jadi penyelamat 🦸\r\n\r\nJom penuhkan stok darah hospital kita — kerana satu hari nanti, mungkin kita pula yang perlukan 💔 min ahad ni di sini okay.\r\n\r\nJom Derma Darah! 🩸', 'Kuantan City Mall (Level 1, front of Parkson)', 'Pahang', 'Kuantan', 'eventimg/68577f2e1306b_499567241_1328210115494665_2812217521689523210_n.jpg'),
('EVT20250622100000445', 'Passing the Torch of Love', '2025-06-22', '10:00:00', '14:00:00', 'Orang ramai yang tinggal Pekan Nanas dan disekitarnya jom datang support team kami.\r\n\r\nBantu sebarkan kepada kawan-kawan anda 💪\r\n\r\n#johorbloodwarriors\r\n#dermadarahselamatkannyawa\r\n#tdhsni', 'Econsave Pekan Nanas', 'Johor', 'Pontian', 'eventimg/685760618ad21_509441934_723221246735343_3677224999716000482_n.jpg'),
('EVT20250627083000792', 'Jom Derma Darah', '2025-06-27', '08:30:00', '12:30:00', '📢 *HEBAHAN PROGRAM DERMA DARAH*\r\n*SURAU AL QADR TAMAN KRUBONG PERDANA*\r\n\r\n_Assalamualaikum wbt_\r\n\r\n🩸 _Setitis Darah, Sejuta Harapan_ 🩸\r\n\r\n*Surau Al Qadr dengan kerjasama Unit Tabung Darah Hospital Melaka* akan menganjurkan:\r\n\r\n📅 *Tarikh* : Jumaat, 27 Jun 2025\r\n🕣 *Masa* : 8.30 pagi – 12.30 tengah hari\r\n📍 *Lokasi* : Surau Al Qadr, Taman Krubong Perdana\r\n\r\n✨ *Kenapa Anda Perlu Hadir?*\r\n✅ _Satu beg darah boleh SELAMATKAN 3 nyawa_\r\n✅ _Pemeriksaan kesihatan PERCUMA_\r\n✅ _Sumbangan anda amat BERMAKNA bagi pesakit yang memerlukan_\r\n\r\n❤️ Derma darah adalah satu amal jariah yang tidak ternilai. Jangan lepaskan peluang ini untuk menjadi penyelamat nyawa.\r\n\r\n🔁 Jemput kawan, keluarga & jiran!\r\nMari kita jadikan komuniti kita lebih sihat dan prihatin.\r\n\r\n📞 Sebarang pertanyaan, hubungi:\r\n*DR. MOHAMMAD FAIZ BIN SAHIRAN*\r\n📱 012-664 1340 📢\r\n(AJK Surau)\r\n\r\n*“Biar darah kita mengalir untuk kebaikan.”*', 'Surau Al Qadr, Taman Krubong Perdana', 'Melaka', 'Melaka Tengah', 'eventimg/6857727b998e4_506091665_122118085346858957_2768336189729187978_n.jpg'),
('EVT20251204100000895', 'Kempen Derma Darah', '2025-12-04', '10:00:00', '16:00:00', '🩸🩸🩸KEMPEN DERMA DARAH di Pendang 📢📢📢\r\n\r\n🗓️TARIKH : 4 Disember 2023\r\n📌HARI : Isnin\r\n🚑 TEMPAT : Lobi Utama, Pej. Daerah & Tanah Pendang\r\n⌚MASA: 10.00 PAGI - 4.00 PTG\r\n\r\nSetitis Darah Sejuta Harapan 🅰️🆎🅱️🅾️\r\n\r\nAnjuran : Pejabat Daerah dan Tanah Pendang, VAD Bulan Sabit Merah Malaysia - Pendang & Hospital Sultanah Bahiyah Alor Setar Derma Darah Kedah Perlis - DDKP\r\n\r\nSyarat - Syarat Asas Untuk Menderma Darah:\r\n1) Berumur 18-60 tahun (17tahun perlu mendapatkan kebenaran penjaga)\r\n2) Sihat tubuh badan💪🏻💪🏻\r\n3) Berat 45kg dan keatas\r\n4) Tidur melebihi 5 jam 🛏️🛏️\r\n5) Makan mencukupi sebelum pendermaan 🍚🍚\r\nMudahkan untuk menjadi penderma darah? 😁😁', 'Lobi Utama, Pej. Daerah & Tanah Pendang', 'Kedah', 'Pendang', 'eventimg/68576daa3023e_480498147_649566231062217_9189569258691201143_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event_management`
--

CREATE TABLE `event_management` (
  `event_id` varchar(200) NOT NULL,
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_management`
--

INSERT INTO `event_management` (`event_id`, `hospital_id`) VALUES
('EVT20240927090000858', 13),
('EVT20250529100000257', 13),
('EVT20250616100000575', 13),
('EVT20200512203000115', 70),
('EVT20210124100000518', 1),
('EVT20210204105900651', 19),
('EVT20211030100000941', 11),
('EVT20221214093000265', 60),
('EVT20230107103000303', 14),
('EVT20220311090000160', 71),
('EVT20230128100000870', 9),
('EVT20231108100000881', 25),
('EVT20240320173000585', 25),
('EVT20240326173000820', 25),
('EVT20240326173000820', 72),
('EVT20240614093000923', 47),
('EVT20241207090000945', 3),
('EVT20241217090000511', 47),
('EVT20250109090000582', 47),
('EVT20250123090000526', 22),
('EVT20250123100000583', 26);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_admin`
--

CREATE TABLE `hospital_admin` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital_admin`
--

INSERT INTO `hospital_admin` (`hospital_id`, `hospital_name`, `email`, `password`) VALUES
(1, 'Hospital Pakar Sultanah Fatimah', 'hpsf@pdn.gov.my', 'password123'),
(2, 'Hospital Sultanah Nora Ismail', 'hsni@pdn.gov.my', 'password123'),
(3, 'Hospital Enche’ Besar Hajjah Kalsom', 'hebhk@pdn.gov.my', 'password123'),
(4, 'Hospital Segamat', 'hsegamat@pdn.gov.my', 'password123'),
(5, 'Hospital Pontian', 'hpontian@pdn.gov.my', 'password123'),
(6, 'Hospital Kota Tinggi', 'hkt@pdn.gov.my', 'password123'),
(7, 'Hospital Mersing', 'hmersing@pdn.gov.my', 'password123'),
(8, 'Hospital Tangkak', 'htangkak@pdn.gov.my', 'password123'),
(9, 'Hospital Temenggung Seri Maharaja Tun Ibrahim', 'htsmti@pdn.gov.my', 'password123'),
(10, 'Hospital Permai', 'hpermai@pdn.gov.my', 'password123'),
(11, 'Hospital Sultanah Aminah', 'hsa@pdn.gov.my', 'password123'),
(12, 'Hospital Pasir Gudang', 'hpg@pdn.gov.my', 'password123'),
(13, 'Hospital Tuanku Fauziah', 'htf@pdn.gov.my', '$2y$10$v110zYWXwcziOIs7d2Y1TuWDa3RQAufkzWlgH4bP02ODQ8P8dF4m6'),
(14, 'Hospital Sultanah Bahiyah', 'hsb@pdn.gov.my', 'password123'),
(15, 'Hospital Sultan Abdul Halim', 'hsah@pdn.gov.my', 'password123'),
(16, 'Hospital Kulim', 'hkulim@pdn.gov.my', 'password123'),
(17, 'Hospital Baling', 'hbaling@pdn.gov.my', 'password123'),
(18, 'Hospital Sik', 'hsik@pdn.gov.my', 'password123'),
(19, 'Hospital Sultanah Maliha', 'hsm@pdn.gov.my', 'password123'),
(20, 'Hospital Yan', 'hyan@pdn.gov.my', 'password123'),
(21, 'Hospital Jitra', 'hjitra@pdn.gov.my', 'password123'),
(22, 'Hospital Kuala Nerang', 'hkn@pdn.gov.my', 'password123'),
(23, 'Hospital Alor Gajah', 'hag@pdn.gov.my', 'password123'),
(24, 'Hospital Jasin', 'hjasin@pdn.gov.my', 'password123'),
(25, 'Hospital Melaka', 'hmelaka@pdn.gov.my', 'password123'),
(26, 'Hospital Jelebu', 'hjelebu@pdn.gov.my', 'password123'),
(27, 'Hospital Jempol', 'hjempol@pdn.gov.my', 'password123'),
(28, 'Hospital Kuala Pilah', 'hkp@pdn.gov.my', 'password123'),
(29, 'Hospital Port Dickson', 'hpd@pdn.gov.my', 'password123'),
(30, 'Hospital Rembau', 'hrembau@pdn.gov.my', 'password123'),
(31, 'Hospital Seremban', 'hseremban@pdn.gov.my', 'password123'),
(32, 'Hospital Tampin', 'htampin@pdn.gov.my', 'password123'),
(33, 'Hospital Tuanku Jaafar', 'htj@pdn.gov.my', 'password123'),
(34, 'Hospital Tuanku Ampuan Najihah', 'htan@pdn.gov.my', 'password123'),
(35, 'Hospital Bukit Mertajam', 'hbm@pdn.gov.my', 'password123'),
(36, 'Hospital Kepala Batas', 'hkb@pdn.gov.my', 'password123'),
(37, 'Hospital Seberang Jaya', 'hsj@pdn.gov.my', 'password123'),
(38, 'Hospital Pulau Pinang', 'pp@pdn.gov.my', 'password123'),
(39, 'Hospital Balik Pulau', 'hbp@pdn.gov.my', 'password123'),
(40, 'Hospital Taiping', 'htaiping@pdn.gov.my', 'password123'),
(41, 'Hospital Teluk Intan', 'hti@pdn.gov.my', 'password123'),
(42, 'Hospital Tapah', 'htapah@pdn.gov.my', 'password123'),
(43, 'Hospital Seri Manjung', 'hsmanjung@pdn.gov.my', 'password123'),
(44, 'Hospital Tengku Ampuan Afzan', 'htaa@pdn.gov.my', 'password123'),
(45, 'Hospital Sultan Haji Ahmad Shah', 'hoshas@pdn.gov.my', 'password123'),
(46, 'Hospital Pekan', 'hpekan@pdn.gov.my', 'password123'),
(47, 'Hospital Bentong', 'hbentong@pdn.gov.my', 'password123'),
(48, 'Hospital Jerantut', 'hjerantut@pdn.gov.my', 'password123'),
(49, 'Hospital Kuala Lipis', 'hklipis@pdn.gov.my', 'password123'),
(50, 'Hospital Raub', 'hraub@pdn.gov.my', 'password123'),
(51, 'Hospital Rompin', 'hrompin@pdn.gov.my', 'password123'),
(52, 'Hospital Cameron Highlands', 'hcameron@pdn.gov.my', 'password123'),
(53, 'Hospital Raja Perempuan Zainab II', 'hrpz2@pdn.gov.my', 'password123'),
(54, 'Hospital Kuala Krai', 'hkkrai@pdn.gov.my', 'password123'),
(55, 'Hospital Tanah Merah', 'htmerah@pdn.gov.my', 'password123'),
(56, 'Hospital Pasir Mas', 'hpasirmas@pdn.gov.my', 'password123'),
(57, 'Hospital Machang', 'hmachang@pdn.gov.my', 'password123'),
(58, 'Hospital Jeli', 'hjeli@pdn.gov.my', 'password123'),
(59, 'Hospital Tumpat', 'htumpat@pdn.gov.my', 'password123'),
(60, 'Hospital Gua Musang', 'hgm@pdn.gov.my', 'password123'),
(61, 'Hospital Raja Permaisuri Bainun', 'hrpb@pdn.gov.my', 'password123'),
(62, 'Hospital Changkat Melintang', 'hchangkat@pdn.gov.my', 'password123'),
(63, 'Hospital Gerik', 'hgerik@pdn.gov.my', 'password123'),
(64, 'Hospital Parit Buntar', 'hpbuntar@pdn.gov.my', 'password123'),
(65, 'Hospital Bagan Serai', 'hbaganserai@pdn.gov.my', 'password123'),
(66, 'Hospital Kampar', 'hkampar@pdn.gov.my', 'password123'),
(67, 'Hospital Batu Gajah', 'hbatugajah@pdn.gov.my', 'password123'),
(68, 'Hospital Sungai Siput', 'hsgsiput@pdn.gov.my', 'password123'),
(69, 'Hospital Slim River', 'hslimriver@pdn.gov.my', 'password123'),
(70, 'Hospital Pendang', 'hpendang@pdn.gov.my', '$2y$10$v110zYWXwcziOIs7d2Y1TuWDa3RQAufkzWlgH4bP02O...'),
(71, 'Hospital Bachok', 'hbachok@pdn.gov.my', '$2y$10$v110zYWXwcziOIs7d2Y1TuWDa3RQAufkzWlgH4bP02O...'),
(72, 'Hospital Sultan Ismail Petra', 'hsip@pdn.gov.my', '$2y$10$v110zYWXwcziOIs7d2Y1TuWDa3RQAufkzWlgH4bP02O...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation_record`
--
ALTER TABLE `donation_record`
  ADD PRIMARY KEY (`donation_id`),
  ADD UNIQUE KEY `blood_serial_num` (`blood_serial_num`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`),
  ADD UNIQUE KEY `id_card_number` (`id_card_number`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_management`
--
ALTER TABLE `event_management`
  ADD KEY `event_id` (`event_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `hospital_admin`
--
ALTER TABLE `hospital_admin`
  ADD PRIMARY KEY (`hospital_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hospital_admin`
--
ALTER TABLE `hospital_admin`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation_record`
--
ALTER TABLE `donation_record`
  ADD CONSTRAINT `donation_record_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`),
  ADD CONSTRAINT `donation_record_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `event_management`
--
ALTER TABLE `event_management`
  ADD CONSTRAINT `event_management_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `event_management_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `hospital_admin` (`hospital_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
