-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 11:14 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS skate_ecommerce;
USE skate_ecommerce;

CREATE TABLE clienti(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
cognome VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
cellulare VARCHAR(50) NOT NULL,
indirizzo VARCHAR(50) NOT NULL
);

CREATE TABLE dati_accesso(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
id_cliente INT NOT NULL UNIQUE,
FOREIGN KEY(id_cliente) REFERENCES clienti(id)
);


CREATE TABLE ordini(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
data DATETIME NOT NULL,
stato ENUM('Elaborazione','Spedito','Ricevuto'),
id_cliente INT NOT NULL,
FOREIGN KEY(id_cliente) REFERENCES clienti(id)
);

CREATE TABLE categorie(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
descrizione VARCHAR(255) NOT NULL
);

CREATE TABLE prodotti(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
immagine VARCHAR(50) NOT NULL,
produttore VARCHAR(50) NOT NULL,
prezzo DECIMAL(10,2) NOT NULL,
scorta INT NOT NULL,
id_categoria INT,
FOREIGN KEY(id_categoria) REFERENCES categorie(id)
);


CREATE TABLE dettaglio_ordine(
id_ordine INT NOT NULL,
id_prodotto INT NOT NULL,
FOREIGN KEY (id_ordine) REFERENCES ordini(id),
FOREIGN KEY (id_prodotto) REFERENCES prodotti(id),
quantita INT NOT NULL
);

CREATE TABLE lingue(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
lingua VARCHAR(50) NOT NULL,
bandiera VARCHAR(100) NOT NULL
);

CREATE TABLE prodotto_lingua(
nome VARCHAR(50) NOT NULL,
descrizione VARCHAR(255) NOT NULL,
id_prodotto INT NOT NULL,
id_lingua INT NOT NULL,
FOREIGN KEY(id_prodotto) REFERENCES prodotti(id),
FOREIGN KEY(id_lingua) REFERENCES lingue(id),
PRIMARY KEY(id_prodotto,id_lingua)
);

CREATE TABLE carte(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(20) NOT NULL
);

CREATE TABLE pagamento(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
codice VARCHAR(20) NOT NULL,
ccv VARCHAR(3) NOT NULL,
scadenza DATE NOT NULL,
titolare VARCHAR(50) NOT NULL,
id_cliente INT NOT NULL,
id_carta INT NOT NULL,
FOREIGN KEY(id_cliente) REFERENCES clienti(id),
FOREIGN KEY(id_carta) REFERENCES carte(id)
);
