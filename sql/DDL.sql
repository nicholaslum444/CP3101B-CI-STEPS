DROP TABLE IF EXISTS supervise;
DROP TABLE IF EXISTS participate;
DROP TABLE IF EXISTS project;
DROP TABLE IF EXISTS module;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS STEPSiteration;

CREATE TABLE IF NOT EXISTS user (
	matric_no VARCHAR(20),
	name VARCHAR(50),
	email VARCHAR(50),
	contact INTEGER,
	user_type INTEGER, 
	food_preference INTEGER,
	PRIMARY KEY(matric_no, user_type)
);

CREATE TABLE IF NOT EXISTS module (
	module_code VARCHAR(8),
	iteration INTEGER,
	module_name VARCHAR(100),
	module_description VARCHAR(2000),
	PRIMARY KEY(module_code, iteration)
);

CREATE TABLE IF NOT EXISTS project (
	title VARCHAR(100),
	abstract VARCHAR(2000),
	poster VARCHAR(100),
	video VARCHAR(100),
	project_id INTEGER,
	module_code VARCHAR(8),
	iteration INTEGER,
	leader_matric_no CHAR(9),
	PRIMARY KEY(project_id),
	FOREIGN KEY(module_code, iteration) 
	    REFERENCES module(module_code, iteration)
	    ON UPDATE CASCADE,
	FOREIGN KEY(leader_matric_no) 
	    REFERENCES user(matric_no)
	    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS participate (
	matric_no VARCHAR(9),
	project_id INTEGER,
	PRIMARY KEY(matric_no, project_id),
	FOREIGN KEY(matric_no) 
		REFERENCES user(matric_no)
		ON UPDATE CASCADE,
	FOREIGN KEY(project_id) 
		REFERENCES project(project_id) 
		ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS supervise (
	matric_no VARCHAR(9), 
	module_code VARCHAR(8), 
	iteration INTEGER,
	PRIMARY KEY(matric_no, module_code, iteration),
	FOREIGN KEY(matric_no) 
		REFERENCES user(matric_no)
		ON UPDATE CASCADE,
	FOREIGN KEY(module_code, iteration) 
		REFERENCES module(module_code, iteration)
		ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS STEPSiteration (
	iteration INTEGER,
	semester  VARCHAR(10)
);
