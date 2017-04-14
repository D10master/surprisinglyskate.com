-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 03:24 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skate_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carte`
--

CREATE TABLE `carte` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nome`, `descrizione`) VALUES
(1, 'tavole', 'tavole di legno'),
(2, 'grip', 'rivestimento antiscivolo per le tavole'),
(3, 'truck', 'carrello'),
(4, 'ruote strada', 'ruote per girare in strada, ideali per la cittÃ '),
(5, 'ruote rampa', 'ruote per eseguire trick sulle rampe, ideale per palestre e luoghi di allenamento'),
(6, 'cuscinetti', 'cuscinetti a sfera'),
(7, 'bulloneria', 'viti fissaggio tavola, bulloni fissaggio ruote e cuscinetti'),
(8, 'riser', 'guarnizione in gomm, separa tavola e truck');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cellulare` varchar(50) NOT NULL,
  `indirizzo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`id`, `nome`, `cognome`, `email`, `cellulare`, `indirizzo`) VALUES
(1, 'giacomo', 'caluso', 'g.c@gmail.com', '3459874564', 'via roma 10 torino 10127');

-- --------------------------------------------------------

--
-- Table structure for table `dati_accesso`
--

CREATE TABLE `dati_accesso` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dati_accesso`
--

INSERT INTO `dati_accesso` (`id`, `username`, `password`, `id_cliente`) VALUES
(1, 'pino', 'ciao', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dettaglio_ordine`
--

CREATE TABLE `dettaglio_ordine` (
  `id_ordine` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lingue`
--

CREATE TABLE `lingue` (
  `id` int(11) NOT NULL,
  `lingua` varchar(50) NOT NULL,
  `bandiera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordini`
--

CREATE TABLE `ordini` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `stato` enum('Elaborazione','Spedito','Ricevuto') DEFAULT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) NOT NULL,
  `codice` varchar(20) NOT NULL,
  `ccv` varchar(3) NOT NULL,
  `scadenza` date NOT NULL,
  `titolare` varchar(50) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_carta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `immagine` varchar(50) NOT NULL,
  `produttore` varchar(50) NOT NULL,
  `prezzo` decimal(10,2) NOT NULL,
  `scorta` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES
(1, 'tavola legno di noce', 'tavola_legno', 'ak47', '20.00', 4, 1),
(2, 'tavola plastica', 'tavola_plastica', 'ak47', '10.00', 2, 1),
(3, 'grip verde', 'grip_verde', 'ak47', '2.00', 3, 2),
(4, 'grip rosso', 'grip_rosso', 'ak47', '2.00', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prodotto_lingua`
--

CREATE TABLE `prodotto_lingua` (
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `id_lingua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dati_accesso`
--
ALTER TABLE `dati_accesso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `dettaglio_ordine`
--
ALTER TABLE `dettaglio_ordine`
  ADD KEY `id_ordine` (`id_ordine`),
  ADD KEY `id_prodotto` (`id_prodotto`);

--
-- Indexes for table `lingue`
--
ALTER TABLE `lingue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_carta` (`id_carta`);

--
-- Indexes for table `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
