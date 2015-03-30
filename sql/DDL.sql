DROP TABLE IF EXISTS supervise;
DROP TABLE IF EXISTS enrolled;
DROP TABLE IF EXISTS participate;
DROP TABLE IF EXISTS project;
DROP TABLE IF EXISTS module;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS STEPSiteration;
DROP TABLE IF EXISTS admin;


CREATE TABLE IF NOT EXISTS user (
	user_id VARCHAR(20),
	name VARCHAR(50) NOT NULL,
	email VARCHAR(50),
	contact INTEGER,
	user_type INTEGER, 
	food_preference INTEGER,
	PRIMARY KEY(user_id, user_type)
);

CREATE TABLE IF NOT EXISTS module (
	module_code VARCHAR(8),
	iteration INTEGER,
	class_size INTEGER,
	module_name VARCHAR(100) NOT NULL,
	module_description VARCHAR(2000),
	PRIMARY KEY(module_code, iteration),
	FOREIGN KEY (iteration)
		REFERENCES STEPSiteration(iteration)
);

CREATE TABLE IF NOT EXISTS project (
	title VARCHAR(100) NOT NULL,
	abstract VARCHAR(2000),
	poster VARCHAR(100),
	video VARCHAR(100),
	project_id INTEGER AUTO_INCREMENT,
	module_code VARCHAR(8) NOT NULL,
	iteration INTEGER NOT NULL,
	leader_user_id CHAR(9),
	PRIMARY KEY(project_id),
	FOREIGN KEY(module_code, iteration) 
	    REFERENCES module(module_code, iteration)
	    ON UPDATE CASCADE,
	FOREIGN KEY(leader_user_id) 
	    REFERENCES user(user_id)
	    ON UPDATE CASCADE,
	FOREIGN KEY (iteration)
		REFERENCES STEPSiteration(iteration)
);

CREATE TABLE IF NOT EXISTS participate (
	user_id VARCHAR(20),
	project_id INTEGER,
	PRIMARY KEY(user_id, project_id),
	FOREIGN KEY(user_id) 
		REFERENCES user(user_id)
		ON UPDATE CASCADE,
	FOREIGN KEY(project_id) 
		REFERENCES project(project_id) 
		ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS supervise (
	user_id VARCHAR(20), 
	module_code VARCHAR(8), 
	iteration INTEGER,
	PRIMARY KEY(user_id, module_code, iteration),
	FOREIGN KEY(user_id) 
		REFERENCES user(user_id)
		ON UPDATE CASCADE,
	FOREIGN KEY(module_code, iteration) 
		REFERENCES module(module_code, iteration)
		ON UPDATE CASCADE,
	FOREIGN KEY (iteration)
		REFERENCES STEPSiteration(iteration)
);

CREATE TABLE IF NOT EXISTS STEPSiteration (
	iteration INTEGER,
	semester  VARCHAR(10)  NOT NULL,
	PRIMARY KEY (iteration)
);

CREATE TABLE IF NOT EXISTS enrolled (
	user_id VARCHAR(20),
	module_code VARCHAR(8), 
	iteration INTEGER,
	PRIMARY KEY(user_id, module_code, iteration),
	FOREIGN KEY(user_id) 
		REFERENCES user(user_id)
		ON UPDATE CASCADE,
	FOREIGN KEY(module_code, iteration) 
		REFERENCES module(module_code, iteration)
		ON UPDATE CASCADE,
	FOREIGN KEY (iteration)
		REFERENCES STEPSiteration(iteration)
);

CREATE TABLE IF NOT EXISTS admin (
	user_id VARCHAR(30),
	password VARCHAR(30),
	name VARCHAR(50),
	email VARCHAR(50),
	contact INTEGER,
	PRIMARY KEY(user_id,password)
);