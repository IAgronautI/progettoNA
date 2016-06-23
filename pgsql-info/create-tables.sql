CREATE TABLE output_catena 
(
	Linea INT NOT NULL,									-- Linea dove viene fatto il prodotto
	ID_prodotto INTEGER NOT NULL UNIQUE PRIMARY KEY, 	-- barcode
	Nome VARCHAR(40),									-- nome prodotto
	Descrizione VARCHAR(255),							-- descrizione del prodotto
	numProdotti INTEGER 								-- quantità prodotta	
); -- Tabella di output
CREATE TABLE log_eventi
(
	ID SERIAL PRIMARY KEY,
	Linea INTEGER,										-- Linea di produzione del contatore
	Posizione INTEGER,									-- posizione dell'ultimo pacchetto ricevuto nell'ordine di produzione
	Date TIMESTAMP,										-- data dell'evento
	Info VARCHAR(255)									-- descrizione dell'evento
);
CREATE TABLE settings 
(
	IDstazione INTEGER UNIQUE NOT NULL,
	Lineaproduzione INTEGER NOT NULL,
	Barcodetimeout INTEGER NOT NULL,
	Descrizione TEXT
);
CREATE TABLE log_produzione
(
	ID SERIAL PRIMARY KEY,
	Linea INT,
	Date TIMESTAMP,
	Barcode INT
);


-- parte relativa agli utenti autorizzati a accedere al sito

CREATE TABLE login 
(
	ID SERIAL PRIMARY KEY,
	username VARCHAR( 64 ) NOT NULL ,
	password VARCHAR( 64 ) NOT NULL
);
 
INSERT INTO login (username, password)
VALUES ('tecnicoautorizzato', 'pwddifficile');

---------------------------

INSERT INTO output_catena (Linea, ID_prodotto, Nome, Descrizione, numProdotti)
VALUES (0, 1, 'Fallita_Lettura_Barcode', 'Questo prodotti indica il numeri di prodotti in cui il barcode non è stato letto', 0);
INSERT INTO log_eventi (Linea, Posizione, Info)
VALUES (0, -1, 'sono stati inseriti i dati di default nel server');

-- Gli eventi sono gestiti con crontab

