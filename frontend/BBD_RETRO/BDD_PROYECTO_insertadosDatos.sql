CREATE DATABASE RETROPANDA;
USE RETROPANDA;

CREATE TABLE EMPRESA (
	ID_EMPRESA SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	NOMBRE_EMPRESA VARCHAR(30) NOT NULL,
	PAIS VARCHAR(50) NOT NULL
);

CREATE TABLE DESARROLLADORA (
	ID_DESARROLLADORA SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	ID_EMPRESA SMALLINT(5) UNSIGNED NOT NULL,
	
	FOREIGN KEY (ID_EMPRESA) REFERENCES EMPRESA(ID_EMPRESA)
);

CREATE TABLE PLATAFORMA (
	ID_PLATAFORMA SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	NOMBRE VARCHAR(20) NOT NULL
);

CREATE TABLE JUEGO (
	ID_JUEGO SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	NOMBRE VARCHAR(100) NOT NULL,
	GENERO1 ENUM ('Acción','Shooter','Estrategia','Simulacion','Deportes','Carreras','Aventuras','Rol', 'Plataformas', 'Puzzles') NOT NULL,
	GENERO2 ENUM ('Acción','Shooter','Estrategia','Simulacion','Deportes','Carreras','Aventuras','Rol', 'Plataformas', 'Puzzles') NULL,
	GENERO3 ENUM ('Acción','Shooter','Estrategia','Simulacion','Deportes','Carreras','Aventuras','Rol', 'Plataformas', 'Puzzles') NULL,
	GENERO4 ENUM ('Acción','Shooter','Estrategia','Simulacion','Deportes','Carreras','Aventuras','Rol', 'Plataformas', 'Puzzles') NULL,
	FECHA_PUBLICACION DATE NULL,
	REGION1 ENUM ('NTSC','PAL','JPN','AUS'),
	REGION2 ENUM ('NTSC','PAL','JPN','AUS'),
	REGION3 ENUM ('NTSC','PAL','JPN','AUS'),
	REGION4 ENUM ('NTSC','PAL','JPN','AUS'),
	CARATULA VARCHAR(200) NOT NULL,
	ID_DESARROLLADORA SMALLINT(5) UNSIGNED NOT NULL,
	
	FOREIGN KEY (ID_DESARROLLADORA) REFERENCES DESARRolLADORA(ID_DESARROLLADORA)
);

CREATE TABLE USUARIO (
	ID_USUARIO SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	EMAIL VARCHAR (30) NOT NULL,
	USERNAME VARCHAR(30) NOT NULL,
	CONTRASEÑA VARCHAR(40) NOT NULL,
	IMAGEN_PERFIL VARCHAR (200) NOT NULL,
	BIOGRAFIA VARCHAR (100) NULL
);

CREATE TABLE PLATAFORMA_JUEGO (
	ID_JUEGO SMALLINT(5) UNSIGNED NOT NULL,
	ID_PLATAFORMA SMALLINT(5) UNSIGNED NOT NULL,
	
	FOREIGN KEY (ID_PLATAFORMA) REFERENCES PLATAFORMA(ID_PLATAFORMA),
	FOREIGN KEY (ID_JUEGO) REFERENCES JUEGO(ID_JUEGO)
);

CREATE TABLE JUEGO_USUARIO_COMPRADO (
	ID_JUEGO SMALLINT(5) UNSIGNED NOT NULL,
	ID_USUARIO SMALLINT(5) UNSIGNED NOT NULL,
	
	FOREIGN KEY (ID_JUEGO) REFERENCES JUEGO(ID_JUEGO),
	FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID_USUARIO)
);

CREATE TABLE JUEGO_USUARIO_WISHLIST (
	ID_JUEGO SMALLINT(5) UNSIGNED NOT NULL,
	ID_USUARIO SMALLINT(5) UNSIGNED NOT NULL,

	FOREIGN KEY (ID_JUEGO) REFERENCES JUEGO(ID_JUEGO),
	FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID_USUARIO)
);

CREATE TABLE VALORACION_JUEGO_USUARIO (
	ID_JUEGO SMALLINT(5) UNSIGNED NOT NULL,
	ID_USUARIO SMALLINT(5) UNSIGNED NOT NULL,
	COMENTARIO VARCHAR(200) NOT NULL,
	
	FOREIGN KEY (ID_JUEGO) REFERENCES JUEGO(ID_JUEGO),
	FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID_USUARIO)
	
);

INSERT INTO EMPRESA (
	NOMBRE_EMPRESA,
	PAIS
)
VALUES
("Nintendo",'Japon'),
("Konami",'Japon'),
("Etranges Libellules",'EEUU'),
("Rareware",'EEUU'),
("SEGA",'Japon'),
("LucasArts",'EEUU'),
("id Software",'EEUU'),
("Tecmo",'Japon'),
("Ape Studios",'EEUU'),
("Insomniac Games",'EEUU'),
("Squaresoft",'Japon');

INSERT INTO DESARROLLADORA (
	ID_DESARROLLADORA,
	ID_EMPRESA
)
VALUES
(1,1),
(2,2),
(3,3),
(4,4),
(5,5),
(6,6),
(7,7),
(8,8),
(9,9),
(10,10),
(11,11);

INSERT INTO PLATAFORMA (
	NOMBRE
)
VALUES
('SNES'),
('NES'),
('GAME BOY'),
('NINTENDO 64'),
('PLAYSTATION'),
('PLAYSTATION 2'),
('SEGA MEGA DRIVE'),
('PC'),
('GAMECUBE'),
('GAME BOY ADVANCE');

INSERT INTO JUEGO (
	NOMBRE,
	GENERO1,
	GENERO2,
	GENERO3,
	GENERO4,
	FECHA_PUBLICACION,
	REGION1,
	REGION2,
	REGION3,
	REGION4,
	CARATULA,
	ID_DESARROlLADORA
)
VALUES
('Super Mario World','Plataformas',NULL,NULL,NULL,'1991-01-01','NTSC','PAL','JPN','AUS','https://images-na.ssl-images-amazon.com/images/I/71IFenZVQ1L._SL1343_.jpg',1),
('Super Mario Bros','Plataformas',NULL,NULL,NULL,'1987-01-01','NTSC','PAL','JPN','AUS','https://i.ytimg.com/vi/VB6KbX_Bt7M/hqdefault.jpg',2),
('Super Metroid','Acción',NULL,NULL,NULL,'1994-01-01','NTSC','PAL','JPN','AUS','https://uvejuegos.com/img/caratulas/846/Super-Metroid-SNES-EU.jpg',3),
('Pokémon Edición Amarilla: Edición Especial Pikachu','Rol',NULL,NULL,NULL,'2000-01-01','NTSC','PAL','JPN','AUS','https://vignette.wikia.nocookie.net/dreampkmn/images/a/a5/Car%C3%A1tula_Pok%C3%A9mon_Amarillo.png/revision/latest/scale-to-width-down/340?cb=20130313213339&path-prefix=es',4),
('The Legend of Zelda: Ocarina of Time','Aventuras',NULL,NULL,NULL,'1998-01-01','NTSC','PAL','JPN','AUS','https://media.redadn.es/imagenes/the-legend-of-zelda-ocarina-of-time-wii_80400_pn.jpg',1),
('Metal Gear Solid','Acción',NULL,NULL,NULL,'1998-01-01','NTSC','PAL','JPN','AUS','https://i11b.3djuegos.com/juegos/3871/metal_gear_solid/fotos/ficha/metal_gear_solid-2200281.jpg',2),
('Metal Gear Solid 2: Sons of Liberty','Acción',NULL,NULL,NULL,'2002-01-01','NTSC','PAL','JPN','AUS','https://media.vandal.net/t200/1246/2003429211948_1.jpg',2),
('Spyro The Dragon','Aventuras',NULL,NULL,NULL,'1998-01-01','NTSC','PAL','JPN','AUS','https://i11b.3djuegos.com/juegos/7004/spyro_the_dragon/fotos/ficha/spyro_the_dragon-1725665.jpg',3),
('Donkey Kong Country','Plataformas',NULL,NULL,NULL,'1994-01-01','NTSC','PAL','JPN','AUS','https://i11b.3djuegos.com/juegos/9285/donkey_kong_country/fotos/ficha/donkey_kong_country-2108021.jpg',1),
('The Legend of Zelda: A Link to the Past','Aventuras',NULL,NULL,NULL,'1991-01-01','NTSC','PAL','JPN','AUS','https://i11a.3djuegos.com/juegos/5271/the_legend_of_zelda__a_link_to_the_past/fotos/ficha/the_legend_of_zelda__a_link_to_the_past-1698112.jpg',4),
('Sonic The Hedgehog','Plataformas',NULL,NULL,NULL,'1991-01-01','NTSC','PAL','JPN','AUS','https://i11d.3djuegos.com/juegos/9983/sonic_the_hedgehog__cl_sico_/fotos/ficha/sonic_the_hedgehog__cl_sico_-2269715.jpg',5),
('Sonic The Hedgehog 2','Plataformas',NULL,NULL,NULL,'1992-01-01','NTSC','PAL','JPN','AUS','https://uvejuegos.com/img/caratulas/1979/Sonic-the-Hedgehog-2-MD-EU.jpg',5),
('The Secret of Monkey Island','Aventuras',NULL,NULL,NULL,'1990-01-01','NTSC','PAL','JPN','AUS','https://i11d.3djuegos.com/juegos/3236/the_secret_of_monkey_island/fotos/ficha/the_secret_of_monkey_island-1689315.jpg',6),
('Tetris','Puzzles',NULL,NULL,NULL,'1989-01-01','NTSC','PAL','JPN','AUS','https://i11b.3djuegos.com/juegos/14147/tetris__original_/fotos/ficha/tetris__original_-3567021.jpg',1),
('Super Mario Land 2','Plataformas',NULL,NULL,NULL,'1993-01-01','NTSC','PAL','JPN','AUS','https://media.vandal.net/m/14910/super-mario-land-2-6-golden-coins-cv-201423192846_1.jpg',1),
('Super Mario Land','Plataformas',NULL,NULL,NULL,'1990-01-01','NTSC','PAL','JPN','AUS','https://media.vandal.net/m/14468/super-mario-land-cv-2018912175518_5.jpg',1),
('Doom','Shooter',NULL,NULL,NULL,'1993-01-01','NTSC','PAL','JPN','AUS','https://uvejuegos.com/img/caratulas/4444/Doom-SNES-EEUU.jpg',7),
('Ninja Gaiden','Plataformas',NULL,NULL,NULL,'1988-01-01','NTSC','PAL','JPN','AUS','https://vignette.wikia.nocookie.net/videojuego/images/7/78/Ninja_Gaiden_-_Portada.jpg/revision/latest?cb=20100428021733',8),
('Earthbound','Rol',NULL,NULL,NULL,'1995-01-01','NTSC','PAL','JPN','AUS','https://vignette.wikia.nocookie.net/earthboundla/images/f/f2/Car%C3%A1tula_de_EarthBound.jpg/revision/latest?cb=20190124162909&path-prefix=es',1),
('Ratchet & Clank 2','Acción',NULL,NULL,NULL,'2003-01-01','NTSC','PAL','JPN','AUS','https://www.caratulas.com/juegos/caratulas/R/Ratchet_And_Clank-DVD-PS2.jpg',9),
('Zombies Ate My Neighbors','Shooter',NULL,NULL,NULL,'1993-01-01','NTSC','PAL','JPN','AUS','https://uvejuegos.com/img/caratulas/4514/Zombies-Ate-My-Neighbors-EU.jpg',9),
('The Legend of Zelda: Wind Waker','Aventuras',NULL,NULL,NULL,'2003-01-01','NTSC','PAL','JPN','AUS','https://i.neoseeker.com/boxshots/R2FtZXMvR2FtZUN1YmUvQWN0aW9uL0FkdmVudHVyZQ==/the_legend_of_zelda_the_wind_waker_frontcover_large_kzrY1FUQLVqI5g1.jpg',1),
('Xenogears','Rol',NULL,NULL,NULL,'1998-01-01','NTSC','PAL','JPN','AUS','https://i11b.3djuegos.com/juegos/7258/xenogears/fotos/ficha/xenogears-1727065.jpg',11),
('Final Fantasy VII','Rol',NULL,NULL,NULL,'1997-01-01','NTSC','PAL','JPN','AUS','https://media.vandal.net/m/1436/final-fantasy-vii-20161062139_1.jpg',10),
('Final Fantasy X','Rol',NULL,NULL,NULL,'2001-01-01','NTSC','PAL','JPN','AUS','https://media.vandal.net/m/67/final-fantasy-x-201961314145961_1.jpg',10),
('Mother 3','Rol',NULL,NULL,NULL,'2006-01-01','NTSC','PAL','JPN','AUS','https://3.bp.blogspot.com/-JfGeKVN3rno/VnIX7w2O5LI/AAAAAAAADOc/N3j3ZAct3S4/s1600/Mother-1%252B2.png',1),
('Wario World','Plataformas',NULL,NULL,NULL,'2004-01-01','NTSC','PAL','JPN','AUS','https://i11b.3djuegos.com/juegos/7044/wario_world/fotos/ficha/wario_world-1725921.jpg',1),
('Balloon Fight','Plataformas',NULL,NULL,NULL,'1986-01-01','NTSC','PAL','JPN','AUS','https://images.wikidexcdn.net/mwuploads/esssbwiki/thumb/e/ee/latest/20120723203838/Car%C3%A1tula_Balloon_Fight.jpg/200px-Car%C3%A1tula_Balloon_Fight.jpg',10),
('Ice Climbers','Plataformas',NULL,NULL,NULL,'1985-01-01','NTSC','PAL','JPN','AUS','https://vignette.wikia.nocookie.net/iceclimbers/images/2/22/Ice_Climber_Caratula_norteamericana.jpg/revision/latest/scale-to-width-down/340?cb=20130802213515&path-prefix=es',6),
('Excitebike','Carreras',NULL,NULL,NULL,'1985-01-01','NTSC','PAL','JPN','AUS','https://i.pinimg.com/originals/ae/42/26/ae42262c49d4beaf0294b86013bd82b7.jpg',7),
('Super Mario World 2: Yoshi’s Island','Plataformas',NULL,NULL,NULL,'1995-01-01','NTSC','PAL','JPN','AUS','https://media.vandal.net/m/788/super-mario-advance-2-super-mario-world-201961114142616_1.jpg',1);
