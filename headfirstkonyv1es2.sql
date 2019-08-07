CREATE DATABASE aliendatabase;

USE aliendatabase;
CREATE TABLE aliens_abduction (
	first_name VARCHAR(30),
	last_name VARCHAR(30),
	when_it_happend VARCHAR(30),
	how_long VARCHAR(30),
	how_many VARCHAR(30),
	alien_description VARCHAR(100),
	what_they_did VARCHAR(100),
	fang_spotted VARCHAR(10),
	other VARCHAR(100),
	email VARCHAR(50)
);
SHOW COLUMNS FROM aliens_abduction;
INSERT INTO aliens_abduction 
	(first_name, last_name, when_it_happend, how_long, how_many, alien_description, what_they_did, fang_spotted, other, email)
	VALUES
	('Sally', 'Jones', '3 days ago', '1 day', 'four', 'green with six tentacles', 'We just talked and played with a dog', 'yes', 'I may have seen your dog. Contact me.', 'sally@gregs-list.net');
SELECT * FROM aliens_abduction;
SELECT * FROM aliens_abduction WHERE fang_spotted = 'yes';

CREATE DATABASE elvis_store;
USE elvis_store;
CREATE TABLE email_list (
	first_name VARCHAR(20),
	last_name VARCHAR(20),
	email VARCHAR(60)
);
DESCRIBE email_list;
DROP TABLE email_list;
SELECT * FROM email_list;
SELECT * FROM email_list WHERE last_name = 'Martin';
SELECT first_name FROM email_list WHERE last_name = 'Bubba';
SELECT first_name, last_name FROM email_list WHERE  email = 'is@objectville.net';
SELECT * FROM email_list WHERE first_name = 'McCarthy' AND last_name = 'Amber';
UPDATE email_list SET email = 'figler.renata@tmx.hu';
DELETE FROM email_list WHERE email = '';
ALTER TABLE email_list ADD id INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id);
INSERT INTO email_list 
	(first_name, last_name, email) 
	VALUES
	('F', 'A', 'figler.renata@tmx.hu')