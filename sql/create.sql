CREATE TABLE `league_of_quizz`.`questions_simples` (
	id SMALLINT NOT NULL AUTO_INCREMENT ,
	ennonce TEXT NOT NULL ,
	image TEXT NOT NULL ,
	PRIMARY KEY (id))
ENGINE = InnoDB;

CREATE TABLE `league_of_quizz`.`reponses_questions_simples` (
	id SMALLINT NOT NULL AUTO_INCREMENT,
	proposition TEXT NOT NULL ,
	correct BIT NOT NULL ,
	FOREIGN KEY (id) REFERENCES questions_simples(id))
ENGINE = InnoDB;

source insert.sql