-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 28 déc. 2020 à 16:28
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_assoc`
--

-- --------------------------------------------------------

--
-- Structure de la table `assoc_users`
--

DROP TABLE IF EXISTS `assoc_users`;
CREATE TABLE IF NOT EXISTS `assoc_users` (
  `idUser` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `password` text,
  `isVolunteer` varchar(255) DEFAULT NULL,
  `emailAdress` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assoc_users`
--

INSERT INTO `assoc_users` (`idUser`, `firstName`, `lastName`, `phoneNumber`, `password`, `isVolunteer`, `emailAdress`) VALUES
(1, 'Abdul', 'Baxter', '06 90 04 96 49', 'aliquam', 'True', 'neque@interdum.ca'),
(2, 'Xander', 'Cote', '02 31 00 28 21', 'In', 'False', 'a.auctor.non@Donec.ca'),
(3, 'Ralph', 'Mercer', '05 98 07 44 66', 'lobortis.', 'False', 'Etiam.laoreet@tincidunt.ca'),
(4, 'Yen', 'Gilmore', '08 17 50 72 48', 'orci.', 'True', 'facilisis.Suspendisse@Morbiaccumsan.edu'),
(5, 'Nero', 'Fuller', '07 41 62 22 96', 'Cum', 'False', 'tempus.mauris.erat@nisi.org'),
(6, 'Penelope', 'Bradshaw', '07 92 76 40 48', 'Integer', 'True', 'et.rutrum@mi.com'),
(7, 'Tallulah', 'Fernandez', '03 10 74 64 81', 'in,', 'True', 'ultricies@hendreritDonec.com'),
(8, 'Ezekiel', 'Collier', '01 61 80 11 23', 'Morbi', 'False', 'tristique@metus.net'),
(9, 'Sasha', 'Merrill', '07 06 89 53 33', 'Donec', 'True', 'consectetuer.adipiscing.elit@cursusaenim.net'),
(10, 'Uriel', 'Byrd', '08 06 92 68 77', 'vel', 'False', 'Nunc.pulvinar@Morbi.net'),
(11, 'Eliana', 'West', '03 01 88 90 37', 'Nulla', 'True', 'tempus.non@Nullamsuscipit.co.uk'),
(12, 'Oren', 'Frazier', '08 26 24 39 07', 'commodo', 'True', 'magna@aliquameu.com'),
(13, 'Judith', 'Wiggins', '01 81 80 28 14', 'rhoncus', 'True', 'fermentum@lacusNullatincidunt.co.uk'),
(14, 'Stacey', 'Leon', '04 55 26 29 09', 'Aenean', 'True', 'egestas.Aliquam@Fuscefermentum.org'),
(15, 'Kirsten', 'Sharp', '07 16 38 53 51', 'diam', 'True', 'amet.risus.Donec@est.net'),
(16, 'Belle', 'Cummings', '03 92 49 23 33', 'porttitor', 'False', 'non@semegetmassa.ca'),
(17, 'Dieter', 'Obrien', '06 72 30 45 64', 'tempor', 'True', 'arcu.ac.orci@nonummy.co.uk'),
(18, 'Florence', 'Merrill', '09 31 97 17 28', 'dapibus', 'True', 'eleifend@Pellentesquetincidunttempus.edu'),
(19, 'Thane', 'Moore', '05 62 43 34 09', 'velit.', 'False', 'eleifend@Cras.ca'),
(20, 'Meredith', 'Sweet', '05 43 76 36 12', 'eleifend,', 'True', 'molestie@metusAenean.com'),
(21, 'Shea', 'Decker', '02 40 48 46 60', 'in', 'False', 'ac@Namconsequatdolor.ca'),
(22, 'Desirae', 'Mcgee', '04 29 25 23 42', 'et', 'False', 'lacus.Nulla.tincidunt@enimmitempor.edu'),
(23, 'Jessamine', 'Ferrell', '01 21 96 95 48', 'Quisque', 'True', 'sem@malesuadautsem.com'),
(24, 'Galena', 'Benson', '01 02 36 55 34', 'vitae', 'False', 'Morbi.metus.Vivamus@ligula.com'),
(25, 'Kenyon', 'Quinn', '01 26 37 32 16', 'facilisis', 'False', 'mi@Nuncsedorci.com'),
(26, 'Eric', 'Garrett', '04 52 43 47 70', 'cursus', 'True', 'vehicula.et.rutrum@eutellusPhasellus.net'),
(27, 'Phillip', 'Kelley', '09 48 34 43 05', 'enim.', 'True', 'enim@pedenonummyut.org'),
(28, 'Madeson', 'Dale', '08 79 10 27 63', 'quis,', 'False', 'Integer@quismassaMauris.org'),
(29, 'Amaya', 'Hoover', '05 53 53 50 23', 'vitae', 'True', 'lacus.Nulla@nisimagna.edu'),
(30, 'Miranda', 'Neal', '02 78 61 73 71', 'Cras', 'False', 'iaculis.nec@felispurusac.org'),
(31, 'Stacey', 'Knight', '05 49 80 70 71', 'Nam', 'False', 'ipsum.non@consectetuerrhoncusNullam.org'),
(32, 'Hyacinth', 'Peters', '09 81 23 55 39', 'at', 'True', 'vitae@necmetusfacilisis.org'),
(33, 'Kellie', 'Stone', '05 74 78 38 26', 'lorem', 'True', 'amet.lorem@ipsum.co.uk'),
(34, 'Carter', 'Dunlap', '04 29 08 23 67', 'diam', 'True', 'Aenean.eget.magna@aneque.org'),
(35, 'Ivy', 'James', '01 83 70 83 43', 'In', 'True', 'aliquet.lobortis.nisi@urna.edu'),
(36, 'Cassidy', 'Medina', '04 14 00 67 75', 'at', 'False', 'nulla.Donec@Aeneaneget.org'),
(37, 'Heidi', 'Garner', '04 51 67 08 43', 'vitae', 'True', 'a.arcu.Sed@nunc.edu'),
(38, 'Claire', 'Ayala', '01 12 74 23 69', 'posuere,', 'True', 'eu@pedesagittisaugue.com'),
(39, 'Blake', 'Gomez', '04 80 40 56 09', 'vel', 'True', 'urna.Ut.tincidunt@feugiatmetussit.net'),
(40, 'Angelica', 'Joyner', '03 65 95 23 70', 'primis', 'True', 'magna@euismodestarcu.ca'),
(41, 'Beau', 'Morse', '02 37 14 74 97', 'bibendum', 'True', 'at.sem@placerat.co.uk'),
(42, 'Rhea', 'Fuentes', '08 13 29 72 11', 'auctor,', 'True', 'Phasellus.nulla@NullaaliquetProin.edu'),
(43, 'Garrett', 'Gates', '03 88 53 32 90', 'arcu.', 'False', 'mus.Donec.dignissim@nibh.net'),
(44, 'Ivy', 'Drake', '06 18 39 73 44', 'mollis', 'False', 'nec@odio.edu'),
(45, 'Yvonne', 'Ball', '07 82 95 72 36', 'convallis,', 'False', 'malesuada.vel.venenatis@atiaculis.edu'),
(46, 'Yen', 'Zamora', '02 97 68 95 34', 'sed,', 'True', 'ut.mi@sedestNunc.co.uk'),
(47, 'Shad', 'Hart', '03 98 71 99 45', 'et,', 'False', 'erat.eget@tincidunt.ca'),
(48, 'Maryam', 'Bell', '06 28 15 72 44', 'nibh', 'True', 'nec.eleifend.non@enimEtiam.org'),
(49, 'Deirdre', 'Hernandez', '06 33 01 97 65', 'Aliquam', 'True', 'Mauris@liberoDonec.net'),
(50, 'Rebecca', 'Bates', '07 13 17 56 46', 'fringilla', 'True', 'aliquet.diam@orcilobortis.net'),
(51, 'Hannah', 'Perry', '04 07 15 74 28', 'semper', 'False', 'Nulla.tincidunt.neque@iaculislacus.ca'),
(52, 'Zahir', 'Valentine', '06 15 45 43 22', 'leo.', 'False', 'Nullam.feugiat@Aenean.ca'),
(53, 'Daphne', 'Lester', '02 30 06 79 38', 'Nunc', 'True', 'eros.nec@felis.com'),
(54, 'Anthony', 'Pearson', '03 81 53 87 42', 'posuere', 'False', 'ante.dictum.mi@placerat.com'),
(55, 'Jemima', 'Mullen', '08 63 54 78 84', 'odio', 'True', 'vehicula@morbitristiquesenectus.net'),
(56, 'Philip', 'Maynard', '09 01 26 24 47', 'massa.', 'False', 'tincidunt@afelisullamcorper.co.uk'),
(57, 'Maris', 'Guzman', '06 69 37 45 68', 'malesuada', 'False', 'Integer@Maecenas.co.uk'),
(58, 'Adara', 'Blackwell', '05 60 40 77 25', 'mus.', 'True', 'lacus@luctus.org'),
(59, 'Lavinia', 'Watson', '07 98 19 71 97', 'sollicitudin', 'False', 'aliquet@Duis.net'),
(60, 'Quentin', 'Davidson', '02 54 69 49 95', 'porttitor', 'True', 'vestibulum.Mauris@InloremDonec.net'),
(61, 'Martin', 'Combs', '01 43 87 00 94', 'Sed', 'False', 'amet.consectetuer.adipiscing@ipsum.com'),
(62, 'Yuri', 'Hyde', '09 11 51 96 02', 'lorem', 'True', 'porttitor.vulputate.posuere@egestas.org'),
(63, 'Dillon', 'George', '07 20 15 80 55', 'dui.', 'True', 'sem@neque.ca'),
(64, 'Dustin', 'Salas', '04 18 46 78 54', 'ultrices', 'True', 'mus.Aenean@arcu.com'),
(65, 'Eagan', 'Dale', '08 65 27 34 03', 'eu', 'False', 'nibh@rutrummagnaCras.net'),
(66, 'Grant', 'Combs', '01 76 07 50 26', 'aliquet', 'False', 'Donec.porttitor@indolorFusce.com'),
(67, 'Montana', 'Mueller', '04 63 69 89 39', 'Duis', 'True', 'Cras.vehicula@anteblanditviverra.org'),
(68, 'Xenos', 'Bush', '03 27 37 76 78', 'morbi', 'False', 'imperdiet.non@pharetra.org'),
(69, 'Devin', 'Cleveland', '06 07 63 43 87', 'ipsum', 'False', 'parturient.montes.nascetur@sodalesat.org'),
(70, 'Damon', 'Nixon', '09 36 13 47 16', 'urna', 'True', 'Pellentesque@malesuadavel.org'),
(71, 'Cathleen', 'Frazier', '09 78 90 58 48', 'neque.', 'False', 'Mauris.quis.turpis@ornareelitelit.net'),
(72, 'Isadora', 'Santiago', '05 48 99 60 05', 'amet', 'False', 'dis.parturient.montes@fringillaeuismod.ca'),
(73, 'Kirestin', 'Conley', '01 54 56 37 00', 'sit', 'True', 'id.libero.Donec@magnamalesuadavel.org'),
(74, 'Acton', 'Sargent', '09 24 96 84 39', 'convallis', 'True', 'ut.sem@egestasDuis.org'),
(75, 'Elaine', 'Malone', '02 50 00 19 23', 'a,', 'False', 'nec@Etiam.net'),
(76, 'Aristotle', 'Hogan', '08 31 20 41 94', 'dui', 'False', 'arcu@sociis.net'),
(77, 'Len', 'Hall', '02 80 97 34 92', 'tempor', 'True', 'convallis.dolor@sitamet.co.uk'),
(78, 'Jackson', 'Knowles', '03 71 40 37 41', 'Proin', 'True', 'at.pretium@cursus.co.uk'),
(79, 'Lila', 'Rutledge', '01 87 51 12 70', 'Duis', 'True', 'sem.mollis.dui@aliquetmagnaa.co.uk'),
(80, 'Quinlan', 'Cummings', '06 75 65 87 05', 'erat,', 'True', 'Duis.a.mi@infaucibusorci.ca'),
(81, 'Emily', 'Price', '08 60 41 23 65', 'eget', 'False', 'mi.pede@Fusce.edu'),
(82, 'Mariam', 'Montoya', '02 93 09 87 53', 'dignissim', 'False', 'molestie@porttitorvulputateposuere.org'),
(83, 'Barbara', 'Frederick', '09 63 87 52 77', 'Morbi', 'False', 'id.risus@diamDuismi.net'),
(84, 'Blythe', 'Rowland', '01 39 89 13 84', 'diam', 'False', 'Sed.molestie@cubiliaCurae.org'),
(85, 'Yeo', 'Diaz', '08 93 93 93 08', 'In', 'False', 'nibh@vitaerisusDuis.ca'),
(86, 'Clinton', 'Delaney', '07 16 46 45 42', 'pharetra', 'False', 'Duis.risus.odio@Namacnulla.org'),
(87, 'Hayfa', 'Fitzgerald', '05 46 34 42 28', 'lectus.', 'False', 'id.ante@Vestibulumanteipsum.com'),
(88, 'Jamalia', 'Wiggins', '07 33 72 90 95', 'rhoncus', 'False', 'erat.in@nonsapienmolestie.com'),
(89, 'Emmanuel', 'Day', '05 43 90 19 06', 'eu', 'False', 'pede@etrisus.net'),
(90, 'Jared', 'Mullen', '04 34 94 02 40', 'aliquet,', 'True', 'sed@Phasellusinfelis.org'),
(91, 'Nero', 'Frazier', '09 47 69 82 71', 'magna.', 'False', 'Cras.eget@ametdiameu.co.uk'),
(92, 'Joan', 'Delgado', '05 98 37 64 28', 'felis.', 'False', 'augue@eget.com'),
(93, 'Katelyn', 'Steele', '03 38 01 45 75', 'sit', 'False', 'fermentum.convallis@scelerisquedui.co.uk'),
(94, 'Brianna', 'Mckee', '07 64 73 51 41', 'scelerisque', 'False', 'semper@eunequepellentesque.edu'),
(95, 'Samuel', 'Caldwell', '08 53 90 95 97', 'volutpat.', 'False', 'aliquet.sem@turpisnecmauris.com'),
(96, 'Wang', 'Burris', '08 06 63 69 43', 'consectetuer', 'True', 'id.blandit.at@elitEtiam.net'),
(97, 'Shaeleigh', 'Dunn', '09 69 00 72 12', 'malesuada', 'False', 'eleifend@augue.net'),
(98, 'Yasir', 'Best', '03 69 75 95 98', 'massa', 'False', 'eu@malesuadafames.co.uk'),
(99, 'Carson', 'Whitley', '06 36 82 59 79', 'non,', 'True', 'elit.pretium.et@odiotristique.edu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
