-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 28 jan. 2022 à 07:51
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetpfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `encadrent`
--

CREATE TABLE `encadrent` (
  `id_encadrent` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `encadrent`
--

INSERT INTO `encadrent` (`id_encadrent`, `nom`, `prenom`) VALUES
(1, 'AHMED', 'RAHMONI'),
(2, 'ABDELTIF', 'GOUZZI'),
(3, 'OTHMANE', 'OUBELLA'),
(4, 'SAMIE', 'HAMOUCHE'),
(5, 'RACHID', 'BENBELLA'),
(6, 'AYMEN', 'BITI'),
(7, 'JEBBAR', 'NASSIMA'),
(8, 'ZINEB', 'LHOR'),
(9, 'ZAGOURA', 'AYA'),
(10, 'ELAMRANI', 'WIEAM'),
(11, 'MEKKAOUI', 'ZEHOR'),
(12, 'SALAH', 'KERCHAOUI');

-- --------------------------------------------------------

--
-- Structure de la table `enseignat`
--

CREATE TABLE `enseignat` (
  `id_ens` int(20) NOT NULL,
  `Prénom` varchar(60) NOT NULL,
  `Nom` varchar(60) NOT NULL,
  `adresse_mail` varchar(60) NOT NULL,
  `photo` varchar(60) NOT NULL,
  `Titre_sujet` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enseignat`
--

INSERT INTO `enseignat` (`id_ens`, `Prénom`, `Nom`, `adresse_mail`, `photo`, `Titre_sujet`, `password`) VALUES
(102, 'Ibrahim', ' BOUMAZZOU', 'ibrahim.boumazzou@uit.ac.ma', '', 'Stage Android', 'AZERTY'),
(103, 'Moulay Othman', ' ABOUTAFAIL', 'moulayothman.aboutafail@uit.ac.ma', '', '', 'AZERTY'),
(105, 'Hassan', ' MHARZI', 'h.mharzi@uit.ac.ma', '', '', 'aymane'),
(106, 'Driss', ' GRETETE', 'driss.gretete@uit.ac.ma', '106.jpeg', '', 'AZERTY'),
(107, 'Mostafa', ' MASLOUHI', 'mostafa.maslouhi@uit.ac.ma', '', '', 'AZERTY'),
(108, 'Abdellah', ' ABOUABDELLAH', 'abdellah.abouabdellah@uit.ac.ma', '', '', 'AZERTY'),
(109, 'Moulay Taib', ' BELGHITI', 'moulaytaib.belghiti@uit.ac.ma', '', '', 'AZERTY'),
(110, 'Habiba', ' CHAOUI', 'habiba.chaoui@uit.ac.ma', '', '', 'AZERTY'),
(111, 'Abdelmajid', ' ELOUADI', 'abdelmajid.elouadi@uit.ac.ma', '', '', 'AZERTY'),
(112, 'Norelislam', ' EL HAMI', 'norelislam.elhami@uit.ac.ma', '', '', 'AZERTY'),
(113, 'Youssef', ' BENTALEB', 'youssef.bentaleb@uit.ac.ma', '', '', 'AZERTY'),
(114, 'Khalid', ' CHOUGDALI', 'khalid.chougdali@uit.ac.ma', '', '', 'AZERTY'),
(115, 'Samir', ' BELFKIH', 'samir.belfkih@uit.ac.ma', '', '', 'AZERTY'),
(116, 'Ilham', ' OUMAIRA', 'ilham.oumaira@uit.ac.ma', '', '', 'AZERTY'),
(117, 'Aouatif', ' AMINE', 'aouatif.amine@uit.ac.ma', '', '', 'AZERTY'),
(118, 'Anas', ' BOUAYAD', 'anas.bouayad@uit.ac.ma', '', '', 'AZERTY'),
(119, 'Younes', ' EL BOUZEKRI EL IDRISSI', 'y.elbouzekri@uit.ac.ma', '', '', 'AZERTY'),
(120, 'Ayoub', ' AIT LAHCEN', 'ayoub.aitlahcen@uit.ac.ma', '', '', 'AZERTY'),
(121, 'Hanaa', ' HACHIMI', 'hanaa.hachimi@uit.ac.ma', '', '', 'AZERTY'),
(122, 'Rachid', ' BANNARI', 'rachid.bannari@uit.ac.ma', '', '', 'AZERTY'),
(123, 'Samira', ' MABTOUL', 'samira.mabtoul@uit.ac.ma', '', '', 'AZERTY'),
(124, 'Laila', ' EL ABBADI', 'laila.elabbadi@uit.ac.ma', '', '', 'AZERTY');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom`, `adresse`, `tel`, `ville`) VALUES
(1, 'ORANGE MAROC', 'RABAT-agdal', 534657482, 'RABAT'),
(2, 'MAROC TELECOM', 'CASABLANCA', 578657482, 'CASABLANCA'),
(3, 'Saham Finances', 'KENITRA', 543890482, 'KENITRA'),
(4, 'Office national de électricité et de eau potable', 'MEKNES', 534257492, 'MEKNES'),
(5, 'Groupe OCP', 'CASABLANCA', 578657111, 'CASABLANCA'),
(6, 'Saham Finances', 'KENITRA', 540950482, 'KENITRA');

-- --------------------------------------------------------

--
-- Structure de la table `etudient`
--

CREATE TABLE `etudient` (
  `id_etudiant` int(11) NOT NULL,
  `diplôme` varchar(50) NOT NULL,
  `apogee` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_ens` int(11) NOT NULL,
  `id_encadrent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudient`
--

INSERT INTO `etudient` (`id_etudiant`, `diplôme`, `apogee`, `nom`, `prenom`, `email`, `photo`, `password`, `id_ens`, `id_encadrent`) VALUES
(1, 'NDIGEDU', 18007992, 'EL MOUSSAOUI', 'HAIFAE', 'haifae.elmoussaoui@uit.ac.ma', 'SANS_IMAGE.jpeg', 'aymane', 0, NULL),
(2, 'NDIGEDU', 18010233, 'AIT ABBOU', 'HOUYAME', 'houyame.aitabbou@uit.ac.ma', '18010233.jpg', 'adam', 0, 3),
(3, 'NDIGEDU', 17006468, 'EL AAZAOUZI', 'IKRAM', 'ikram.elaazaouzi@uit.ac.ma', '', 'AZERTY', 106, 5),
(4, 'NDIGEDU', 18008029, 'KHATTABI', 'AMAL', 'amal.khattabi@uit.ac.ma', '', 'AZERTY', 107, 7),
(5, 'NDIGEDU', 17008796, 'NDIAYE', 'DIOR', 'dior.ndiaye@uit.ac.ma', '', 'AZERTY', 108, 9),
(6, 'NDIGEDU', 17007548, 'ZAOUI', 'MANAL', 'manal.zaoui@uit.ac.ma', '', 'AZERTY', 109, 11),
(7, 'NDIGEDU', 17006549, 'FENNIRI', 'JIHAN', 'jihan.fenniri@uit.ac.ma', '', 'AZERTY', 110, 1),
(8, 'NDIGEDU', 17006953, 'R GUIBI', 'CHAIMAA', 'chaimaa.rguibi@uit.ac.ma', '', 'AZERTY', 111, 3),
(9, 'NDIGEDU', 19009650, 'BOUOUZM', 'YASSINE', 'yassine.bououzm@uit.ac.ma', '', 'AZERTY', 112, 5),
(10, 'NDIGEDU', 19000010, 'OUKECHI', 'CHAIMAE', 'chaimae.oukechi@uit.ac.ma', '', 'AZERTY', 113, 7),
(11, 'NDIGEDU', 18008290, 'SADRAOUI', 'HIBAT ALLAH', 'hibatallah.sadraoui@uit.ac.ma', '', 'AZERTY', 102, 9),
(12, 'NDIGEDU', 19008634, 'LACHIA', 'SALMA', 'salma.lachia@uit.ac.ma', '', 'AZERTY', 103, 10),
(13, 'NDIGEDU', 19000078, 'SOUINIA', 'KELTOUM', 'keltoum.souinia@uit.ac.ma', '', 'AZERTY', 104, 11),
(14, 'NDIGEDU', 17007567, 'BOUTRIG', 'OUMNIA', 'oumnia.boutrig@uit.ac.ma', '', 'AZERTY', 105, 12),
(15, 'NDIGEDU', 18000037, 'EL HANI', 'MOHAMED ACHRAF', 'mohamedachraf.elhani@uit.ac.ma', '', 'AZERTY', 115, 1),
(16, 'NDIGEDU', 18009005, 'EL HAOUARI', 'FAHD', 'fahd.elhaouari@uit.ac.ma', '', 'AZERTY', 114, 2),
(17, 'NDIGEDU', 17006852, 'FRIKICH', 'RANIA', 'rania.frikich@uit.ac.ma', '', 'AZERTY', 116, 3),
(18, 'NDIGEDU', 18000218, 'LAFDALI', 'HAMZA', 'hamza.lafdali@uit.ac.ma', '', 'AZERTY', 117, 4),
(19, 'NDIGEDU', 18007854, 'OURAZZOUQ', 'FATIMA EZZAHRA', 'fatimaezzahra.ourazzouq@uit.ac.ma', '', 'AZERTY', 118, 5),
(20, 'NDIGEDU', 17006965, 'MAATI', 'KENZA', 'kenza.maati@uit.ac.ma', '', 'AZERTY', 119, 6),
(21, 'NDIGEDU', 18007933, 'SMINA', 'NOUHAILA', 'nouhaila.smina@uit.ac.ma', '', 'AZERTY', 120, 7),
(22, 'NDIGEDU', 18007936, 'ZOUHRI', 'FARAH', 'farah.zouhri@uit.ac.ma', '', 'AZERTY', 121, 8),
(23, 'NDIGEDU', 17004960, 'BENAYADA', 'OUSSAMA', 'oussama.benayada@uit.ac.ma', '', 'AZERTY', 0, 9),
(24, 'NDIGEDU', 19011104, 'BIROUK', 'NOURA', 'noura.birouk@uit.ac.ma', '', 'AZERTY', 0, 10),
(25, 'NDIGEDU', 17006335, 'EL GHALI', 'RANIA', 'rania.elghali@uit.ac.ma', '', 'AZERTY', 0, 11),
(26, 'NDIGEDU', 17004329, 'KANDIL', 'YAHIA', 'yahia.kandil@uit.ac.ma', '', 'AZERTY', 0, 12),
(27, 'NDIGEDU', 18007150, 'MASROUR', 'OUMAYMA', 'oumayma.masrour@uit.ac.ma', '', 'AZERTY', 0, 1),
(28, 'NDIGEDU', 19008627, 'KOURTAH', 'NADA', 'nada.kourtah@uit.ac.ma', '', 'AZERTY', 0, 2),
(29, 'NDIGEDU', 19011266, 'ZOUNGRANA YVES ALBAN', 'SOM-BE-WENDE', 'som-be-wende.zoungranayvesalban@uit.ac.ma', '', 'AZERTY', 0, 3),
(30, 'NDIGEDU', 19008604, 'MOUGTAHIDI', 'SALMA', 'salma.mougtahidi@uit.ac.ma', '', 'AZERTY', 0, 4),
(31, 'NDIGEDU', 19008679, 'EL AISSI', 'NOUHAILA', 'nouhaila.elaissi@uit.ac.ma', '', 'AZERTY', 0, 5),
(32, 'NDIGEDU', 19000036, 'OUARDI', 'IKHLASSE', 'ikhlasse.ouardi@uit.ac.ma', '', 'AZERTY', 0, 6),
(33, 'NDIGEDU', 19000186, 'LAGHDIRI', 'CHAIMAA', 'chaimaa.laghdiri@uit.ac.ma', '', 'AZERTY', 0, 7),
(34, 'NDIGEDU', 19011115, 'TIZIT', 'MOUAD', 'mouad.tizit@uit.ac.ma', '', 'AZERTY', 0, 8),
(35, 'NDIGEDU', 19000126, 'ETTAIEK', 'LAMYAE', 'lamyae.ettaiek@uit.ac.ma', '', 'AZERTY', 0, 9),
(36, 'NDIGEDU', 18009006, 'ESSAOUDI', 'FATIMA', 'fatima.essaoudi@uit.ac.ma', '', 'AZERTY', 0, 10),
(37, 'NDIGEDU', 21017808, 'GHALLOUDI', 'ADAM', 'adam.ghalloudi@uit.ac.ma', '', 'AZERTY', 0, 11),
(38, 'NDIGEDU', 21015880, 'ELOMARI', 'ZAKARIAE', 'zakariae.elomari@uit.ac.ma', '', 'AZERTY', 0, 12),
(39, 'NDIGEDU', 20006692, 'BOUAINE', 'OMAR', 'omar.bouaine@uit.ac.ma', '', 'AZERTY', 0, NULL),
(40, 'NDIGEDU', 18010142, 'PIBA', 'KOKO JEAN HUGUES', 'kokojeanhugues.piba@uit.ac.ma', '', 'AZERTY', 0, NULL),
(41, 'NDIGEDU', 17006732, 'RADI', 'HAJAR', 'hajar.radi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(42, 'NDIGEDU', 18006469, 'FETTOUKH', 'ACHRAF', 'achraf.fettoukh@uit.ac.ma', '', 'AZERTY', 0, NULL),
(43, 'NDIGEDU', 18000087, 'ZALLAFI', 'NADA', 'NADA.ZALLAFI@uit.ac.ma', '', 'AZERTY', 0, NULL),
(44, 'NDIGEDU', 19011053, 'CHIKANDO SINOU', 'EMILIE OLIVE', 'emilieolive.chikandosinou@uit.ac.ma', '', 'AZERTY', 0, NULL),
(45, 'NDIGEDU', 17007639, 'EL MESBAHI', 'AYA', 'aya.elmesbahi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(46, 'NDIGEDU', 20011375, 'KHADDAM', 'CHAIMAE', 'chaimae.khaddam@uit.ac.ma', '', 'AZERTY', 0, NULL),
(47, 'NDIGEDU', 19011064, 'EL HAMZAOUI', 'ABDERRAHIM', 'abderrahim.elhamzaoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(48, 'NDIGEDU', 19007468, 'RAKNI', 'MOHAMED ABDELBASSET', 'mohamedabdelbasset.rakni@uit.ac.ma', '', 'AZERTY', 0, NULL),
(49, 'NDIGEDU', 19000058, 'DRIAI', 'IMANE', 'imane.driai@uit.ac.ma', '', 'AZERTY', 0, NULL),
(50, 'NDIGEDU', 19000086, 'TAZI', 'HAMZA', 'hamza.tazi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(51, 'NDIGEDU', 19012018, 'JNIHA', 'IMANE', 'imane.jniha@uit.ac.ma', '', 'AZERTY', 0, NULL),
(52, 'NDIGEDU', 19008695, 'DRIOUICH', 'MOHAMMED', 'mohammed.driouich1@uit.ac.ma', '', 'AZERTY', 0, NULL),
(53, 'NDIGEDU', 18007012, 'BENGELOUNE', 'HIBA', 'hiba.bengeloune@uit.ac.ma', '', 'AZERTY', 0, NULL),
(54, 'NDIGEDU', 19000169, 'EL ABASSI', 'MALAK', 'malak.elabassi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(55, 'NDIGEDU', 19000095, 'QANNOUF', 'MUSTAPHA', 'mustapha.qannouf1@uit.ac.ma', '', 'AZERTY', 0, NULL),
(56, 'NDIGEDU', 19008684, 'SINAA', 'HAMZA', 'hamza.sinaa@uit.ac.ma', '', 'AZERTY', 0, NULL),
(57, 'NDIGEDU', 19008663, 'SAMIR', 'TAHA', 'taha.samir@uit.ac.ma', '', 'AZERTY', 0, NULL),
(58, 'NDIGEDU', 17004484, 'ALIOUA', 'SALIM', 'salim.alioua@uit.ac.ma', '', 'AZERTY', 0, NULL),
(59, 'NDIGEDU', 21011657, 'KENBOUCH', 'FATIMA', 'fatima.kenbouch@uit.ac.ma', '', 'AZERTY', 0, NULL),
(60, 'NDIGEDU', 21017206, 'BENAIDA', 'ZINEB', 'zineb.benaida@uit.ac.ma', '', 'AZERTY', 0, NULL),
(61, 'NDIGEDU', 16000360, 'AMARIR', 'ISMAIL', 'ismail.amarir@uit.ac.ma', '', 'AZERTY', 0, NULL),
(62, 'NDIGEDU', 20000844, 'BELHAJ', 'MAJDA', 'majda.belhaj1@uit.ac.ma', '', 'AZERTY', 0, NULL),
(63, 'NDIGEDU', 18000041, 'BENZIANE', 'DOUNIA', 'dounia.benziane@uit.ac.ma', '', 'AZERTY', 0, NULL),
(64, 'NDIGEDU', 18000187, 'EL HAJJI', 'LOUBNA', 'loubna.elhajji@uit.ac.ma', '', 'AZERTY', 0, NULL),
(65, 'NDIGEDU', 18009387, 'GHARBI', 'IHSSANE', 'ihssane.gharbi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(66, 'NDIGEDU', 19011034, 'ATAOUI', 'NIZAR', 'nizar.ataoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(67, 'NDIGEDU', 17008374, 'BARAKAT', 'ZINEB NOHAILA', 'zinebnohaila.barakat@uit.ac.ma', '', 'AZERTY', 0, NULL),
(68, 'NDIGEDU', 16003987, 'BENGHABRIT', 'MOHAMMED', 'mohammed.benghabrit@uit.ac.ma', '', 'AZERTY', 0, NULL),
(69, 'NDIGEDU', 19000244, 'BENSALIM', 'YOUSRA', 'yousra.bensalim@uit.ac.ma', '', 'AZERTY', 0, NULL),
(70, 'NDIGEDU', 17006986, 'ELAJAJE', 'MALAK', 'malak.elajaje@uit.ac.ma', '', 'AZERTY', 0, NULL),
(71, 'NDIGEDU', 17006654, 'HADIRI', 'SALOUA', 'saloua.hadiri@uit.ac.ma', '', 'AZERTY', 0, NULL),
(72, 'NDIGEDU', 16003897, 'HANSALA', 'SALMA', 'salma.hansala@uit.ac.ma', '', 'AZERTY', 0, NULL),
(73, 'NDIGEDU', 17006221, 'KRAIA', 'ZINEB', 'zineb.kraia@uit.ac.ma', '', 'AZERTY', 0, NULL),
(74, 'NDIGEDU', 16004865, 'LAMSAOURI', 'HAMZA', 'hamza.lamsaouri@uit.ac.ma', '', 'AZERTY', 0, NULL),
(75, 'NDIGEDU', 17006694, 'TADGHOUTI', 'NOUHAILA', 'nouhaila.tadghouti@uit.ac.ma', '', 'AZERTY', 0, NULL),
(76, 'NDIGEDU', 19000076, 'OUAHI', 'KHAOULA', 'khaoula.ouahi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(77, 'NDIGEDU', 18006321, 'ABOURRICHE', 'YOUNESS', 'youness.abourriche@uit.ac.ma', '', 'AZERTY', 0, NULL),
(78, 'NDIGEDU', 17004304, 'ALEM', 'AYOUB', 'ayoub.alem@uit.ac.ma', '', 'AZERTY', 0, NULL),
(79, 'NDIGEDU', 18009968, 'EL GHABI', 'SAFAE', 'safae.elghabi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(80, 'NDIGEDU', 17006800, 'JALAL', 'ACHRAF', 'achraf.jalal@uit.ac.ma', '', 'AZERTY', 0, NULL),
(81, 'NDIGEDU', 18000029, 'LAHLOU', 'HAJAR', 'hajar.lahlou@uit.ac.ma', '', 'AZERTY', 0, NULL),
(82, 'NDIGEDU', 18007916, 'STITOU', 'NARJIS', 'narjis.stitou@uit.ac.ma', '', 'AZERTY', 0, NULL),
(83, 'NDIGEDU', 18000163, 'ELMESSAOUDI', 'KHADIJA', 'KHADIJA.ELMESSAOUDI@uit.ac.ma', '', 'AZERTY', 0, NULL),
(84, 'NDIGEDU', 19002414, 'BAHAMMOU', 'TAHA', 'taha.bahammou@uit.ac.ma', '', 'AZERTY', 0, NULL),
(85, 'NDIGEDU', 17007007, 'BOUDAD', 'LATIFA', 'latifa.boudad@uit.ac.ma', '', 'AZERTY', 0, NULL),
(86, 'NDIGEDU', 19000243, 'CHABANA', 'HAMZA', 'hamza.chabana@uit.ac.ma', '', 'AZERTY', 0, NULL),
(87, 'NDIGEDU', 19011043, 'NOR', 'NAJLAE', 'najlae.nor@uit.ac.ma', '', 'AZERTY', 0, NULL),
(88, 'NDIGEDU', 17006833, 'SAHLI', 'OMAYMA', 'omayma.sahli@uit.ac.ma', '', 'AZERTY', 0, NULL),
(89, 'NDIGEDU', 19011142, 'BAHNIF', 'ILYAS', 'ilyas.bahnif@uit.ac.ma', '', 'AZERTY', 0, NULL),
(90, 'NDIGEDU', 19000081, 'SOFIANE', 'CHARAF EDDINE', 'charafeddine.sofiane@uit.ac.ma', '', 'AZERTY', 0, NULL),
(91, 'NDIGEDU', 19010973, 'RAIHANI', 'YOUSSRA', 'youssra.raihani@uit.ac.ma', '', 'AZERTY', 0, NULL),
(92, 'NDIGEDU', 19010827, 'SAIDNI', 'INASS', 'inass.saidni@uit.ac.ma', '', 'AZERTY', 0, NULL),
(93, 'NDIGEDU', 18000190, 'BENSSABAHIA', 'MANAL', 'manal.benssabahia@uit.ac.ma', '', 'AZERTY', 0, NULL),
(94, 'NDIGEDU', 19000080, 'GAIZI', 'HABIBA', 'habiba.gaizi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(95, 'NDIGEDU', 18006727, 'LAMZALZY', 'ABDELLAH', 'abdellah.lamzalzy@uit.ac.ma', '', 'AZERTY', 0, NULL),
(96, 'NDIGEDU', 21017629, 'ELASSRAOUI', 'HOUSSAM', 'houssam.elassraoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(97, 'NDIGEDU', 21015881, 'JEBBOUR', 'WIAM', 'wiam.jebbour@uit.ac.ma', '', 'AZERTY', 0, NULL),
(98, 'NDIGEDU', 21015885, 'AGHRAZ', 'OUARDA', 'ouarda.aghraz@uit.ac.ma', '', 'AZERTY', 0, NULL),
(99, 'NDIGEDU', 18006817, 'AGNAOU', 'MINA', 'mina.agnaou@uit.ac.ma', '', 'AZERTY', 0, NULL),
(100, 'NDIGEDU', 20000857, 'CHLAGUE', 'OUMAIMA', 'oumaima.chlague@uit.ac.ma', '', 'AZERTY', 0, NULL),
(101, 'NDIGEDU', 18000103, 'DAHBI', 'HOUDA', 'dahbi.houda@uit.ac.ma', '', 'AZERTY', 0, NULL),
(102, 'NDIGEDU', 18006452, 'EL HASSNAOUI', 'AOUS', 'aous.elhassnaoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(103, 'NDIGEDU', 18006364, 'BENDEFA', 'AHMED KHALIL', 'ahmedkhalil.bendefa@uit.ac.ma', '', 'AZERTY', 0, NULL),
(104, 'NDIGEDU', 20006852, 'CHTAIBI', 'FATIMA-EZZAHRAE', 'fatima-ezzahrae.chtaibi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(105, 'NDIGEDU', 18006385, 'ED-DARHRI', 'EL HASSAN', 'elhassan.eddarhri@uit.ac.ma', '', 'AZERTY', 0, NULL),
(106, 'NDIGEDU', 18006439, 'EL AMRANI', 'AYMAN', 'ayman.elamrani@uit.ac.ma', '', 'AZERTY', 0, NULL),
(107, 'NDIGEDU', 18000091, 'JIRRARI', 'DOHA', 'DOHA.JIRRARI@uit.ac.ma', '', 'AZERTY', 0, NULL),
(108, 'NDIGEDU', 18009590, 'MARRAKCHI', 'AHMED AYMEN', 'ahmedaymen.marrakchi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(109, 'NDIGEDU', 18000199, 'NAJOUI', 'MOHAMMED', 'mohammed.najoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(110, 'NDIGEDU', 18000197, 'NASRI', 'ANAS', 'anas.nasri@uit.ac.ma', '', 'AZERTY', 0, NULL),
(111, 'NDIGEDU', 17004061, 'SRAISAH', 'OUMAIMA', 'oumaima.sraisah@uit.ac.ma', '', 'AZERTY', 0, NULL),
(112, 'NDIGEDU', 17007004, 'OUBELKACEM', 'MANAL', 'manal.oubelkacem@uit.ac.ma', '', 'AZERTY', 0, NULL),
(113, 'NDIGEDU', 17007577, 'ABOULHASSANE', 'NIAMA', 'niama.aboulhassane@uit.ac.ma', '', 'AZERTY', 0, NULL),
(114, 'NDIGEDU', 16000109, 'AKIL', 'OMAR', 'omar.akil@uit.ac.ma', '', 'AZERTY', 0, NULL),
(115, 'NDIGEDU', 19000188, 'BENDEROUACH', 'KARIMA', 'karima.benderouach@uit.ac.ma', '', 'AZERTY', 0, NULL),
(116, 'NDIGEDU', 17005721, 'BENKIRANE', 'SOUKAINA', 'soukaina.benkirane@uit.ac.ma', '', 'AZERTY', 0, NULL),
(117, 'NDIGEDU', 17004680, 'BENNANI', 'YASSINE', 'yassine.bennani@uit.ac.ma', '', 'AZERTY', 0, NULL),
(118, 'NDIGEDU', 17006134, 'BENTASSIL', 'ZINEB', 'zineb.bentassil@uit.ac.ma', '', 'AZERTY', 0, NULL),
(119, 'NDIGEDU', 17004423, 'EL GHARBI', 'DOUAA', 'douaa.elgharbi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(120, 'NDIGEDU', 19011252, 'ZOETYANDE', 'NERKIETA NAFISSATOU', 'nerkietanafissatou.zoetyande@uit.ac.ma', '', 'AZERTY', 0, NULL),
(121, 'NDIGEDU', 19008618, 'ZENZOULI', 'IKRAM', 'ikram.zenzouli@uit.ac.ma', '', 'AZERTY', 0, NULL),
(122, 'NDIGEDU', 19007697, 'MOUSSAFI', 'AYOUB', 'ayoub.moussafi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(123, 'NDIGEDU', 19006950, 'RAFILI', 'SALMA', 'salma.rafili@uit.ac.ma', '', 'AZERTY', 0, NULL),
(124, 'NDIGEDU', 19000053, 'BENALI', 'MOUAD', 'mouad.benali1@uit.ac.ma', '', 'AZERTY', 0, NULL),
(125, 'NDIGEDU', 19000168, 'EL FAKER', 'LAMIAE', 'lamiae.elfaker@uit.ac.ma', '', 'AZERTY', 0, NULL),
(126, 'NDIGEDU', 19000066, 'MKADMI', 'OUMKALTOUM', 'oumkaltoum.mkadmi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(127, 'NDIGEDU', 18000212, 'ALLALOU', 'ABDELHAKIM', 'abdelhakim.allalou@uit.ac.ma', '', 'AZERTY', 0, NULL),
(128, 'NDIGEDU', 18010337, 'ATARRACHI', 'HALIMA', 'halima.atarrachi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(129, 'NDIGEDU', 19011086, 'CHEMRIH', 'YASSINE', 'yassine.chemrih@uit.ac.ma', '', 'AZERTY', 0, NULL),
(130, 'NDIGEDU', 18006305, 'LOUDINI', 'ABDELMALEK', 'abdelmalek.loudini@uit.ac.ma', '', 'AZERTY', 0, NULL),
(131, 'NDIGEDU', 21017126, 'ADRAOUI', 'ANAS', 'anas.adraoui1@uit.ac.ma', '', 'AZERTY', 0, NULL),
(132, 'NDIGEDU', 18010404, 'ELAZIZI', 'CHAIMAE', 'elazizi.chaimae@uit.ac.ma', '', 'AZERTY', 0, NULL),
(133, 'NDIGEDU', 18010332, 'AZZI', 'ALAA-EDDINE', 'alaaeddine.azzi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(134, 'NDIGEDU', 17005819, 'BENSAMDI', 'IMANE', 'imane.bensamdi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(135, 'NDIGEDU', 17006149, 'GHAZI', 'NERMINE', 'nermine.ghazi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(136, 'NDIGEDU', 19011200, 'BOUKHSSIBI', 'HIBA', 'hiba.boukhssibi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(137, 'NDIGEDU', 17006314, 'EL JAAOUANI', 'ZAHRA', 'zahra.eljaaouani@uit.ac.ma', '', 'AZERTY', 0, NULL),
(138, 'NDIGEDU', 17006970, 'MELHAOUI', 'RIHAB', 'rihab.melhaoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(139, 'NDIGEDU', 19011038, 'OUKHRID', 'AMAL', 'amal.oukhrid@uit.ac.ma', '', 'AZERTY', 0, NULL),
(140, 'NDIGEDU', 17006687, 'TAYMOULI', 'ICHRAQ', 'ichraq.taymouli@uit.ac.ma', '', 'AZERTY', 0, NULL),
(141, 'NDIGEDU', 17006870, 'TERFAS', 'CHAIMAE', 'chaimae.terfas@uit.ac.ma', '', 'AZERTY', 0, NULL),
(142, 'NDIGEDU', 15006663, 'ZIAT', 'OUSSAMA', 'oussama.ziat@uit.ac.ma', '', 'AZERTY', 0, NULL),
(143, 'NDIGEDU', 19011141, 'MZALI', 'SALMA', 'salma.mzali@uit.ac.ma', '', 'AZERTY', 0, NULL),
(144, 'NDIGEDU', 19010867, 'LAZHAR', 'NADA', 'nada.lazhar@uit.ac.ma', '', 'AZERTY', 0, NULL),
(145, 'NDIGEDU', 19000192, 'IDRI', 'KHAWLA', 'khawla.idri@uit.ac.ma', '', 'AZERTY', 0, NULL),
(146, 'NDIGEDU', 18009966, 'EL HAJJI', 'HASNAA', 'hasnaa.elhajji@uit.ac.ma', '', 'AZERTY', 0, NULL),
(147, 'NDIGEDU', 18007282, 'FAROUQ', 'SOMIA', 'somia.farouq@uit.ac.ma', '', 'AZERTY', 0, NULL),
(148, 'NDIGEDU', 18000168, 'MEZOIR', 'OUSSAMA', 'oussama.mezoir@uit.ac.ma', '', 'AZERTY', 0, NULL),
(149, 'NDIGEDU', 21015951, 'CHEGDANI', 'SARA', 'sara.chegdani@uit.ac.ma', '', 'AZERTY', 0, NULL),
(150, 'NDIGEDU', 17005812, 'BENADDI', 'OUAFAA', 'ouafaa.benaddi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(151, 'NDIGEDU', 17006955, 'BOUGATTAYA', 'SOUKAINA', 'soukaina.bougattaya@uit.ac.ma', '', 'AZERTY', 0, NULL),
(152, 'NDIGEDU', 18007311, 'HASSINA', 'YOUSRA', 'yousra.hassina@uit.ac.ma', '', 'AZERTY', 0, NULL),
(153, 'NDIGEDU', 17005194, 'MOUNTIJ', 'YASSER', 'yasser.mountij@uit.ac.ma', '', 'AZERTY', 0, NULL),
(154, 'NDIGEDU', 18000155, 'AQUIL', 'ASMAE', 'asmae.aquil@uit.ac.ma', '', 'AZERTY', 0, NULL),
(155, 'NDIGEDU', 17004998, 'LAHMAMI', 'AYOUB', 'ayoub.lahmami@uit.ac.ma', '', 'AZERTY', 0, NULL),
(156, 'NDIGEDU', 17005529, 'TABCHI', 'ISSAM', 'issam.tabchi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(157, 'NDIGEDU', 19011023, 'BOUHADDOU', 'MARWANE', 'marwane.bouhaddou@uit.ac.ma', '', 'AZERTY', 0, NULL),
(158, 'NDIGEDU', 19010961, 'MOUMNI', 'YAHYA', 'yahya.moumni@uit.ac.ma', '', 'AZERTY', 0, NULL),
(159, 'NDIGEDU', 19007233, 'EL FEKAK', 'SALMA', 'salma.elfekak@uit.ac.ma', '', 'AZERTY', 0, NULL),
(160, 'NDIGEDU', 19010041, 'SMINA', 'OUMAIMA', 'oumaima.smina@uit.ac.ma', '', 'AZERTY', 0, NULL),
(161, 'NDIGEDU', 19008652, 'BENKERROUM', 'MARWA', 'marwa.benkerroum@uit.ac.ma', '', 'AZERTY', 0, NULL),
(162, 'NDIGEDU', 19011119, 'ENAGRE', 'FATIMA ZAHRA', 'fatimazahra.enagre@uit.ac.ma', '', 'AZERTY', 0, NULL),
(163, 'NDIGEDU', 19000147, 'BOUTAHLI', 'BILAL', 'bilal.boutahli@uit.ac.ma', '', 'AZERTY', 0, NULL),
(164, 'NDIGEDU', 19000177, 'DAIBAZI', 'ASMAE', 'asmae.daibazi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(165, 'NDIGEDU', 18000161, 'OUETTAS', 'INTISSAR', 'INTISSAR.OUETTAS@uit.ac.ma', '', 'AZERTY', 0, NULL),
(166, 'NDIGEDU', 18005018, 'AMAL', 'AYOUB', 'ayoub.amal@uit.ac.ma', '', 'AZERTY', 0, NULL),
(167, 'NDIGEIN', 18008065, 'EL AZHARY', 'SOUKAINA', 'soukaina.elazhary@uit.ac.ma', '18008065.jpeg', 'AZERTY', 0, NULL),
(168, 'NDIGEIN', 18006355, 'BARGACH', 'HAMZA', 'hamza.bargach1@uit.ac.ma', '', 'AZERTY', 0, NULL),
(169, 'NDIGEIN', 18000194, 'BENSAID', 'MERYEM', 'MERYEM.BENSAID@uit.ac.ma', '', 'AZERTY', 0, NULL),
(170, 'NDIGEIN', 18000099, 'EL MRHARRAZ', 'SALMA', 'SALMA.ELMRHARRAZ@uit.ac.ma', '', 'AZERTY', 0, NULL),
(171, 'NDIGEIN', 18007427, 'ELAITARI', 'SOUKAINA', 'soukaina.elaitari@uit.ac.ma', '', 'AZERTY', 0, NULL),
(172, 'NDIGEIN', 18007055, 'JARJER', 'FATIMA', 'fatima.jarjer@uit.ac.ma', '', 'AZERTY', 0, NULL),
(173, 'NDIGEIN', 18009963, 'YAHYAOUI', 'ISMAIL', 'ismail.yahyaoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(174, 'NDIGEIN', 19000043, 'AGGOUR', 'SARAH', 'sarah.aggour@uit.ac.ma', '', 'AZERTY', 0, NULL),
(175, 'NDIGEIN', 18010603, 'ECH-CHOUQI', 'NADA', 'echchouqi.nada@uit.ac.ma', '', 'AZERTY', 0, NULL),
(176, 'NDIGEIN', 19000006, 'GUENDOULA', 'NOUR-EL HOUDA', 'nour-elhouda.guendoula@uit.ac.ma', '', 'AZERTY', 0, NULL),
(177, 'NDIGEIN', 19000099, 'IMANI', 'FADI', 'fadi.imani@uit.ac.ma', '', 'AZERTY', 0, NULL),
(178, 'NDIGEIN', 19000194, 'TOULALI', 'MERYEM', 'meryem.toulali@uit.ac.ma', '', 'AZERTY', 0, NULL),
(179, 'NDIGEIN', 19000097, 'KERCHAOUI', 'OMAR', 'omar.kerchaoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(180, 'NDIGEIN', 19008615, 'LARROUSSI', 'SARA', 'sara.larroussi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(181, 'NDIGEIN', 17006537, 'EL KHANFRI', 'HAJAR', 'hajar.elkhanfri@uit.ac.ma', '', 'AZERTY', 0, NULL),
(182, 'NDIGEIN', 17006518, 'ES SEBBANI', 'KAWTAR', 'kawtar.essebbani@uit.ac.ma', '', 'AZERTY', 0, NULL),
(183, 'NDIGEIN', 19011072, 'FOUKHAR', 'ILIASS', 'iliass.foukhar@uit.ac.ma', '', 'AZERTY', 0, NULL),
(184, 'NDIGEIN', 17005847, 'JARHNI', 'AMINE', 'amine.jarhni@uit.ac.ma', '', 'AZERTY', 0, NULL),
(185, 'NDIGEIN', 17003784, 'KERDOUD', 'MOUAD', 'mouad.kerdoud@uit.ac.ma', '', 'AZERTY', 0, NULL),
(186, 'NDIGEIN', 17006903, 'RHAZI', 'YASSINE', 'yassine.rhazi1@uit.ac.ma', '', 'AZERTY', 0, NULL),
(187, 'NDIGEIN', 17005468, 'SIDATE', 'EL MAHDI', 'elmahdi.sidate@uit.ac.ma', '', 'AZERTY', 0, NULL),
(188, 'NDIGEIN', 19011156, 'AIT EL KOUCH', 'ANASS', 'anass.aitelkouch@uit.ac.ma', '', 'AZERTY', 0, NULL),
(189, 'NDIGEIN', 16004719, 'ZEKRI', 'AMAL', 'amal.zekri@uit.ac.ma', '', 'AZERTY', 0, NULL),
(190, 'NDIGEIN', 18007996, 'ABOUZBIBA', 'WAFAE', 'wafae.abouzbiba@uit.ac.ma', '', 'AZERTY', 0, NULL),
(191, 'NDIGEIN', 19010618, 'BAHAMAD', 'IMANE', 'imane.bahamad@uit.ac.ma', '', 'AZERTY', 0, NULL),
(192, 'NDIGEIN', 20005731, 'BEKRINE', 'OUSSAMA', 'oussama.bekrine@uit.ac.ma', '', 'AZERTY', 0, NULL),
(193, 'NDIGEIN', 18006909, 'BOUTLANE', 'MERYEM', 'meryem.boutlane@uit.ac.ma', '', 'AZERTY', 0, NULL),
(194, 'NDIGEIN', 18000193, 'EL AMRANI', 'MANAL', 'MANAL.ELAMRANI1@uit.ac.ma', '', 'AZERTY', 0, NULL),
(195, 'NDIGEIN', 18000167, 'EL ATTAOUI', 'MOHAMED', 'mohamed.elattaoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(196, 'NDIGEIN', 18006816, 'MAZOUZI', 'SAAD', 'saad.mazouzi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(197, 'NDIGEIN', 18007869, 'OUMAMI', 'MARYAM', 'maryam.oumami@uit.ac.ma', '', 'AZERTY', 0, NULL),
(198, 'NDIGEIN', 20005505, 'SAFI', 'EL MEHDI', 'elmehdi.safi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(199, 'NDIGEIN', 16004931, 'TEBAA', 'MOHAMMED SAAD', 'mohammedsaad.tebaa@uit.ac.ma', '', 'AZERTY', 0, NULL),
(200, 'NDIGEIN', 18009404, 'VALL KHEIR', 'ZEINEBOU', 'zeinebou.vallkheir@uit.ac.ma', '', 'AZERTY', 0, NULL),
(201, 'NDIGEIN', 19000141, 'ABOUSAADIA', 'ANAS', 'anas.abousaadia@uit.ac.ma', '', 'AZERTY', 0, NULL),
(202, 'NDIGEIN', 19000170, 'EL OUAHHABY', 'CHAIMAE', 'chaimae.elouahhaby@uit.ac.ma', '', 'AZERTY', 0, NULL),
(203, 'NDIGEIN', 19000033, 'FAHIM', 'AHMED', 'ahmed.fahim@uit.ac.ma', '', 'AZERTY', 0, NULL),
(204, 'NDIGEIN', 19015220, 'DEKPE', 'KOSSI ELOLO BERNARD', 'kossielolobernard.dekpe@uit.ac.ma', '', 'AZERTY', 0, NULL),
(205, 'NDIGEIN', 19003672, 'ZIRARI', 'MOHAMED', 'mohamed.zirari@uit.ac.ma', '', 'AZERTY', 0, NULL),
(206, 'NDIGEIN', 18006997, 'BOUTAIB', 'MOHAMED', 'mohamed.boutaib@uit.ac.ma', '', 'AZERTY', 0, NULL),
(207, 'NDIGEIN', 18009494, 'BENJALLOUL', 'MONTASSIR', 'montassir.benjalloul1@uit.ac.ma', '', 'AZERTY', 0, NULL),
(208, 'NDIGEIN', 19007144, 'OUDADA', 'AYOUB', 'ayoub.oudada@uit.ac.ma', '', 'AZERTY', 0, NULL),
(209, 'NDIGEIN', 19000009, 'SOUKAINI', 'ADIL', 'adil.soukaini@uit.ac.ma', '', 'AZERTY', 0, NULL),
(210, 'NDIGEIN', 19000088, 'TAIB', 'HICHAM', 'hicham.taib@uit.ac.ma', '', 'AZERTY', 0, NULL),
(211, 'NDIGEIN', 19000035, 'ZNIBER', 'ALI', 'ali.zniber@uit.ac.ma', '', 'AZERTY', 0, NULL),
(212, 'NDIGEIN', 17005162, 'EL BADAOUI', 'OMAR', 'omar.elbadaoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(213, 'NDIGEIN', 17007831, 'EL MOUHTARIM', 'AYMANE', 'aymane.elmouhtarim@uit.ac.ma', '', 'AZERTY', 0, NULL),
(214, 'NDIGEIN', 17005436, 'FAIK', 'ABDELKHALEK', 'abdelkhalek.faik@uit.ac.ma', '', 'AZERTY', 0, NULL),
(215, 'NDIGEIN', 17005893, 'JEBBAR', 'ABDENNOUR', 'abdennour.jebbar@uit.ac.ma', '', 'AZERTY', 0, NULL),
(216, 'NDIGEIN', 17010439, 'LOGMO ADMEO', 'GOLVEN CALIN', 'golvencalin.logmoadmeo@uit.ac.ma', '', 'AZERTY', 0, NULL),
(217, 'NDIGEIN', 17006980, 'MOSSALLI', 'WIAM', 'wiam.mossalli@uit.ac.ma', '', 'AZERTY', 0, NULL),
(218, 'NDIGEIN', 18000158, 'AIT HMADOUCH', 'RANIA', 'RANIA.AITHMADOUCH@uit.ac.ma', '', 'AZERTY', 0, NULL),
(219, 'NDIGEIN', 18000045, 'AIT MANSOUR', 'ZINEB', 'ZINEB.AITMANSOUR@uit.ac.ma', '', 'AZERTY', 0, NULL),
(220, 'NDIGEIN', 18006791, 'AL OUARDI', 'SALMA', 'salma.alouardi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(221, 'NDIGEIN', 18000024, 'DDALLA', 'YOUSRA', 'YOUSRA.DDALLA@uit.ac.ma', '', 'AZERTY', 0, NULL),
(222, 'NDIGEIN', 18006294, 'EL GARAA', 'AYOUB', 'ayoub.elgaraa@uit.ac.ma', '', 'AZERTY', 0, NULL),
(223, 'NDIGEIN', 18000215, 'EL YOUSFI-ALAOUI', 'MOHAMMED', 'MOHAMMED.ELYOUSFI-ALAOUI@uit.ac.ma', '', 'AZERTY', 0, NULL),
(224, 'NDIGEIN', 18000203, 'FADILI', 'AYOUB', 'AYOUB.FADILI@uit.ac.ma', '', 'AZERTY', 0, NULL),
(225, 'NDIGEIN', 17007017, 'IFKIRNE', 'KENZA', 'kenza.ifkirne@uit.ac.ma', '', 'AZERTY', 0, NULL),
(226, 'NDIGEIN', 17000549, 'GOUMIDI', 'ABDERRAZZAK', 'abderrazzak.goumidi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(227, 'NDIGEIN', 20010521, 'SAHMI', 'IHSSAN', 'ihssan.sahmi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(228, 'NDIGEIN', 18000176, 'SARDI', 'IHSSANE', 'IHSSANE.SARDI@uit.ac.ma', '', 'AZERTY', 0, NULL),
(229, 'NDIGEIN', 19008672, 'BENASSER', 'HASSAN AYOUB', 'hassanayoub.benasser@uit.ac.ma', '', 'AZERTY', 0, NULL),
(230, 'NDIGEIN', 19000100, 'BENSAR', 'OUMAIMA', 'oumaima.bensar@uit.ac.ma', '', 'AZERTY', 0, NULL),
(231, 'NDIGEIN', 21015271, 'EL KHCHINE', 'MOHAMED', 'mohamed.elkhchine1@uit.ac.ma', '', 'AZERTY', 0, NULL),
(232, 'NDIGEIN', 21015929, 'HAMMADI', 'MASSINA', 'massina.hammadi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(233, 'NDIGEIN', 19000137, 'LAGHRISSI', 'MOHAMED', 'mohamed.laghrissi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(234, 'NDIGEIN', 19000182, 'LOUADNI', 'CHAIMAA', 'chaimaa.louadni@uit.ac.ma', '', 'AZERTY', 0, NULL),
(235, 'NDIGEIN', 19000077, 'LOUZAOUI', 'SAFAA', 'safaa.louzaoui@uit.ac.ma', '', 'AZERTY', 0, NULL),
(236, 'NDIGEIN', 19000063, 'OUGAAMOU', 'MEHDI', 'mehdi.mehdiougaamou@uit.ac.ma', '', 'AZERTY', 0, NULL),
(237, 'NDIGEIN', 21015770, 'ATIR', 'ZAYNAB', 'zaynab.atir@uit.ac.ma', '', 'AZERTY', 0, NULL),
(238, 'NDIGEIN', 17005778, 'BAKOUR', 'KAWTAR', 'kawtar.bakour@uit.ac.ma', '', 'AZERTY', 0, NULL),
(239, 'NDIGEIN', 17005831, 'JABAR', 'YOUNESS', 'youness.jabar@uit.ac.ma', '', 'AZERTY', 0, NULL),
(240, 'NDIGEIN', 16004718, 'LAMMARI', 'SAFOUANE', 'safouane.lammari@uit.ac.ma', '', 'AZERTY', 0, NULL),
(241, 'NDIGEIN', 18009449, 'M KHAITIR CHIEKH', 'MAMINA', 'mamina.mkhaitirchiekh@uit.ac.ma', '18009449.jpg', 'adam', 0, NULL),
(242, 'NDIGEIN', 21015938, 'AIT BELAID', 'IKRAM', 'ikram.aitbelaid@uit.ac.ma', '', 'AZERTY', 0, NULL),
(243, 'NDIGEIN', 20013993, 'BAKHIL', 'AISSA', 'aissa.bakhil@uit.ac.ma', '', 'AZERTY', 0, NULL),
(244, 'NDIGEIN', 18000146, 'ALAOUI', 'ABDELLAH', 'ABDELLAH.ALAOUI@uit.ac.ma', '', 'AZERTY', 0, NULL),
(245, 'NDIGEIN', 18009015, 'BERBACH', 'MALIK', 'malik.berbach@uit.ac.ma', '', 'AZERTY', 0, NULL),
(246, 'NDIGEIN', 18006400, 'ECHTOUKI', 'MOHAMED', 'mohamed.echtouki@uit.ac.ma', '', 'AZERTY', 0, NULL),
(247, 'NDIGEIN', 16000022, 'EL AASSALI', 'IMADEDDINE', 'imadeddine.elaassali@uit.ac.ma', '', 'AZERTY', 0, NULL),
(248, 'NDIGEIN', 18007102, 'EL HAJJI', 'MOUNA', 'mouna.elhajji@uit.ac.ma', '', 'AZERTY', 0, NULL),
(249, 'NDIGEIN', 18000062, 'ELHARTI', 'CHAYMAA', 'chaymaa.elharti@uit.ac.ma', '', 'AZERTY', 0, NULL),
(250, 'NDIGEIN', 18000104, 'ELKORRI', 'OUISSAL', 'OUISSAL.ELKORRI@uit.ac.ma', '', 'AZERTY', 0, NULL),
(251, 'NDIGEIN', 18006665, 'HANYF', 'OTHMANE', 'othmane.hanyf@uit.ac.ma', '', 'AZERTY', 0, NULL),
(252, 'NDIGEIN', 20005536, 'JEMMAL', 'SOUFIANE', 'soufiane.jemmal@uit.ac.ma', '', 'AZERTY', 0, NULL),
(253, 'NDIGEIN', 17004527, 'KADIMI', 'HAMZA', 'hamza.kadimi@uit.ac.ma', '', 'AZERTY', 0, NULL),
(254, 'NDIGEIN', 18009444, 'LAAMARTI', 'AKRAM', 'akram.laamarti@uit.ac.ma', '', 'AZERTY', 0, NULL),
(255, 'NDIGEIN', 17000543, 'LAKTAIBI', 'ANASS', 'anass.laktaibi@uit.ac.ma', '17000543.jpeg', 'AZERTY', 0, NULL),
(256, 'NDIGEIN', 18000184, 'OUJAA', 'YASSINE', 'yassine.oujaa@uit.ac.ma', '18000184.jpg', 'AZERTY', 0, 1),
(257, 'NDIGEIN', 18007937, 'TIBARI', 'ZINEB', 'zineb.tibari@uit.ac.ma', '', 'AZERTY', 0, 2),
(258, 'NDIGEIN', 18010184, 'TIOTSOP FOGUE', 'ADRIANO', 'adriano.tiotsopfogue@uit.ac.ma', '', 'AZERTY', 0, 4),
(259, 'NDIGEIN', 18000054, 'TLEMCANI', 'CHAYMA', 'CHAYMA.TLEMCANI@uit.ac.ma', '', 'AZERTY', 0, 6),
(260, 'NDIGEIN', 19000157, 'EL-OTHMANI', 'YOUSSEF', 'youssef.el-othmani@uit.ac.ma', '', 'AZERTY', 0, 8),
(261, 'NDIGEIN', 19000034, 'EL KAABA', 'MOHAMED AMINE', 'mohamedamine.elkaaba@uit.ac.ma', '', 'AZERTY', 0, 10),
(262, 'NDIGEIN', 19000151, 'BOUNASSEH', 'ABDESSAMAD', 'abdessamad.bounasseh@uit.ac.ma', '', 'AZERTY', 0, 12),
(263, 'NDIGEIN', 19000102, 'HMOUDAT', 'OUSSAMA', 'oussama.hmoudat@uit.ac.ma', '', 'AZERTY', 0, 2),
(264, 'NDIGEIN', 19000030, 'KABBA', 'AYMANE', 'aymane.kabba@uit.ac.ma', '', 'AZERTY', 0, 4),
(265, 'NDIGEIN', 19007217, 'ACHAOUI', 'YOUNES', 'younes.achaoui@uit.ac.ma', '', 'AZERTY', 0, 6),
(266, 'NDIGEIN', 21017281, 'MOUHAOUIR', 'HAMZA', 'hamza.mouhaouir@uit.ac.ma', '', 'AZERTY', 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `id_stage` int(20) NOT NULL,
  `nom_binome` varchar(60) NOT NULL,
  `prenom_binome` varchar(60) NOT NULL,
  `version1_rapp` varchar(60) NOT NULL,
  `version2_rapp` varchar(60) NOT NULL,
  `presentation` varchar(60) NOT NULL,
  `attestation_stage` varchar(60) NOT NULL,
  `fiche_evaluation` varchar(60) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `note` float NOT NULL,
  `id_ens` int(11) NOT NULL,
  `validation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`id_stage`, `nom_binome`, `prenom_binome`, `version1_rapp`, `version2_rapp`, `presentation`, `attestation_stage`, `fiche_evaluation`, `id_etudiant`, `note`, `id_ens`, `validation`) VALUES
(0, '', '', 'dxbgxnh.pdf', 'dxbgxnh.pdf', 'dxbgxnh.pdf', 'dxbgxnh.pdf', 'dxbgxnh.pdf', 167, 12, 0, 'valider'),
(0, '', '', 'dwbshbd.pdf', 'dwbshbd.pdf', 'dwbshbd.pdf', 'dwbshbd.pdf', 'dwbshbd.pdf', 167, 12, 0, 'valider'),
(1, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', 1, 12, 102, 'valider'),
(2, '', '', '.pdf', '.pdf', '.pdf', '.pdf', '.pdf', 1, 0, 103, ''),
(3, 'jebbar', 'nassima', 'rapp1.pdf', 'rapp2.pdf', 'prese.pdf', 'attest.pdf', 'fiche.pdf', 1, 0, 104, ''),
(4, 'biti', 'aymen', 'rapp13.pdf', 'rapp23.pdf', 'presee.pdf', 'atteste.pdf', 'fichee.pdf', 1, 12, 0, 'valider'),
(5, 'jebbar', 'nassima', 'rapp12.pdf', 'rapp22.pdf', 'preses.pdf', 'attesta.pdf', 'fiiche.pdf', 2, 12, 0, 'valider');

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `id_sujet` int(11) NOT NULL,
  `Intitulé_du_sujet` varchar(50) NOT NULL,
  `Description du sujet` varchar(50) NOT NULL,
  `id_encadrent` int(11) NOT NULL,
  `id_ens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`id_sujet`, `Intitulé_du_sujet`, `Description du sujet`, `id_encadrent`, `id_ens`) VALUES
(1, 'Stage Android', '', 12, 0),
(2, 'Stage Android', '', 10, 102),
(3, 'Stage Android', '', 6, 103),
(4, 'Stage DevOps', '', 4, 104),
(5, 'Stage machine learning', '', 7, 105),
(6, 'Stage C#', '', 11, 0),
(7, ' Stage Développement fullstack C#', '', 2, 0),
(8, 'Stage Android', '', 9, 0),
(9, 'Stage DevOps', '', 3, 0),
(10, 'Stage machine learning', '', 5, 0),
(11, 'Stage C#', '', 8, 0),
(12, ' Stage Développement fullstack C#', '', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `pass`) VALUES
(1, 'admin', 'azerty');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `encadrent`
--
ALTER TABLE `encadrent`
  ADD PRIMARY KEY (`id_encadrent`);

--
-- Index pour la table `enseignat`
--
ALTER TABLE `enseignat`
  ADD PRIMARY KEY (`id_ens`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- Index pour la table `etudient`
--
ALTER TABLE `etudient`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_ens` (`id_ens`),
  ADD KEY `id_encadrent` (`id_encadrent`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_ens` (`id_ens`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`id_sujet`),
  ADD KEY `id_encadrent` (`id_encadrent`),
  ADD KEY `id_ens` (`id_ens`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `encadrent`
--
ALTER TABLE `encadrent`
  MODIFY `id_encadrent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `enseignat`
--
ALTER TABLE `enseignat`
  MODIFY `id_ens` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `etudient`
--
ALTER TABLE `etudient`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `id_sujet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
