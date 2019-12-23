DROP TABLE IF EXISTS institution;

DROP TABLE IF EXISTS speaker;

CREATE TABLE event (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
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
	name VARCHAR(255),
	address VARCHAR(255)
);

CREATE TABLE timeslot (
	id INT AUTO_INCREMENT PRIMARY KEY,
	start_time TIME,
	finish_time TIME,
	timeslot_activity_id INT,
	FOREIGN KEY(timeslot_activity)
		REFERENCES timeslot_activity(timeslot_activity_id)
		ON DELETE CASCADE
);

CREATE TABLE timeslot_activity (
	activity_id INT,
	timeslot_id INT	
);

CREATE TABLE film (
 	title VARCHAR(255),
 	release_date DATE,
 	synopsis TEXT,
 	image VARCHAR(255),
 );



CREATE TABLE person (
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(255),
	last_name VARCHAR(255),
	title VARCHAR(255),
	biography TEXT,
	institution INT,
	photo VARCHAR(255),
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
