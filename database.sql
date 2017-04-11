CREATE DATABASE skate_ecommerce IF NOT EXIST;
USE skate_ecommerce;

CREATE TABLE clienti(
id_cliente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
FOREIGN KEY(id_cliente) REFERENCES cliente(id)
);


CREATE TABLE ordini(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
data DATETIME NOT NULL,
stato ENUM(’In elaborazione’,’Spedito’,’Ricevuto’),
id_cliente INT NOT NULL,
FOREIGN KEY(id_cliente) REFERENCES cliente(id)
);

CREATE TABLE categorie(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
descrizione VARCHAR(255) NOT NULL
);

CREATE TABLE prodotti(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
immagine BLOB NOT NULL,    
produttore VARCHAR(50) NOT NULL,
prezzo DECIMAL(10,2) NOT NULL,
scorta INT NOT NULL,
id_categoria INT,
FOREIGN KEY(id_categoria) REFERENCES categorie(id)
);


CREATE TABLE dettaglio_ordine(
id_ordine INT NOT NULL,
id_prodotto INT NOT NULL,
FOREIGN KEY (id_ordine) REFERENCES cliente(id_ordine),
FOREIGN KEY (id_prodotto) REFERENCES prodotto(id_prodotto),
quantita INT NOT NULL
);

CREATE TABLE lingue(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
lingua VARCHAR(50) NOT NULL,
bandiera BLOB NOT NULL
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