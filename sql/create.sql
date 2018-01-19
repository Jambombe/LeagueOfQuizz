-- Create database league_of_quizz CHARACTER SET 'utf8';
-- Use league_of_quizz;

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

--source insert.sql