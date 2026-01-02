CREATE DATABASE IF NOT EXISTS musicode;
USE musicode;

CREATE TABLE utilisateur(
	email varchar(100) primary key,
	nom_affichage varchar(100),
	mdp varchar(100) not null
);

CREATE TABLE musique(
	id_mu int AUTO_INCREMENT primary key,
	titre varchar(100),
	auteur varchar(100),
	duree TIME,
	album varchar(100)
);

CREATE TABLE ListePerso(
	id_li int AUTO_INCREMENT primary key,
	note int default 0 check(note between 0 AND 5),
	id_mu int,
	email varchar(100),
	foreign key (id_mu) references musique(id_mu),
	foreign key (email) references utilisateur(email)
);

INSERT INTO musique (titre, auteur, duree, album) VALUES
('As It Was', 'Harry Styles', '00:02:47', 'Harry''s House'),
('Flowers', 'Miley Cyrus', '00:03:21', 'Endless Summer Vacation'),
('Die For You', 'The Weeknd', '00:03:33', 'Starboy'),
('Kill Bill', 'SZA', '00:02:33', 'SOS'),
('Seven', 'Jung Kook ft. Latto', '00:03:05', 'Seven (Single)'),
('Dance The Night', 'Dua Lipa', '00:02:56', 'Barbie: The Album'),
('Good 4 U', 'Olivia Rodrigo', '00:02:58', 'SOUR'),
('Montero (Call Me By Your Name)', 'Lil Nas X', '00:02:17', 'Montero'),
('Houdini', 'Eminem', '00:03:14', 'The Death of Slim Shady'),
('Blinding Lights', 'The Weeknd', '00:03:20', 'After Hours'),
('Bzrp Music Sessions, Vol. 53', 'Shakira & Bizarrap', '00:03:34', 'Bzrp Music Sessions'),
('Pepas', 'Farruko', '00:04:47', 'La 167'),
('Heat Waves', 'Glass Animals', '00:03:58', 'Dreamland'),
('Stay', 'The Kid LAROI & Justin Bieber', '00:02:21', 'F*CK LOVE 3: OVER YOU'),
('Levitating', 'Dua Lipa', '00:03:24', 'Future Nostalgia'),
('Titi Me Pregunt', 'Bad Bunny', '00:04:03', 'Un Verano Sin Ti'),
('INDUSTRY BABY', 'Lil Nas X ft. Jack Harlow', '00:03:32', 'Montero'),
('Anti-Hero', 'Taylor Swift', '00:03:20', 'Midnights'),
('STAYC Girls (It''s Going Down)', 'STAYC', '00:03:14', 'STEREOTYPE'),
('Eyes Closed', 'Ed Sheeran', '00:03:15', '- (Subtract)');