-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Sep 2016 pada 06.56
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penilaian_sma_muhammadiyah_pleret`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
`id_absensi` int(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_pengajar` varchar(10) NOT NULL,
  `semester` varchar(1) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=376 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nis`, `id_pengajar`, `semester`, `tgl`, `keterangan`) VALUES
(366, '001', 'P0003', '1', '2016-09-08', 'izin'),
(367, '002', 'P0003', '1', '2016-09-08', 'hadir'),
(368, '003', 'P0003', '1', '2016-09-08', 'sakit'),
(369, '004', 'P0003', '1', '2016-09-08', 'hadir'),
(370, '005', 'P0003', '1', '2016-09-08', 'hadir'),
(371, '001', 'P0001', '1', '2016-09-08', 'izin'),
(372, '002', 'P0001', '1', '2016-09-08', 'hadir'),
(373, '003', 'P0001', '1', '2016-09-08', 'hadir'),
(374, '004', 'P0001', '1', '2016-09-08', 'hadir'),
(375, '005', 'P0001', '1', '2016-09-08', 'hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakurikuler`
--

CREATE TABLE IF NOT EXISTS `ekstrakurikuler` (
  `id_ekstrakurikuler` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id_ekstrakurikuler`, `nama`) VALUES
('E0001', 'Pembuatan Kreasi Aneka Souvenir'),
('E0002', 'Sablon'),
('E0003', 'Kewirausahaan'),
('E0004', 'Paduan Suara'),
('E0005', 'MC Bahasa Jawa'),
('E0006', 'Membaca Alqurâ€™an'),
('E0007', 'Olahraga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `username`, `password`) VALUES
('G0001', 'TIN MARTINI S.T', 'G0001', 'guru'),
('G0002', 'DALHARI', 'G0002', 'guru'),
('G0003', 'NUR KHOLIFAH', 'G0003', 'guru'),
('G0004', 'PRANTINI', 'G0004', 'guru'),
('G0005', 'SITI SUPRIHATIN', 'G0005', 'guru'),
('G0006', 'Siti Jazamah', 'G0006', 'guru'),
('G0007', 'Drs. H. Machsuni', 'G0007', 'guru'),
('G0008', 'Retno Miasih, S.Pd', 'G0008', 'guru'),
('G0009', 'Wagiyem', 'G0009', 'guru'),
('G0010', 'Sukarti, S.Pd', 'G0010', 'guru'),
('G0011', 'Hervitasari', 'G0011', 'guru'),
('G0012', 'Yunia Nurâ€™aini', 'G0012', 'guru'),
('G0013', 'Inti Hanggita', 'G0013', 'guru'),
('G0014', 'Sujimah, S.Pd', 'G0014', 'guru'),
('G0015', 'Tri Murtono Spd', 'G0015', 'guru'),
('G0016', 'Sunarni Spd.', 'G0016', 'guru'),
('G0017', 'Bambang Hr. Spd', 'G0017', 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
('K0001', 'X A'),
('K0002', 'X B'),
('K0003', 'XI A'),
('K0004', 'XI B'),
('K0005', 'XII A'),
('K0006', 'XII B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepsek`
--

CREATE TABLE IF NOT EXISTS `kepsek` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kepsek`
--

INSERT INTO `kepsek` (`nip`, `nama`, `alamat`) VALUES
('1964032999008', 'Dra. Tin Martini ST', 'bantul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `id_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `jurusan` varchar(4) NOT NULL,
  `tingkat` tinyint(4) NOT NULL,
  `kkm` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `nama_mapel`, `jurusan`, `tingkat`, `kkm`) VALUES
('M0001', 'Pendidikan Agama Islam', 'umum', 1, 70),
('M0002', 'Pendidikan Agama Islam', 'umum', 2, 70),
('M0003', 'Pendidikan Agama Islam', 'umum', 3, 70),
('M0004', 'Pend. Kewarganegaraan', 'umum', 1, 70),
('M0005', 'Pend. Kewarganegaraan', 'umum', 2, 70),
('M0006', 'Pend. Kewarganegaraan', 'umum', 3, 70),
('M0007', 'Bhs. Indonesia', 'umum', 1, 75),
('M0008', 'Bhs. Indonesia', 'umum', 2, 75),
('M0009', 'Bhs. Indonesia', 'umum', 3, 75),
('M0010', 'Bhs. Inggris', 'umum', 1, 75),
('M0011', 'Bhs. Inggris', 'umum', 2, 75),
('M0012', 'Bhs. Inggris', 'umum', 3, 75),
('M0013', 'Matematika', 'umum', 1, 70),
('M0014', 'Matematika', 'umum', 2, 70),
('M0015', 'Matematika', 'umum', 3, 70),
('M0016', 'Fisika', 'ipa', 2, 75),
('M0017', 'Fisika', 'ipa', 3, 75),
('M0018', 'Kimia', 'umum', 1, 70),
('M0019', 'Sejarah', 'ips', 1, 70),
('M0020', 'Biologi', 'ipa', 2, 75),
('M0021', 'Biologi', 'ipa', 3, 75),
('M0022', 'Geografi', 'ips', 2, 75),
('M0023', 'Ekonomi', 'ips', 2, 70),
('M0024', 'sosiologi', 'ips', 2, 70),
('M0025', 'Seni Budaya', 'umum', 1, 70),
('M0026', 'Penjaskes', 'umum', 1, 70),
('M0027', 'TIK', 'umum', 1, 70),
('M0028', 'Bhs. Arab', 'umum', 1, 70),
('M0029', 'Muatan Lokal', 'umum', 1, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`id_nilai` int(10) NOT NULL,
  `id_penilaian` int(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1193 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_penilaian`, `nis`, `nilai`) VALUES
(696, 1, '003', 80),
(697, 1, '005', 90),
(698, 1, '004', 70),
(699, 1, '001', 75),
(700, 1, '002', 80),
(701, 2, '003', 80),
(702, 2, '005', 75),
(703, 2, '004', 60),
(704, 2, '001', 90),
(705, 2, '002', 80),
(706, 3, '003', 70),
(707, 3, '005', 90),
(708, 3, '004', 75),
(709, 3, '001', 80),
(710, 3, '002', 75),
(711, 4, '003', 80),
(712, 4, '005', 90),
(713, 4, '004', 80),
(714, 4, '001', 75),
(715, 4, '002', 80),
(716, 5, '003', 80),
(717, 5, '005', 70),
(718, 5, '004', 75),
(719, 5, '001', 90),
(720, 5, '002', 70),
(721, 6, '003', 80),
(722, 6, '005', 90),
(723, 6, '004', 80),
(724, 6, '001', 70),
(725, 6, '002', 75),
(726, 7, '003', 80),
(727, 7, '005', 90),
(728, 7, '004', 90),
(729, 7, '001', 80),
(730, 7, '002', 85),
(731, 8, '003', 85),
(732, 8, '005', 90),
(733, 8, '004', 85),
(734, 8, '001', 80),
(735, 8, '002', 70),
(736, 9, '003', 90),
(737, 9, '005', 60),
(738, 9, '004', 70),
(739, 9, '001', 75),
(740, 9, '002', 75),
(741, 10, '003', 70),
(742, 10, '005', 80),
(743, 10, '004', 90),
(744, 10, '001', 80),
(745, 10, '002', 90),
(746, 11, '003', 80),
(747, 11, '005', 90),
(748, 11, '004', 90),
(749, 11, '001', 90),
(750, 11, '002', 90),
(751, 12, '003', 75),
(752, 12, '005', 70),
(753, 12, '004', 80),
(754, 12, '001', 80),
(755, 12, '002', 80),
(756, 13, '003', 70),
(757, 13, '005', 75),
(758, 13, '004', 80),
(759, 13, '001', 75),
(760, 13, '002', 80),
(761, 14, '003', 70),
(762, 14, '005', 75),
(763, 14, '004', 80),
(764, 14, '001', 90),
(765, 14, '002', 60),
(766, 15, '003', 70),
(767, 15, '005', 80),
(768, 15, '004', 70),
(769, 15, '001', 80),
(770, 15, '002', 90),
(771, 16, '003', 90),
(772, 16, '005', 80),
(773, 16, '004', 70),
(774, 16, '001', 70),
(775, 16, '002', 80),
(776, 17, '003', 60),
(777, 17, '005', 90),
(778, 17, '004', 80),
(779, 17, '001', 60),
(780, 17, '002', 80),
(781, 18, '003', 80),
(782, 18, '005', 90),
(783, 18, '004', 70),
(784, 18, '001', 90),
(785, 18, '002', 70),
(786, 19, '003', 70),
(787, 19, '005', 80),
(788, 19, '004', 90),
(789, 19, '001', 70),
(790, 19, '002', 90),
(791, 20, '003', 70),
(792, 20, '005', 80),
(793, 20, '004', 90),
(794, 20, '001', 80),
(795, 20, '002', 70),
(796, 21, '003', 70),
(797, 21, '005', 70),
(798, 21, '004', 70),
(799, 21, '001', 75),
(800, 21, '002', 80),
(801, 22, '003', 70),
(802, 22, '005', 80),
(803, 22, '004', 90),
(804, 22, '001', 95),
(805, 22, '002', 60),
(806, 23, '003', 90),
(807, 23, '005', 90),
(808, 23, '004', 80),
(809, 23, '001', 80),
(810, 23, '002', 65),
(811, 24, '003', 70),
(812, 24, '005', 70),
(813, 24, '004', 75),
(814, 24, '001', 90),
(815, 24, '002', 75),
(816, 25, '003', 70),
(817, 25, '005', 80),
(818, 25, '004', 70),
(819, 25, '001', 75),
(820, 25, '002', 70),
(821, 26, '003', 70),
(822, 26, '005', 90),
(823, 26, '004', 90),
(824, 26, '001', 90),
(825, 26, '002', 90),
(826, 27, '003', 80),
(827, 27, '005', 90),
(828, 27, '004', 90),
(829, 27, '001', 60),
(830, 27, '002', 80),
(831, 28, '003', 95),
(832, 28, '005', 90),
(833, 28, '004', 80),
(834, 28, '001', 80),
(835, 28, '002', 85),
(836, 29, '003', 70),
(837, 29, '005', 80),
(838, 29, '004', 70),
(839, 29, '001', 90),
(840, 29, '002', 75),
(841, 30, '003', 90),
(842, 30, '005', 80),
(843, 30, '004', 70),
(844, 30, '001', 90),
(845, 30, '002', 80),
(846, 31, '003', 70),
(847, 31, '005', 80),
(848, 31, '004', 70),
(849, 31, '001', 90),
(850, 31, '002', 70),
(851, 32, '003', 60),
(852, 32, '005', 75),
(853, 32, '004', 80),
(854, 32, '001', 80),
(855, 32, '002', 90),
(856, 33, '003', 70),
(857, 33, '005', 80),
(858, 33, '004', 70),
(859, 33, '001', 90),
(860, 33, '002', 60),
(861, 34, '003', 70),
(862, 34, '005', 75),
(863, 34, '004', 90),
(864, 34, '001', 70),
(865, 34, '002', 90),
(866, 35, '003', 70),
(867, 35, '005', 90),
(868, 35, '004', 80),
(869, 35, '001', 80),
(870, 35, '002', 90),
(871, 36, '003', 80),
(872, 36, '005', 80),
(873, 36, '004', 90),
(874, 36, '001', 90),
(875, 36, '002', 90),
(876, 37, '003', 60),
(877, 37, '005', 70),
(878, 37, '004', 75),
(879, 37, '001', 80),
(880, 37, '002', 90),
(881, 38, '003', 80),
(882, 38, '005', 90),
(883, 38, '004', 70),
(884, 38, '001', 60),
(885, 38, '002', 75),
(886, 39, '003', 70),
(887, 39, '005', 90),
(888, 39, '004', 70),
(889, 39, '001', 60),
(890, 39, '002', 90),
(891, 40, '003', 80),
(892, 40, '005', 90),
(893, 40, '004', 80),
(894, 40, '001', 90),
(895, 40, '002', 90),
(896, 41, '003', 80),
(897, 41, '005', 90),
(898, 41, '004', 80),
(899, 41, '001', 90),
(900, 41, '002', 90),
(901, 42, '003', 80),
(902, 42, '005', 90),
(903, 42, '004', 70),
(904, 42, '001', 90),
(905, 42, '002', 90),
(906, 43, '003', 70),
(907, 43, '005', 80),
(908, 43, '004', 80),
(909, 43, '001', 90),
(910, 43, '002', 80),
(911, 44, '003', 70),
(912, 44, '005', 80),
(913, 44, '004', 70),
(914, 44, '001', 90),
(915, 44, '002', 80),
(916, 45, '003', 70),
(917, 45, '005', 80),
(918, 45, '004', 70),
(919, 45, '001', 65),
(920, 45, '002', 70),
(921, 46, '003', 90),
(922, 46, '005', 80),
(923, 46, '004', 80),
(924, 46, '001', 90),
(925, 46, '002', 70),
(926, 47, '003', 75),
(927, 47, '005', 90),
(928, 47, '004', 95),
(929, 47, '001', 80),
(930, 47, '002', 85),
(931, 48, '003', 80),
(932, 48, '005', 90),
(933, 48, '004', 80),
(934, 48, '001', 75),
(935, 48, '002', 70),
(936, 49, '003', 80),
(937, 49, '005', 90),
(938, 49, '004', 90),
(939, 49, '001', 70),
(940, 49, '002', 75),
(941, 50, '003', 90),
(942, 50, '005', 80),
(943, 50, '004', 85),
(944, 50, '001', 90),
(945, 50, '002', 90),
(946, 51, '003', 70),
(947, 51, '005', 80),
(948, 51, '004', 85),
(949, 51, '001', 90),
(950, 51, '002', 95),
(951, 52, '003', 80),
(952, 52, '005', 70),
(953, 52, '004', 80),
(954, 52, '001', 60),
(955, 52, '002', 90),
(956, 53, '003', 70),
(957, 53, '005', 75),
(958, 53, '004', 80),
(959, 53, '001', 90),
(960, 53, '002', 95),
(961, 54, '003', 70),
(962, 54, '005', 80),
(963, 54, '004', 80),
(964, 54, '001', 90),
(965, 54, '002', 95),
(966, 55, '003', 70),
(967, 55, '005', 80),
(968, 55, '004', 90),
(969, 55, '001', 60),
(970, 55, '002', 65),
(971, 56, '003', 70),
(972, 56, '005', 75),
(973, 56, '004', 80),
(974, 56, '001', 90),
(975, 56, '002', 95),
(976, 57, '003', 80),
(977, 57, '005', 90),
(978, 57, '004', 70),
(979, 57, '001', 75),
(980, 57, '002', 90),
(981, 58, '003', 70),
(982, 58, '005', 70),
(983, 58, '004', 75),
(984, 58, '001', 75),
(985, 58, '002', 80),
(986, 59, '003', 80),
(987, 59, '005', 90),
(988, 59, '004', 80),
(989, 59, '001', 95),
(990, 59, '002', 80),
(991, 60, '003', 70),
(992, 60, '005', 75),
(993, 60, '004', 80),
(994, 60, '001', 85),
(995, 60, '002', 90),
(996, 61, '003', 90),
(997, 61, '005', 90),
(998, 61, '004', 80),
(999, 61, '001', 60),
(1000, 61, '002', 90),
(1001, 62, '003', 80),
(1002, 62, '005', 80),
(1003, 62, '004', 90),
(1004, 62, '001', 80),
(1005, 62, '002', 80),
(1006, 63, '003', 80),
(1007, 63, '005', 80),
(1008, 63, '004', 70),
(1009, 63, '001', 80),
(1010, 63, '002', 70),
(1011, 64, '003', 70),
(1012, 64, '005', 60),
(1013, 64, '004', 90),
(1014, 64, '001', 80),
(1015, 64, '002', 75),
(1016, 65, '003', 70),
(1017, 65, '005', 80),
(1018, 65, '004', 90),
(1019, 65, '001', 70),
(1020, 65, '002', 65),
(1021, 66, '003', 80),
(1022, 66, '005', 80),
(1023, 66, '004', 75),
(1024, 66, '001', 80),
(1025, 66, '002', 70),
(1026, 67, '003', 90),
(1027, 67, '005', 70),
(1028, 67, '004', 90),
(1029, 67, '001', 75),
(1030, 67, '002', 90),
(1031, 68, '003', 70),
(1032, 68, '005', 75),
(1033, 68, '004', 90),
(1034, 68, '001', 80),
(1035, 68, '002', 90),
(1036, 69, '003', 80),
(1037, 69, '005', 80),
(1038, 69, '004', 70),
(1039, 69, '001', 90),
(1040, 69, '002', 75),
(1041, 70, '003', 80),
(1042, 70, '005', 90),
(1043, 70, '004', 75),
(1044, 70, '001', 80),
(1045, 70, '002', 80),
(1046, 71, '003', 70),
(1047, 71, '005', 60),
(1048, 71, '004', 65),
(1049, 71, '001', 80),
(1050, 71, '002', 90),
(1051, 72, '003', 80),
(1052, 72, '005', 90),
(1053, 72, '004', 95),
(1054, 72, '001', 75),
(1055, 72, '002', 80),
(1056, 73, '003', 80),
(1057, 73, '005', 90),
(1058, 73, '004', 70),
(1059, 73, '001', 75),
(1060, 73, '002', 90),
(1061, 74, '003', 80),
(1062, 74, '005', 90),
(1063, 74, '004', 70),
(1064, 74, '001', 75),
(1065, 74, '002', 90),
(1066, 75, '003', 70),
(1067, 75, '005', 75),
(1068, 75, '004', 80),
(1069, 75, '001', 80),
(1070, 75, '002', 90),
(1071, 76, '003', 70),
(1072, 76, '005', 90),
(1073, 76, '004', 70),
(1074, 76, '001', 90),
(1075, 76, '002', 60),
(1076, 77, '003', 70),
(1077, 77, '005', 90),
(1078, 77, '004', 65),
(1079, 77, '001', 75),
(1080, 77, '002', 90),
(1081, 78, '003', 80),
(1082, 78, '005', 90),
(1083, 78, '004', 80),
(1084, 78, '001', 95),
(1085, 78, '002', 90),
(1086, 79, '003', 90),
(1087, 79, '005', 80),
(1088, 79, '004', 90),
(1089, 79, '001', 70),
(1090, 79, '002', 90),
(1091, 80, '003', 80),
(1092, 80, '005', 90),
(1093, 80, '004', 60),
(1094, 80, '001', 80),
(1095, 80, '002', 75),
(1096, 81, '006', 90),
(1097, 81, '010', 70),
(1098, 81, '008', 70),
(1099, 81, '007', 90),
(1100, 81, '009', 80),
(1101, 82, '003', 80),
(1102, 82, '005', 80),
(1103, 82, '004', 75),
(1104, 82, '001', 75),
(1105, 82, '002', 90),
(1106, 83, '003', 80),
(1107, 83, '005', 80),
(1108, 83, '004', 80),
(1109, 83, '001', 80),
(1110, 83, '002', 80),
(1111, 84, '003', 70),
(1112, 84, '005', 85),
(1113, 84, '004', 85),
(1114, 84, '001', 85),
(1115, 84, '002', 75),
(1116, 85, '003', 90),
(1117, 85, '005', 80),
(1118, 85, '004', 75),
(1119, 85, '001', 80),
(1120, 85, '002', 80),
(1121, 86, '003', 80),
(1122, 86, '005', 70),
(1123, 86, '004', 80),
(1124, 86, '001', 90),
(1125, 86, '002', 80),
(1126, 87, '003', 80),
(1127, 87, '005', 70),
(1128, 87, '004', 75),
(1129, 87, '001', 90),
(1130, 87, '002', 75),
(1131, 88, '003', 80),
(1132, 88, '005', 85),
(1133, 88, '004', 90),
(1134, 88, '001', 70),
(1135, 88, '002', 60),
(1136, 89, '003', 80),
(1137, 89, '005', 90),
(1138, 89, '004', 75),
(1139, 89, '001', 80),
(1140, 89, '002', 90),
(1141, 90, '003', 80),
(1142, 90, '005', 90),
(1143, 90, '004', 75),
(1144, 90, '001', 80),
(1145, 90, '002', 90),
(1146, 91, '003', 70),
(1147, 91, '005', 80),
(1148, 91, '004', 75),
(1149, 91, '001', 90),
(1150, 91, '002', 80),
(1151, 92, '003', 80),
(1152, 92, '005', 80),
(1153, 92, '004', 80),
(1154, 92, '001', 90),
(1155, 92, '002', 75),
(1156, 93, '003', 80),
(1157, 93, '005', 90),
(1158, 93, '004', 95),
(1159, 93, '001', 90),
(1160, 93, '002', 80),
(1161, 94, '003', 80),
(1162, 94, '005', 85),
(1163, 94, '004', 85),
(1164, 94, '001', 75),
(1165, 94, '002', 80),
(1166, 95, '003', 70),
(1167, 95, '005', 80),
(1168, 95, '004', 75),
(1169, 95, '001', 80),
(1170, 95, '002', 70),
(1171, 96, '003', 80),
(1172, 96, '005', 70),
(1173, 96, '004', 85),
(1174, 96, '001', 90),
(1175, 96, '002', 85),
(1176, 97, '003', 80),
(1177, 97, '005', 80),
(1178, 97, '004', 80),
(1179, 97, '001', 80),
(1180, 97, '002', 80),
(1181, 98, '003', 80),
(1182, 98, '005', 90),
(1183, 98, '004', 80),
(1184, 98, '001', 75),
(1185, 98, '002', 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE IF NOT EXISTS `pengajar` (
  `id_pengajar` varchar(10) NOT NULL,
  `id_guru` varchar(10) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `id_guru`, `id_mapel`, `id_kelas`) VALUES
('P0001', 'G0001', 'M0001', 'K0001'),
('P0002', 'G0001', 'M0002', 'K0003'),
('P0023', 'G0002', 'M0003', 'K0006'),
('P0003', 'G0002', 'M0004', 'K0001'),
('P0004', 'G0002', 'M0005', 'K0003'),
('P0005', 'G0003', 'M0007', 'K0001'),
('P0006', 'G0003', 'M0008', 'K0003'),
('P0007', 'G0004', 'M0010', 'K0001'),
('P0008', 'G0004', 'M0011', 'K0003'),
('P0009', 'G0005', 'M0013', 'K0001'),
('P0010', 'G0005', 'M0014', 'K0003'),
('P0011', 'G0006', 'M0016', 'K0001'),
('P0012', 'G0007', 'M0018', 'K0001'),
('P0013', 'G0008', 'M0019', 'K0001'),
('P0014', 'G0009', 'M0020', 'K0001'),
('P0015', 'G0010', 'M0022', 'K0001'),
('P0016', 'G0011', 'M0023', 'K0001'),
('P0017', 'G0012', 'M0024', 'K0001'),
('P0018', 'G0013', 'M0025', 'K0001'),
('P0019', 'G0014', 'M0026', 'K0001'),
('P0020', 'G0015', 'M0027', 'K0001'),
('P0021', 'G0016', 'M0028', 'K0001'),
('P0022', 'G0017', 'M0029', 'K0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
  `id_penilaian` int(10) NOT NULL,
  `id_pengajar` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `kkm` int(3) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `semester` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_pengajar`, `status`, `tgl`, `keterangan`, `kkm`, `kelas`, `semester`) VALUES
(1, 'P0001', 'Ulangan 1', '2016-09-08', 'Menjelaskan tanda-tanda beriman kepada M', 70, 'K0001', '1'),
(2, 'P0001', 'Ulangan 2', '2016-09-08', 'contoh-contoh perilaku beriman', 70, 'K0001', '1'),
(3, 'P0001', 'Ulangan 3', '2016-09-08', 'Mendiskusikan tentang pengertian beriman', 70, 'K0001', '1'),
(4, 'P0001', 'Tugas 1', '2016-09-08', 'beriman kepada Malaikat', 70, 'K0001', '1'),
(5, 'P0001', 'Tugas 2', '2016-09-08', 'Mendiskusikan ciri-ciri orang beriman', 70, 'K0001', '1'),
(6, 'P0001', 'Tugas 3', '2016-09-08', 'menjelaskan pengertian beriman', 70, 'K0001', '1'),
(7, 'P0001', 'UTS', '2016-09-08', 'ujian ganjil', 70, 'K0001', '1'),
(8, 'P0001', 'UAS', '2016-09-08', 'ujian genap', 70, 'K0001', '1'),
(9, 'P0001', 'Praktik', '2016-09-08', 'kepribadian', 70, 'K0001', '1'),
(10, 'P0001', 'Sikap', '2016-09-08', 'kepribadian', 70, 'K0001', '1'),
(11, 'P0001', 'Ulangan 1', '2016-09-08', 'membaca alquran', 70, 'K0001', '2'),
(12, 'P0001', 'Ulangan 2', '2016-09-08', 'manusia sebagai khalifah', 70, 'K0001', '2'),
(13, 'P0001', 'Ulangan 3', '2016-09-08', 'ikhlas beribadah', 70, 'K0001', '2'),
(14, 'P0001', 'Tugas 1', '2016-09-08', 'prilaku terpuji', 70, 'K0001', '2'),
(15, 'P0001', 'Tugas 2', '2016-09-08', 'hukum islam', 70, 'K0001', '2'),
(16, 'P0001', 'Tugas 3', '2016-09-08', 'keteladanan rosullulah', 70, 'K0001', '2'),
(17, 'P0001', 'UTS', '2016-09-08', 'ujian ganjil', 70, 'K0001', '2'),
(18, 'P0001', 'UAS', '2016-09-08', 'ujian genap', 70, 'K0001', '2'),
(19, 'P0001', 'Praktik', '2016-09-08', 'membaca alquran', 70, 'K0001', '2'),
(20, 'P0001', 'Sikap', '2016-09-08', 'kepribadian', 70, 'K0001', '2'),
(21, 'P0003', 'Ulangan 1', '2016-09-08', 'Kesatuan bangsa', 70, 'K0001', '1'),
(22, 'P0003', 'Ulangan 2', '2016-09-08', 'Hidup rukun dalam perbedaa', 70, 'K0001', '1'),
(23, 'P0003', 'Ulangan 3', '2016-09-08', 'Cinta lingkungan', 70, 'K0001', '1'),
(24, 'P0003', 'Tugas 1', '2016-09-08', 'hukum dan peraturan', 70, 'K0001', '1'),
(25, 'P0003', 'Tugas 2', '2016-09-08', 'Hak asasi manusia meliputi', 70, 'K0001', '1'),
(26, 'P0003', 'Tugas 3', '2016-09-08', 'Kebutuhan warga Negara meliputi', 70, 'K0001', '1'),
(27, 'P0003', 'UTS', '2016-09-08', 'Kebebasan berorganisasi', 70, 'K0001', '1'),
(28, 'P0003', 'UAS', '2016-09-08', 'Persamaan kedudukan warganegara', 70, 'K0001', '1'),
(29, 'P0003', 'Praktik', '2016-09-08', 'Konstitusi Negara', 70, 'K0001', '1'),
(30, 'P0003', 'Sikap', '2016-09-08', 'kepribadian', 70, 'K0001', '1'),
(31, 'P0003', 'Ulangan 1', '2016-09-08', 'Proklamasi kemerdekaan', 70, 'K0001', '2'),
(32, 'P0003', 'Ulangan 2', '2016-09-08', 'Hukum dan peradilan internasional', 70, 'K0001', '2'),
(33, 'P0003', 'Ulangan 3', '2016-09-08', 'Kebutuhan warga Negara', 70, 'K0001', '2'),
(34, 'P0003', 'Tugas 1', '2016-09-08', 'Menghargai keputusan', 70, 'K0001', '2'),
(35, 'P0003', 'Tugas 2', '2016-09-08', 'kedudukan warganegara', 70, 'K0001', '2'),
(36, 'P0003', 'Tugas 3', '2016-09-08', 'Pancasila', 70, 'K0001', '2'),
(37, 'P0003', 'UTS', '2016-09-08', 'ujian ganjil', 70, 'K0001', '2'),
(38, 'P0003', 'UAS', '2016-09-08', 'ujian genap', 70, 'K0001', '2'),
(39, 'P0003', 'Praktik', '2016-09-08', 'Proses perumusan Pancasila', 70, 'K0001', '2'),
(40, 'P0003', 'Sikap', '2016-09-08', 'kepribadian', 70, 'K0001', '2'),
(41, 'P0005', 'Ulangan 1', '2016-09-08', 'puisi', 75, 'K0001', '1'),
(42, 'P0005', 'Ulangan 2', '2016-09-08', 'cerpen', 75, 'K0001', '1'),
(43, 'P0005', 'Ulangan 3', '2016-09-08', 'Menentukan Ide Pokok Bacaan', 75, 'K0001', '1'),
(44, 'P0005', 'Tugas 1', '2016-09-08', 'Memahami Karakteristik Paragraf', 75, 'K0001', '1'),
(45, 'P0005', 'Tugas 2', '2016-09-08', 'Menentukan Unsur Intrinsik Suatu Cerita', 75, 'K0001', '1'),
(46, 'P0005', 'Tugas 3', '2016-09-08', 'Menentukan Ide Pokok Paragraf', 75, 'K0001', '1'),
(47, 'P0005', 'UTS', '2016-09-08', 'Menulis Hasil Observasi', 75, 'K0001', '1'),
(48, 'P0005', 'UAS', '2016-09-08', 'ujian genap', 75, 'K0001', '1'),
(49, 'P0005', 'Praktik', '2016-09-08', 'Menulis Gagasan', 75, 'K0001', '1'),
(50, 'P0005', 'Sikap', '2016-09-08', 'kepribadian', 75, 'K0001', '1'),
(51, 'P0005', 'Ulangan 1', '2016-09-08', 'Memperbaiki Pengucapan Kalimat', 75, 'K0001', '2'),
(52, 'P0005', 'Ulangan 2', '2016-09-08', 'Menceritakan Kembali Cerita Pendek', 75, 'K0001', '2'),
(53, 'P0005', 'Ulangan 3', '2016-09-08', 'Paragraf Naratif ', 75, 'K0001', '2'),
(54, 'P0005', 'Tugas 1', '2016-09-08', 'Membaca Puisi dengan Lafal', 75, 'K0001', '2'),
(55, 'P0005', 'Tugas 2', '2016-09-08', 'Unsur Ekstrinsik Suatu Cerita', 75, 'K0001', '2'),
(56, 'P0005', 'Tugas 3', '2016-09-08', ' Ide Pokok Teks Bacaan', 75, 'K0001', '2'),
(57, 'P0005', 'UTS', '2016-09-08', 'ujian ganjil', 75, 'K0001', '2'),
(58, 'P0005', 'UAS', '2016-09-08', 'Mengidentifikasi Ide Teks', 75, 'K0001', '2'),
(59, 'P0005', 'Praktik', '2016-09-08', 'Mengungkapkan Kembali Informasi Berita', 75, 'K0001', '2'),
(60, 'P0005', 'Sikap', '2016-09-08', 'kepribadian', 75, 'K0001', '2'),
(61, 'P0007', 'Ulangan 1', '2016-09-08', 'simple pasten', 75, 'K0001', '1'),
(62, 'P0007', 'Ulangan 2', '2016-09-08', 'Thanking', 75, 'K0001', '1'),
(63, 'P0007', 'Ulangan 3', '2016-09-08', 'Expressions', 75, 'K0001', '1'),
(64, 'P0007', 'Tugas 1', '2016-09-08', 'Responding to thank ', 75, 'K0001', '1'),
(65, 'P0007', 'Tugas 2', '2016-09-08', 'Thanking for directions', 75, 'K0001', '1'),
(66, 'P0007', 'Tugas 3', '2016-09-08', 'Thanking for gifts', 75, 'K0001', '1'),
(67, 'P0007', 'UTS', '2016-09-08', 'ujian ganjil', 75, 'K0001', '1'),
(68, 'P0007', 'UAS', '2016-09-08', 'ujian akhir', 75, 'K0001', '1'),
(69, 'P0007', 'Praktik', '2016-09-08', 'Thanking for favors', 75, 'K0001', '1'),
(70, 'P0007', 'Sikap', '2016-09-08', 'kepribadian', 75, 'K0001', '1'),
(71, 'P0007', 'Ulangan 1', '2016-09-08', 'Thanking for offers of help', 75, 'K0001', '2'),
(72, 'P0007', 'Ulangan 2', '2016-09-08', 'Thanking for expressions of sympathy', 75, 'K0001', '2'),
(73, 'P0007', 'Ulangan 3', '2016-09-08', 'Narrative Text', 75, 'K0001', '2'),
(74, 'P0007', 'Tugas 1', '2016-09-08', 'Generic Structure', 75, 'K0001', '2'),
(75, 'P0007', 'Tugas 2', '2016-09-08', 'Complimenting Someone', 75, 'K0001', '2'),
(76, 'P0007', 'Tugas 3', '2016-09-08', 'Complimenting someone', 75, 'K0001', '2'),
(77, 'P0007', 'UTS', '2016-09-08', 'ujian ganjil', 75, 'K0001', '2'),
(78, 'P0007', 'UAS', '2016-09-08', 'ujian genap', 75, 'K0001', '2'),
(79, 'P0007', 'Praktik', '2016-09-08', 'Congratulating', 75, 'K0001', '2'),
(80, 'P0007', 'Sikap', '2016-09-08', 'kepribadian', 75, 'K0001', '2'),
(81, 'P0004', 'Ulangan 1', '2016-09-08', '-', 70, 'K0003', '1'),
(82, 'P0009', 'Ulangan 1', '2016-09-09', 'geometri', 70, 'K0001', '1'),
(83, 'P0011', 'Ulangan 1', '2016-09-09', 'newton 2', 75, 'K0001', '1'),
(84, 'P0012', 'Ulangan 1', '2016-09-09', 'rerak perpindahan', 70, 'K0001', '1'),
(85, 'P0013', 'Ulangan 1', '2016-09-09', 'fosil', 70, 'K0001', '1'),
(86, 'P0014', 'Ulangan 1', '2016-09-09', 'okulasi tumbuhan', 75, 'K0001', '1'),
(87, 'P0015', 'Ulangan 1', '2016-09-09', 'grafitasi bumi', 75, 'K0001', '1'),
(88, 'P0015', 'Praktik', '2016-09-09', 'analisis', 75, 'K0001', '1'),
(89, 'P0016', 'Ulangan 1', '2016-09-09', 'hukum ekonomi', 70, 'K0001', '1'),
(90, 'P0016', 'Praktik', '2016-09-09', 'berdagang', 70, 'K0001', '1'),
(91, 'P0017', 'Ulangan 1', '2016-09-09', 'sosial budaya', 70, 'K0001', '1'),
(92, 'P0017', 'Sikap', '2016-09-09', '-', 70, 'K0001', '1'),
(93, 'P0018', 'Ulangan 1', '2016-09-09', '-', 70, 'K0001', '1'),
(94, 'P0018', 'Sikap', '2016-09-09', '-', 70, 'K0001', '1'),
(95, 'P0019', 'Ulangan 1', '2016-09-09', '-', 70, 'K0001', '1'),
(96, 'P0020', 'Ulangan 1', '2016-09-09', '-', 70, 'K0001', '1'),
(97, 'P0021', 'Ulangan 1', '2016-09-09', '-', 70, 'K0001', '1'),
(98, 'P0022', 'Ulangan 1', '2016-09-09', '-', 60, 'K0001', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_ekstrakurikuler`
--

CREATE TABLE IF NOT EXISTS `peserta_ekstrakurikuler` (
  `id_peserta_ekstrakurikuler` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_ekstrakurikuler` varchar(10) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `nilai` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta_ekstrakurikuler`
--

INSERT INTO `peserta_ekstrakurikuler` (`id_peserta_ekstrakurikuler`, `nis`, `id_ekstrakurikuler`, `kelas`, `nilai`) VALUES
('P0006', '002', 'E0001', '10', 'A'),
('P0007', '003', 'E0001', '10', 'B'),
('P0009', '004', 'E0003', '10', 'B'),
('P0012', '005', 'E0004', '10', 'A'),
('P0013', '004', 'E0006', '10', 'C'),
('P0014', '003', 'E0003', '10', 'C'),
('P0015', '005', 'E0001', '10', 'A'),
('P0016', '001', 'E0001', '10', 'A'),
('P0018', '002', 'E0006', '10', 'B'),
('P0019', '001', 'E0005', '10', 'B'),
('P0020', '006', 'E0004', '10', 'B'),
('P0021', '007', 'E0006', '10', 'A'),
('P0022', '008', 'E0005', '10', 'A'),
('P0023', '009', 'E0006', '10', 'A'),
('P0024', '010', 'E0003', '10', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `jurusan` varchar(5) DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `status_keluarga` varchar(20) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `nama_ayah` varchar(40) NOT NULL,
  `nama_ibu` varchar(40) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(30) NOT NULL,
  `password_siswa` varchar(32) NOT NULL,
  `password_ortu` varchar(32) NOT NULL,
  `tahun_ajaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `id_kelas`, `jurusan`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `no_telp`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `password_siswa`, `password_ortu`, `tahun_ajaran`) VALUES
('001', 'Riyan', 'K0003', 'ipa', 'bantul', '1993-02-02', 'Laki-laki', 'islam', 'anak kandung', '1', '  bantul  ', '0819374755', 'roni', 'semi', '  bantul', 'tani', 'tani  ', 'user', 'roni ', '2016/2017  '),
('002', 'widodo', 'K0001', 'umum', 'bantul', '1992-01-02', 'Laki-laki', 'kristen', 'anak kandung', '2', '   bantul   ', '08263643522', 'warno', 'peni', '   bantul', 'wiraswasta', 'tani   ', 'user', 'warno ', '2016/2017 '),
('003', 'amin', 'K0001', 'umum', 'bantul', '1992-08-10', 'Laki-laki', 'katolik', 'anak kandung', '3', ' bantul   ', '08636477448', 'giarno', 'wariem', ' bantul ', 'tani', 'tani ', 'user', 'giarno ', '2016/2017 '),
('004', 'Ridho', 'K0001', 'umum', 'sleman', '1994-07-04', 'Laki-laki', 'buddha', 'anak kandung', '3', ' bantul   ', '084924742342', 'muji', 'winarti', ' bantul ', 'tani', 'tani ', 'user', 'muji ', '2016/2017 '),
('005', 'Darnis', 'K0001', 'umum', 'bantul', '1993-05-03', 'Laki-laki', 'hindu', 'anak kandung', '2', 'bantul  ', '081927372323', 'takat', 'tugiyem', 'sleman ', 'tani', 'tani', 'user', 'takat', '2016/2017'),
('006', 'Frianda Julianto', 'K0003', 'ipa', 'bantul', '1993-12-07', 'Laki-laki', 'islam', 'anak kandung', '2', ' bantul   ', '082566667788', 'roni', 'tiwi', ' bantul ', 'tani', 'tani ', 'user', 'roni ', '2016/2017 '),
('007', 'Reni', 'K0003', 'ipa', 'bantul', '1993-07-06', 'Perempuan', 'islam', 'anak kandung', '2', 'bantul  ', '0867888909', 'surep', 'pinah', 'bantul ', 'tani', 'tani', 'user', 'surep', '2016/2017'),
('008', 'Lusi Alfanita', 'K0003', 'ipa', 'bantul', '1993-08-03', 'Perempuan', 'islam', 'anak kandung', '1', 'bantul  ', '08192773333', 'darto', 'susi', 'bantul ', 'tani', 'tani', 'user', 'darto', '2016/2017'),
('009', 'Seftina Dewi', 'K0003', 'ipa', 'bantul', '1994-07-12', 'Perempuan', 'islam', 'anak kandung', '1', 'bantul', '0819374755', 'bambang', 'dewi', 'bantul', 'PNS', 'PNS', 'tani', 'bambang', '2015/2017'),
('010', 'Jeri', 'K0003', 'ipa', 'bantul', '1992-02-07', 'Laki-laki', 'islam', 'anak kandung', '2', 'bantul', '081927372323', 'tono', 'ririn', 'sleman', 'tani', 'tani', 'user', 'tono', '2015/2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `tahun_ajaran` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`tahun_ajaran`, `nis`, `id_kelas`) VALUES
('2017/2018', '001', 'K0003'),
('2018/2019', '001', 'K0001'),
('2017/2018', '005', 'K0001'),
('2018/2019', '001', 'K0003'),
('2017/1018', '002', 'K0003'),
('2017/2018', '003', 'K0003'),
('2017/2018', '004', 'K0004'),
('2017/2018', '006', 'K0006'),
('2017/2018', '001', 'K0003'),
('2017/2018', '001', 'K0003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tata_usaha`
--

CREATE TABLE IF NOT EXISTS `tata_usaha` (
  `id_tatausaha` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tata_usaha`
--

INSERT INTO `tata_usaha` (`id_tatausaha`, `nama`, `jabatan`, `alamat`, `username`, `password`) VALUES
('K0005 ', 'reza', 'Ketua', 'bantul  ', 'admin  ', 'reza'),
('K0006 ', 'iwan', 'bendahara', 'kanggotan', 'admin', 'iwan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE IF NOT EXISTS `wali_kelas` (
  `id_walikelas` varchar(10) NOT NULL,
  `id_guru` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_walikelas`, `id_guru`, `id_kelas`) VALUES
('W0001', 'G0002', 'K0001'),
('W0002', 'G0003', 'K0003'),
('W0003', 'G0004', 'K0006');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
 ADD PRIMARY KEY (`id_absensi`), ADD KEY `nis` (`nis`), ADD KEY `id_guru` (`id_pengajar`);

--
-- Indexes for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
 ADD PRIMARY KEY (`id_ekstrakurikuler`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kepsek`
--
ALTER TABLE `kepsek`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
 ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id_nilai`), ADD KEY `id_penilaian` (`id_penilaian`,`nis`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
 ADD PRIMARY KEY (`id_pengajar`), ADD KEY `id_guru` (`id_guru`,`id_mapel`,`id_kelas`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
 ADD PRIMARY KEY (`id_penilaian`), ADD KEY `id_pengajar` (`id_pengajar`,`kelas`);

--
-- Indexes for table `peserta_ekstrakurikuler`
--
ALTER TABLE `peserta_ekstrakurikuler`
 ADD PRIMARY KEY (`id_peserta_ekstrakurikuler`), ADD KEY `nis` (`nis`,`id_ekstrakurikuler`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`nis`), ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tata_usaha`
--
ALTER TABLE `tata_usaha`
 ADD PRIMARY KEY (`id_tatausaha`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
 ADD PRIMARY KEY (`id_walikelas`), ADD KEY `id_guru` (`id_guru`,`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=376;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1193;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
