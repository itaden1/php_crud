DROP TABLE IF EXISTS institution;

DROP TABLE IF EXISTS speaker;

CREATE TABLE event (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHARACTER(255),
	institution INT,
	location_long DECIMAL(8,5),
	location_lat DECIMAL(8,5),
	blurb TEXT,
	FOREIGN KEY(institution)
		REFERENCES institution(id)
		ON DELETE SET NULL
);

CREATE TABLE institution (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHARACTER(255),
	address VARCHARACTER(255)
);

CREATE TABLE timeslot (
	id INT AUTO_INCREMENT PRIMARY KEY,
	start_time TIME,
	finish_time TIME
);

CREATE TABLE speaker (
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHARACTER(255),
	last_name VARCHARACTER(255),
	title VARCHARACTER(255),
	biography TEXT,
	institution INT,
	photo VARCHARACTER(255),
	FOREIGN KEY(institution)
		REFERENCES institution(id)
		ON DELETE SET NULL
		
);

INSERT INTO institution
	(name, address)
	VALUES
	('ICMS', '123 George St, Sydney'),
	('Open Colleges', 'Victoria Rd, Surry Hills');
	
INSERT INTO speaker
	(first_name, last_name, title, biography, institution, photo)
	VALUES
	('Gregg', 'Olde', 'manager', NULL, (SELECT id FROM institution WHERE name = 'ICMS'), 'https://picsum.photos/200'),
	('Matt', 'Hill', 'Mangaer', NULL, (SELECT id FROM institution WHERE name = 'Open Colleges'), 'https://picsum.photos/200');

SELECT * FROM speaker;
