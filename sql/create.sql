-- Create database league_of_quizz CHARACTER SET 'utf8';
-- Use league_of_quizz;

---------------------------------------------------------------------------------
-- FACILE
---------------------------------------------------------------------------------

CREATE TABLE questions_simples (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	ennonce VARCHAR(100) NOT NULL ,
	image VARCHAR(100) NOT NULL ,
	PRIMARY KEY (id))
ENGINE = InnoDB;

CREATE TABLE reponses_questions_simples (
	id SMALLINT NOT NULL,
	proposition VARCHAR(100) NOT NULL ,
	correct BIT NOT NULL ,
	FOREIGN KEY (id) REFERENCES questions_simples(id))
ENGINE = InnoDB;

CREATE TABLE classement_questions_simples (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	pseudo VARCHAR(20) NOT NULL ,
	temps VARCHAR(20) NOT NULL ,
	PRIMARY KEY (`id`))
ENGINE = InnoDB;

---------------------------------------------------------------------------------
-- MEDIUM
---------------------------------------------------------------------------------

CREATE TABLE questions_moyennes (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	ennonce VARCHAR(100) NOT NULL ,
	image VARCHAR(100) NOT NULL ,
	PRIMARY KEY (id))
ENGINE = InnoDB;

CREATE TABLE reponses_questions_moyennes (
	id SMALLINT NOT NULL,
	proposition VARCHAR(100) NOT NULL ,
	correct BIT NOT NULL ,
	FOREIGN KEY (id) REFERENCES questions_simples(id))
ENGINE = InnoDB;

CREATE TABLE classement_questions_moyennes (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	pseudo VARCHAR(20) NOT NULL ,
	temps VARCHAR(20) NOT NULL ,
	PRIMARY KEY (`id`))
ENGINE = InnoDB;

---------------------------------------------------------------------------------
-- HARD
---------------------------------------------------------------------------------

CREATE TABLE questions_difficiles (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	ennonce VARCHAR(100) NOT NULL ,
	image VARCHAR(100) NOT NULL ,
	PRIMARY KEY (id))
ENGINE = InnoDB;

CREATE TABLE reponses_questions_difficiles (
	id SMALLINT NOT NULL,
	proposition VARCHAR(100) NOT NULL ,
	correct BIT NOT NULL ,
	FOREIGN KEY (id) REFERENCES questions_simples(id))
ENGINE = InnoDB;

CREATE TABLE classement_questions_difficiles (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	pseudo VARCHAR(20) NOT NULL ,
	temps VARCHAR(20) NOT NULL ,
	PRIMARY KEY (`id`))
ENGINE = InnoDB;

--source insert.sql