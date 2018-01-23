-- Create database league_of_quizz CHARACTER SET 'utf8';
-- Use league_of_quizz;

---------------------------------------------------------------------------------
-- FACILE
---------------------------------------------------------------------------------

CREATE TABLE `league_of_quizz`.`questions_simples` (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	ennonce TEXT NOT NULL ,
	image TEXT NOT NULL ,
	PRIMARY KEY (id))
ENGINE = InnoDB;

CREATE TABLE `league_of_quizz`.`reponses_questions_simples` (
	id SMALLINT NOT NULL,
	proposition TEXT NOT NULL ,
	correct BIT NOT NULL ,
	FOREIGN KEY (id) REFERENCES questions_simples(id))
ENGINE = InnoDB;

CREATE TABLE `league_of_quizz`.`classement_questions_simples` (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	pseudo TEXT NOT NULL ,
	temps TEXT NOT NULL ,
	PRIMARY KEY (`id`))
ENGINE = InnoDB;

---------------------------------------------------------------------------------
-- MEDIUM
---------------------------------------------------------------------------------

CREATE TABLE `league_of_quizz`.`questions_moyennes` (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	ennonce TEXT NOT NULL ,
	image TEXT NOT NULL ,
	PRIMARY KEY (id))
ENGINE = InnoDB;

CREATE TABLE `league_of_quizz`.`reponses_questions_moyennes` (
	id SMALLINT NOT NULL,
	proposition TEXT NOT NULL ,
	correct BIT NOT NULL ,
	FOREIGN KEY (id) REFERENCES questions_simples(id))
ENGINE = InnoDB;

CREATE TABLE `league_of_quizz`.`classement_questions_moyennes` (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	pseudo TEXT NOT NULL ,
	temps TEXT NOT NULL ,
	PRIMARY KEY (`id`))
ENGINE = InnoDB;

---------------------------------------------------------------------------------
-- HARD
---------------------------------------------------------------------------------

CREATE TABLE `league_of_quizz`.`questions_difficiles` (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	ennonce TEXT NOT NULL ,
	image TEXT NOT NULL ,
	PRIMARY KEY (id))
ENGINE = InnoDB;

CREATE TABLE `league_of_quizz`.`reponses_questions_difficiles` (
	id SMALLINT NOT NULL,
	proposition TEXT NOT NULL ,
	correct BIT NOT NULL ,
	FOREIGN KEY (id) REFERENCES questions_simples(id))
ENGINE = InnoDB;

CREATE TABLE `league_of_quizz`.`classement_questions_difficiles` (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	pseudo TEXT NOT NULL ,
	temps TEXT NOT NULL ,
	PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- REGLE POUR SUPPRIMER ROW WHERE TEMPS=02:30:00

-- CREATE OR REPLACE RULE deleteDoubleInsert AS ON insert
-- TO classement_questions_simples WHERE temps="02:30:0"
-- DO INSTEAD NOTHING;


--source insert.sql