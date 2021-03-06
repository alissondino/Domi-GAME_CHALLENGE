DROP DATABASE IF EXISTS dbdomi_challenge;
CREATE DATABASE IF NOT EXISTS dbdomi_challenge
default character set utf8
default collate utf8_general_ci;
USE dbdomi_challenge;


CREATE TABLE IF NOT EXISTS tb_users(
	id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name_user VARCHAR(64) NOT NULL,
	last_name_user VARCHAR(64) NOT NULL,
	birth_date_user DATE NOT NULL,
	email_user VARCHAR(64) NOT NULL,
	login_user VARCHAR(20) NOT NULL,
	password_user VARCHAR(20) NOT NULL,
	last_update TIMESTAMP NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_gamers(
	id_gamer INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	FOREIGN KEY (user_id) REFERENCES tb_users(id_user),
	score_gamer INT(5) NOT NULL,
	last_update TIMESTAMP NOT NULL
);
CREATE TABLE IF NOT EXISTS tb_ranking(
	id_ranking INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	gamer_id INT NOT NULL,
	FOREIGN KEY (gamer_id) REFERENCES tb_gamers(id_gamer),
	gamer_position INT(5) NOT NULL,
	last_update TIMESTAMP
);
CREATE TABLE IF NOT EXISTS tb_bosses(
	id_boss INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name_boss VARCHAR(25) NOT NULL,
	helth_boss INT(4) NOT NULL,
	room_number INT(2) NOT NULL,
	last_update TIMESTAMP NOT NULL
);

USE dbdomi_challenge;



DROP PROCEDURE IF EXISTS sp_users_insert;
DELIMITER $$


CREATE PROCEDURE sp_users_insert(
	p_user_name VARCHAR(64), p_last_name VARCHAR(64),p_birth_date DATE,
	p_email VARCHAR(64),p_login VARCHAR(25),p_password VARCHAR(25),	p_last_update TIMESTAMP
	)
BEGIN
INSERT INTO tb_users (
	name_user,	last_name_user,	birth_date_user,
	email_user,	login_user,	password_user,	last_update
	) 
VALUES(
	p_user_name, p_last_name, p_birth_date,	p_email,
	p_login,p_password,	p_last_update);
	
	SELECT * FROM tb_users WHERE id_user = LAST_INSERT_ID();

END $$
DELIMITER ;
