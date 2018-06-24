DROP DATABASE IF EXISTS dbdomi_challenge;
CREATE DATABASE IF NOT EXISTS dbdomi_challenge
default character set utf8
default collate utf8_general_ci;
USE dbdomi_challenge;
CREATE TABLE IF NOT EXISTS tb_users(
	id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name_user VARCHAR(64) NOT NULL,
	last_name_user VARCHAR(64) NOT NULL,
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