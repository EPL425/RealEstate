-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2015 at 10:49 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epl425db`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
`id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `forSale` bit(1) NOT NULL,
  `bedrooms` int(2) DEFAULT NULL,
  `price` double NOT NULL,
  `city` varchar(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `img` varchar(400) NOT NULL,
  `link` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `type`, `forSale`, `bedrooms`, `price`, `city`, `location`, `img`, `link`) VALUES
(1, 'Apartment-Flat', b'1', 3, 395000, 'Nicosia', 'Engomi', 'http://www.ktimatagora.com/media/property-images/3_bedrooms_apartment_flat_for_sale_in_thumb_32.jpg', 'http://www.ktimatagora.com/properties-for-sale/3-bedroom-apartment-flat-for-sale-in-engomi-2'),
(2, 'Apartment-Flat', b'1', 2, 170000, 'Limassol', 'Agia Fyla', 'http://www.ktimatagora.com/media/property-images/2_bedrooms_apartment_flat_for_sale_in_engomi_thumb_45.jpg', 'http://www.ktimatagora.com/properties-for-sale/2-bedroom-apartment-flat-for-sale-in-agia-fyla');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE IF NOT EXISTS `villages` (
  `Name` varchar(20) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `villagesfamagusta`
--

CREATE TABLE IF NOT EXISTS `villagesfamagusta` (
  `Name` varchar(50) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villagesfamagusta`
--

INSERT INTO `villagesfamagusta` (`Name`, `Latitude`, `Longitude`) VALUES
('Agia Napa', 34.9922836, 34.01401129999999),
('Agia Thekla', 34.9833117, 33.94072649999998),
('Agia Triada', 35.050154, 34.0195312),
('Avgorou', 35.035556, 33.839166999999975),
('Deryneia', 35.0586943, 33.958278300000075),
('Kapparis', 35.0602299, 34.0038443),
('Paralimni', 35.033333, 33.983333000000016),
('Pernera', 35.0324053, 34.03350980000005),
('Protaras', 35.015, 34.05416700000001),
('Sotira', 35.026667, 33.950278000000026),
('Vrysoules', 35.0719751, 33.88159010000004),
('Xylofagou', 34.975, 33.85166700000002);

-- --------------------------------------------------------

--
-- Table structure for table `villageslarnaca`
--

CREATE TABLE IF NOT EXISTS `villageslarnaca` (
  `Name` varchar(50) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villageslarnaca`
--

INSERT INTO `villageslarnaca` (`Name`, `Latitude`, `Longitude`) VALUES
('Agios Theodoros', 34.799722, 33.383888999999954),
('Alethriko', 34.859444, 33.49416700000006),
('Anafotia', 34.823889, 33.463611000000014),
('Aradippou', 34.952778, 33.59000000000003),
('Dhekelia', 34.9908532, 33.732214099999965),
('Dromolaxia', 34.883333, 33.58333300000004),
('Drosia', 34.9172235, 33.613642700000014),
('Kalavasos', 34.771944, 33.295833000000016),
('Kelia', 34.9833786, 33.621785),
('Kiti', 34.847222, 33.57194400000003),
('Kornos', 34.921667, 33.39555599999994),
('Krasa', 34.913091, 33.637989),
('Larnaca Centre', 34.917612, 33.631698),
('Lefkara', 34.870282, 33.30090730000006),
('Livadia', 34.949444, 33.63111100000003),
('Maroni', 34.757222, 33.35583299999996),
('Mazotos', 34.802222, 33.49000000000001),
('Meneou', 34.864722, 33.59055599999999),
('Mosfiloti', 34.951944, 33.424721999999974),
('Ormideia', 34.9925, 33.78027799999995),
('Oroklini', 34.982778, 33.65444400000001),
('Pervolia', 34.830833, 33.57833299999993),
('Pyla', 35.009574, 33.69588090000002),
('Skarinou', 34.821111, 33.35583299999996),
('Tersefanou', 34.854722, 33.546110999999996),
('Tochni', 34.780556, 33.32333300000005),
('Vavatsinia', 34.8925, 33.22888899999998),
('Xylotympou', 35.016667, 33.75),
('Zygi', 34.733333, 33.33333300000004);

-- --------------------------------------------------------

--
-- Table structure for table `villageslimassol`
--

CREATE TABLE IF NOT EXISTS `villageslimassol` (
  `Name` varchar(50) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villageslimassol`
--

INSERT INTO `villageslimassol` (`Name`, `Latitude`, `Longitude`) VALUES
('Agia Fyla', 34.7203043, 33.0198024),
('Agia Zoni', 34.7889528, 32.97795670000005),
('Agios Athanasios', 34.723194, 33.050763200000006),
('Agios Georgios', 34.8147778, 32.898328900000024),
('Agios Nikolaos', 34.860833, 32.753056000000015),
('Agios Tychonas Tourist', 34.7138693, 33.1497164),
('Agios Tychonas Village', 34.7232568, 33.1341717),
('Agros', 34.916667, 33.016666999999984),
('Akrotiri', 34.600833, 32.95499999999993),
('Amathus area', 34.6783254, 32.615500699999984),
('Apesia', 34.789722, 32.97805600000004),
('Arakapas', 34.844167, 33.112777999999935),
('Armenochori', 34.744444, 33.12916700000005),
('Asgata', 34.778611, 33.254722000000015),
('Columbia area', 34.6995, 33.01830410000002),
('Ekali', 34.7006473, 33.01557969999999),
('Enaerios', 34.684329, 33.06057),
('Episkopi', 34.670833, 32.90194399999996),
('Eptagoneia', 34.846944, 33.15750000000003),
('Erimi', 34.683333, 32.91666699999996),
('Fasoula', 34.761667, 33.02694399999996),
('Germasogeia Tourist Area', 34.6979132, 33.0957177),
('Germasogeia Village', 34.7207186, 33.0819526),
('Governor''s Beach', 34.7133855, 33.2672928),
('Kalogiroi Villas', 34.7124112, 33.1006372),
('Kapsalos', 34.6999554, 33.03156569999999),
('Kato Polemidia', 34.699444, 32.996943999999985),
('Kellaki', 34.816111, 33.15833299999997),
('Kolossi', 34.670833, 32.92916700000001),
('Lania', 34.824444, 32.920833000000016),
('Limassol Center', 34.687118, 33.05377520000002),
('Limnatis', 34.813056, 32.94944399999997),
('Linopetra', 34.7000067, 33.06623999999999),
('Louvaras', 34.8365842, 33.03809860000001),
('Mathikoloni', 34.775278, 33.04861099999994),
('Mesa Geitonia', 34.7035972, 33.04232030000003),
('Mesovounia Villas', 34.7147097, 33.0944252),
('Monagroulli', 34.747222, 33.21249999999998),
('Moni', 34.738333, 33.20111099999997),
('Moniatis', 34.868611, 32.89694399999996),
('Mouttagiaka', 34.721667, 33.102499999999964),
('Neapolis', 34.6901537, 33.06623999999999),
('Omonoia', 34.6670005, 33.0127645),
('Panthea', 34.7129038, 33.0431285),
('Paramytha', 34.7570284, 32.971934799999985),
('Parekklisia Tourist Area', 34.7113585, 33.1646777),
('Parekklisia village', 34.740012, 33.159839),
('Pera Pedi', 34.859444, 32.87611100000004),
('Pissouri', 34.666667, 32.700000000000045),
('Platres', 34.886944, 32.862777999999935),
('Polemidia Kato', 34.7013882, 32.9947645),
('Polemidia Pano ', 34.7100176, 32.9930699),
('Potamos Germasogeia', 34.6997318, 33.08734079999999),
('Pyrgos', 34.7411948, 33.18223),
('Sfalaggiotissa', 34.7149112, 33.0311256),
('Silikou', 34.832222, 32.88888900000006),
('Souni-Zanatzia', 34.7346481, 32.8918005),
('Trachoni', 34.658333, 32.961389000000054),
('Trimiklini', 34.846944, 32.911666999999966),
('Tsirio', 34.7009474, 33.022820300000035),
('Ypsonas', 34.683333, 32.950000000000045),
('Zakaki', 34.6564363, 33.002910499999984);

-- --------------------------------------------------------

--
-- Table structure for table `villagesnicosia`
--

CREATE TABLE IF NOT EXISTS `villagesnicosia` (
  `Name` varchar(50) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villagesnicosia`
--

INSERT INTO `villagesnicosia` (`Name`, `Latitude`, `Longitude`) VALUES
('Acropolis', 35.154902, 33.36684960000002),
('Agia Varvara', 34.995833, 33.368056000000024),
('Agioi Omologites', 35.1560969, 33.34721190000005),
('Agioi Trimithias', 35.11645, 33.2148286),
('Agios Andreas', 35.1742506, 33.3439283),
('Agios Dometios', 35.17519619999999, 33.32897330000003),
('Agios Epifanios Oreinis', 34.995278, 33.120000000000005),
('Agios Ioannis Malountas', 35.0660148, 33.1851268),
('Aglantzia', 35.14592, 33.390169000000014),
('Agrokipia', 35.044444, 33.15499999999997),
('Alampra', 34.991667, 33.39999999999998),
('Anageia', 35.072778, 33.25194399999998),
('Analiontas', 35.006667, 33.28972199999998),
('Anthoupoli', 35.1139513, 33.2896786),
('Archangelos', 35.1347198, 33.313537999999994),
('Astromeritis', 35.133333, 33.03333299999997),
('Dali', 35.021111, 33.42000000000007),
('Dasoupolis', 35.1434626, 33.36825210000006),
('Deftera', 35.083333, 33.28333299999997),
('Denia', 35.16628540000001, 33.145696300000054),
('Engomi', 35.163056, 33.31638900000007),
('Engomi - European University', 35.1595228, 33.33861920000004),
('Engomi - University of Nicosia', 35.166187, 33.315117),
('Ergates', 35.053611, 33.242778000000044),
('Evrichou', 35.0417503, 32.89374769999995),
('Geri', 35.106944, 33.42138899999998),
('Gourri', 34.957222, 33.15694400000007),
('Ilioupoli', 35.0701289, 33.3960504),
('Kaimakli', 35.189167, 33.38361099999997),
('Kallithea', 35.0752756, 33.3918365),
('Kalo Chorio Oreinis', 35.005875, 33.162976),
('Kampia', 35.006944, 33.25611100000003),
('Kapedes', 34.975556, 33.25388900000007),
('Klirou', 35.020278, 33.17750000000001),
('Kokkinotrimithia', 35.152778, 33.19990000000007),
('Lakatameia', 35.116667, 33.31666700000005),
('Latsia', 35.1, 33.36666700000001),
('Lykavitos', 35.1645181, 33.37526449999996),
('Lympia', 34.9882276, 33.46637899999996),
('Lythrodontas', 34.949722, 33.296110999999996),
('Makedonitissa', 35.15105690000001, 33.3121347),
('Mathiatis', 34.962778, 33.33611100000007),
('Nicosia Centre', 35.166667, 33.36666700000001),
('Nikitari', 35.0714704, 32.99305570000001),
('Nisou', 35.020556, 33.39111100000002),
('Paliometocho', 35.125278, 33.190556000000015),
('Palouriotissa', 35.1742143, 33.37947170000007),
('Pera Chorio', 35.011667, 33.39027799999997),
('Pera Oreinis', 35.0353105, 33.2553731),
('Psimolofou', 35.060556, 33.25999999999999),
('Pyrgos Tillirias', 35.1838999, 32.6852718),
('Sia', 34.954722, 33.389999999999986),
('Strovolos', 35.15, 33.33333300000004),
('Temvria', 35.028333, 32.89027799999997),
('Tseri', 35.066871, 33.31666100000007);

-- --------------------------------------------------------

--
-- Table structure for table `villagespaphos`
--

CREATE TABLE IF NOT EXISTS `villagespaphos` (
  `Name` varchar(50) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villagespaphos`
--

INSERT INTO `villagespaphos` (`Name`, `Latitude`, `Longitude`) VALUES
('Agia Marina Chrysochous', 35.1166175, 32.52313079999999),
('Agia Marinouda', 34.765094, 32.47785929999998),
('Akourdaleia', 34.9528192, 32.4500593),
('Akoursos', 34.886111, 32.42138899999998),
('Anarita', 34.739722, 32.53444400000001),
('Anavargos', 34.7933336, 32.445308299999965),
('Aphrodite Hills Golf Resort', 34.6816322, 32.6099479),
('Argaka', 35.06555600000001, 32.491111000000046),
('Armou', 34.799444, 32.478611),
('Chlorakas', 34.801111, 32.408611000000064),
('Choletria', 34.7625, 32.59972199999993),
('Choulou', 34.871111, 32.557500000000005),
('Coral Bay', 34.8630733, 32.36459489999993),
('Drouseia', 34.9632721, 32.39717100000007),
('Empa', 34.8, 32.41666699999996),
('Exo Vrisi', 34.7716404, 32.42372),
('Giolou', 34.923333, 32.47444399999995),
('Goudi', 34.99083299999999, 32.44111099999998),
('Inia', 34.955278, 32.393610999999964),
('Kallepeia', 34.845278, 32.50027799999998),
('Kamares', 34.846131, 32.435321),
('Kathikas', 34.916667, 32.424999999999955),
('Kato Pafos', 34.758916, 32.41557899999998),
('Kissonerga', 34.816667, 32.39999999999998),
('Koili', 34.86, 32.45499999999993),
('Koloni', 34.751389, 32.464166999999975),
('Konia', 34.78388899999999, 32.45833300000004),
('Kouklia Village', 34.6978, 32.591999999999985),
('Kritou Tera', 34.95567339999999, 32.4226582),
('Latsi', 35.0405881, 32.39433870000005),
('Letymvou', 34.855556, 32.51361099999997),
('Lysos', 34.995556, 32.51166699999999),
('Mandria', 34.715278, 32.53166699999997),
('Marathounta', 34.791667, 32.487221999999974),
('Mesa Chorio', 34.808889, 32.46111100000007),
('Mesogi', 34.815, 32.45527800000002),
('Moutallos', 34.7819864, 32.41699489999996),
('Neo Chorio', 35.0294631, 32.34476110000003),
('Pafos Centre', 34.7720133, 34.7720133),
('Peyia Village', 34.883333, 32.38333299999999),
('Polemi', 34.885278, 32.50972200000001),
('Polis Chrysochous', 35.033333, 32.43333299999995),
('Pomos', 35.1726931, 32.55223090000004),
('Prodromi', 35.0256206, 32.41557899999998),
('Psathi', 34.898611, 32.52999999999997),
('Sea Caves', 34.8855045, 32.33484279999993),
('Simou', 34.94138900000001, 32.504722000000015),
('Skoulli', 34.983333, 32.450000000000045),
('St George Peyia', 34.903654, 32.330323),
('Tala', 34.833333, 32.41666699999996),
('Timi', 34.732222, 32.51527799999997),
('Tombs Of the Kings', 34.7754652, 32.405667400000084),
('Tremithousa', 34.816944, 32.44694400000003),
('Tsada', 34.835556, 32.47472199999993),
('Universal Area', 34.7621384, 32.4320094),
('Venus Rock Golf Resort', 34.7038267, 32.6058344),
('Yeroskipou', 34.766667, 32.46666700000003),
('Yialia', 35.0982761, 32.5257363);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
 ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `villagesfamagusta`
--
ALTER TABLE `villagesfamagusta`
 ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `villageslarnaca`
--
ALTER TABLE `villageslarnaca`
 ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `villageslimassol`
--
ALTER TABLE `villageslimassol`
 ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `villagesnicosia`
--
ALTER TABLE `villagesnicosia`
 ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `villagespaphos`
--
ALTER TABLE `villagespaphos`
 ADD PRIMARY KEY (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
