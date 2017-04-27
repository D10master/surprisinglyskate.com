-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Apr 20, 2017 alle 09:35
-- Versione del server: 10.1.16-MariaDB
-- Versione PHP: 5.6.24

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
-- Struttura della tabella `carte`
--

CREATE TABLE `carte` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `categorie`
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
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cellulare` varchar(50) NOT NULL,
  `indirizzo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`id`, `username`, `password`, `nome`, `cognome`, `email`, `cellulare`, `indirizzo`) VALUES
(0, 'dino', 'campa', 'dino', 'campana', 'd.c@gmail.com', '123456', 'via piazza 12'),
(1, 'pino', '123', 'giacomo', 'caluso', 'g.c@gmail.com', '3459874564', 'via roma 10 torino 10127');

-- --------------------------------------------------------

--
-- Struttura della tabella `dettaglio_ordine`
--

CREATE TABLE `dettaglio_ordine` (
  `id_ordine` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `lingue`
--

CREATE TABLE `lingue` (
  `id` int(11) NOT NULL,
  `lingua` varchar(50) NOT NULL,
  `bandiera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `stato` enum('Elaborazione','Spedito','Ricevuto') DEFAULT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `pagamento`
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
-- Struttura della tabella `prodotti`
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
-- Dump dei dati per la tabella `prodotti`
--

ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
  
  
INSERT INTO `prodotti` (`id`, `nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES
(1, 'tavola legno di noce', 'tavola_legno', 'ak47', '20.00', 4, 1),
(2, 'tavola plastica', 'tavola_plastica', 'ak47', '10.00', 2, 1),
(3, 'grip verde', 'grip_verde', 'ak47', '2.00', 3, 2),
(4, 'grip rosso', 'grip_rosso', 'ak47', '2.00', 4, 2);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("truck 140mm","truck_140mm","ak47",15,5,3);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("truck penny","truck_penny","ak47",10,3,3);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("grip nero","grip_nero","ak47",2,4,2);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("tavola colorata","tavola_colorata","ak47",15,4,1);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("ruote fantasia","ruote_fantasia","ak47",5,5,4);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("ruote nere","ruote_nere","ak47",5,3,4);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("ruote plastica","ruote_plastica","ak47",3,4,4);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("ruote rampa","ruote_rampa","ak47",6,5,5);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("cuscinetti sfera","cuscinetti_sfera","ak47",8,5,6);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("cuscinetti standard","cuscinetti_standard","ak47",8,3,6);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("bulloni blu","bulloni_blu","ak47",1,4,7);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("bulloni giallo","bulloni_giallo","ak47",1,4,7);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("bulloni rosso","bulloni_rosso","ak47",1,4,7);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("riser indipendent","riser_indipendent","ak47",7,5,8);
INSERT INTO `prodotti`(`nome`, `immagine`, `produttore`, `prezzo`, `scorta`, `id_categoria`) VALUES ("riser pig","riser_pig","ak47",7,4,8);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto_lingua`
--

CREATE TABLE `prodotto_lingua` (
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `id_lingua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `dettaglio_ordine`
--
ALTER TABLE `dettaglio_ordine`
  ADD KEY `id_ordine` (`id_ordine`),
  ADD KEY `id_prodotto` (`id_prodotto`);

--
-- Indici per le tabelle `lingue`
--
ALTER TABLE `lingue`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indici per le tabelle `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_carta` (`id_carta`);

--
-- Indici per le tabelle `prodotti`
--


--
-- AUTO_INCREMENT per le tabelle scaricate
--
ALTER TABLE `clienti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT per la tabella `prodotti`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
