USING db;

DROP TABLE IF EXISTS institution;

DROP TABLE IF EXISTS speaker;

DROP TABLE IF EXISTS `group`;
DROP TABLE IF EXISTS group_member;


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
 	image VARCHAR(255)
 );

CREATE TABLE presentation (
	topic VARCHAR(255),
	person INT,
	FOREIGN KEY(person)
		REFERENCES person(id)
		ON DELETE SET NULL
 );

CREATE TABLE `group` (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255)
);

CREATE TABLE group_member (
	group_id INT,
	member_id INT
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

INSERT INTO event
	(name, institution, location_long, location_lat, blurb)
	VALUES
	('Epic Time', (SELECT id FROM institution WHERE name = 'ICMS'), -33.86514, 151.20990, "Coolest festivus");

INSERT INTO person
	(first_name, last_name, title, biography, institution, photo)
	VALUES
	('Gregg', 'Olde', 'manager', NULL, (SELECT id FROM institution WHERE name = 'ICMS'), 'https://picsum.photos/200'),
	('Matt', 'Hill', 'Manager', NULL, (SELECT id FROM institution WHERE name = 'Open Colleges'), 'https://picsum.photos/200');

INSERT INTO `group`
	(name) VALUES ("Rum Punch")
;

INSERT INTO group_member
	(group_id, member_id)
	VALUES
	((SELECT id FROM `group` WHERE name = 'Rum Punch'),  (SELECT id FROM person WHERE first_name = 'Gregg')),
	((SELECT id FROM `group` WHERE name = 'Rum Punch'),  (SELECT id FROM person WHERE first_name = 'Matt'));


SELECT * FROM person;
SELECT * FROM `group`
	INNER JOIN group_member ON `group`.id = group_member.group_id
	INNER JOIN person ON group_member.member_id = person.id
	WHERE `group`.name = 'Rum Punch';
