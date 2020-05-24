CREATE DATABASE RETROPANDA;
USE RETROPANDA;

CREATE TABLE EMPRESA (
	ID_EMPRESA SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL,
	NOMBRE_EMPRESA VARCHAR(30) NOT NULL,
	PAIS VARCHAR(50) NOT NULL
);

CREATE TABLE DESARROLLADORA (
	ID_DESARROLLADORA SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL,
	ID_EMPRESA SMALLINT(5) UNSIGNED NOT NULL,
	
	FOREIGN KEY (ID_EMPRESA) REFERENCES EMPRESA(ID_EMPRESA)
);

CREATE TABLE DISTRIBUIDORA (
	ID_DISTRIBUIDORA SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL,
	ID_EMPRESA SMALLINT(5) UNSIGNED NOT NULL,
	
	FOREIGN KEY (ID_EMPRESA) REFERENCES EMPRESA(ID_EMPRESA)
);

CREATE TABLE PLATAFORMA (
	ID_PLATAFORMA SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL,
	NOMBRE VARCHAR(20) NOT NULL,
	REGION VARCHAR(50) NOT NULL
);

CREATE TABLE JUEGO (
	ID_JUEGO SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL,
	NOMBRE VARCHAR(30) NOT NULL,
	GENERO1 ENUM ('Acción','Shooter','Estrategia','Simulacion','Deportes','Carreras','Aventuras','Rol') NOT NULL,
	GENERO2 ENUM ('Acción','Shooter','Estrategia','Simulacion','Deportes','Carreras','Aventuras','Rol') NULL,
	GENERO3 ENUM ('Acción','Shooter','Estrategia','Simulacion','Deportes','Carreras','Aventuras','Rol') NULL,
	GENERO4 ENUM ('Acción','Shooter','Estrategia','Simulacion','Deportes','Carreras','Aventuras','Rol') NULL,
	FECHA_PUBLICACION DATE NULL,
	REGION1 VARCHAR(50) NOT NULL,
	REGION2 VARCHAR(50) NULL,
	REGION3 VARCHAR(50) NULL,
	REGION4 VARCHAR(50) NULL,
	CARATULA VARCHAR(200) NOT NULL,
	ID_DESARROLLADORA SMALLINT(5) UNSIGNED NOT NULL,
	
	FOREIGN KEY (ID_DESARROLLADORA) REFERENCES DESARRolLADORA(ID_DESARROLLADORA)
);

CREATE TABLE USUARIO (
	ID_USUARIO SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL,
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
	VARORACION TINYINT (3) UNSIGNED NOT NULL,
	
	FOREIGN KEY (ID_JUEGO) REFERENCES JUEGO(ID_JUEGO),
	FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID_USUARIO)
	
);

CREATE TABLE NOTICIAS (
	ID_NOTICIAS SMALLINT(5) UNSIGNED PRIMARY KEY NOT NULL,
	FECHA DATE NULL
);

CREATE TABLE LANZAMIENTOS_PROXIMOS (
	ID_JUEGO SMALLINT(5) UNSIGNED NOT NULL,
	FECHA_LANZAMIENTOS DATE NULL,
	
	FOREIGN KEY (ID_JUEGO) REFERENCES JUEGO(ID_JUEGO)
);

--Datos
INSERT INTO EMPRESA (
	ID_EMPRESA, 
	NOMBRE_EMPRESA,
	PAIS
)
VALUES
(1,"Nintendo",'Japon'),
(2,"Nintendo",'Japon'),
(3,"Nintendo",'Japon'),
(4,"Nintendo",'Japon'),
(5,"Nintendo",'Japon'),
(6,"Konami",'Japon'),
(7,"Konami",'Japon'),
(8,"Etranges Libellules",'EEUU'),
(9,"Rareware",'EEUU'),
(10,"Nintendo",'Japon'),
(11,"SEGA",'Japon'),
(12,"SEGA",'Japon'),
(13,"LucasArts",'EEUU'),
(14,"Nintendo",'Japon'),
(15,"Nintendo",'Japon'),
(16,"Nintendo",'Japon'),
(17,"id Software",'EEUU'),
(18,"Tecmo",'Japon'),
(19,"Ape Studios",'EEUU'),
(20,"Insomniac Games",'EEUU'),
(21,"LucasArts",'EEUU'),
(22,"Nintendo",'Japon'),
(23,"Squaresoft",'Japon'),
(24,"Squaresoft",'Japon'),
(25,"Squaresoft",'Japon'),
(26,"Nintendo",'Japon'),
(27,"Nintendo",'Japon'),
(28,"Nintendo",'Japon'),
(29,"Nintendo",'Japon'),
(30,"Nintendo",'Japon'),
(31,"Nintendo",'Japon');


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
(11,11),
(12,12),
(13,13),
(14,14),
(15,15),
(16,16),
(17,17),
(18,18),
(19,19),
(20,20),
(21,21),
(22,22),
(23,23),
(24,24),
(25,25),
(26,26),
(27,27),
(28,28),
(29,29),
(30,30),
(31,31);

INSERT INTO DISTRIBUIDORA (
	ID_DISTRIBUIDORA,
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
(11,11),
(12,12),
(13,13),
(14,14),
(15,15),
(16,16),
(17,17),
(18,18),
(19,19),
(20,20),
(21,21),
(22,22),
(23,23),
(24,24),
(25,25),
(26,26),
(27,27),
(28,28),
(29,29),
(30,30),
(31,31);

INSERT INTO PLATAFORMA (
	ID_PLATAFORMA,
	NOMBRE,
	REGION
)
VALUES
(1,'SNES','NTSC/EEUU'),
(2,'NES','PAL/EU'),
(3,'SNES','PAL/EU'),
(4,'GAME BOY','PAL/España'),
(5,'NINTENDO 64','PAL/EU'),
(6,'PLAYSTATION','PAL/España'),
(7,'PLAYSTATION 2','PAL/EU'),
(8,'PLAYSTATION','PAL/EU'),
(9,'SNES','PAL/EU'),
(10,'SNES','PAL/EU'),
(11,'SEGA MEGA DRIVE','NTSC/EEUU'),
(12,'SEGA MEGA DRIVE','PAL/EU'),
(13,'PC','PAL/España'),
(14,'GAME BOY','NTSC/EEUU'),
(15,'GAME BOY','PAL/EU'),
(16,'GAME BOY','PAL/EU'),
(17,'PC','NTSC/EEUU'),
(18,'NES','NTSC/EEUU'),
(19,'SNES','NTSC/EEUU'),
(20,'PLAYSTATION 2','PAL/EU'),
(21,'SNES','NTSC/EEUU'),
(22,'GAMECUBE','PAL/EU'),
(23,'PLAYSTATION','NTSC/EEUU'),
(24,'PLAYSTATION','PAL/EU'),
(25,'PLAYSTATION 2','PAL/EU'),
(26,'GAME BOY ADVANCE','NTSC/J'),
(27,'GAMECUBE','NTSC/EEUU'),
(28,'NES','NTSC/EEUU'),
(29,'NES','NTSC/EEUU'),
(30,'NES','NTSC/EEUU'),
(31,'SNES','NTSC/EEUU');



INSERT INTO JUEGO (
	ID_JUEGO,
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
(1,'Super Mario World','Plataformas',NULL,NULL,NULL,'1991-01-01','America',NULL,NULL,NULL,'https://images-na.ssl-images-amazon.com/images/I/71IFenZVQ1L._SL1343_.jpg',1),
(2,'Super Mario Bros','Plataformas',NULL,NULL,NULL,'1987-01-01','EU',NULL,NULL,NULL,'https://i.ytimg.com/vi/VB6KbX_Bt7M/hqdefault.jpg',2),
(3,'Super Metroid','Acción',NULL,NULL,NULL,'1994-01-01','EU',NULL,NULL,NULL,'https://uvejuegos.com/img/caratulas/846/Super-Metroid-SNES-EU.jpg',3),
(4,'Pokémon Edición Amarilla: Edición Especial Pikachu','Rol',NULL,NULL,NULL,'2000-01-01','EU',NULL,NULL,NULL,'https://vignette.wikia.nocookie.net/dreampkmn/images/a/a5/Car%C3%A1tula_Pok%C3%A9mon_Amarillo.png/revision/latest/scale-to-width-down/340?cb=20130313213339&path-prefix=es',4),
(5,'The Legend of Zelda: Ocarina of Time','Aventura',NULL,NULL,NULL,'1998-01-01','EU',NULL,NULL,NULL,'https://media.redadn.es/imagenes/the-legend-of-zelda-ocarina-of-time-wii_80400_pn.jpg',5),
(6,'Metal Gear Solid','Acción',NULL,NULL,NULL,'1998-01-01','EU',NULL,NULL,NULL,'https://i11b.3djuegos.com/juegos/3871/metal_gear_solid/fotos/ficha/metal_gear_solid-2200281.jpg',6),
(7,'Metal Gear Solid 2: Sons of Liberty','Acción',NULL,NULL,NULL,'2002-01-01','EU',NULL,NULL,NULL,'https://media.vandal.net/t200/1246/2003429211948_1.jpg',7),
(8,'Spyro The Dragon','Aventura',NULL,NULL,NULL,'1998-01-01','EU',NULL,NULL,NULL,'https://i11b.3djuegos.com/juegos/7004/spyro_the_dragon/fotos/ficha/spyro_the_dragon-1725665.jpg',8),
(9,'Donkey Kong Country','Plataformas',NULL,NULL,NULL,'1994-01-01','EU',NULL,NULL,NULL,'https://i11b.3djuegos.com/juegos/9285/donkey_kong_country/fotos/ficha/donkey_kong_country-2108021.jpg',9),
(10,'The Legend of Zelda: A Link to the Past','Aventura',NULL,NULL,NULL,'1991-01-01','EU',NULL,NULL,NULL,'https://i11a.3djuegos.com/juegos/5271/the_legend_of_zelda__a_link_to_the_past/fotos/ficha/the_legend_of_zelda__a_link_to_the_past-1698112.jpg',10),
(11,'Sonic The Hedgehog','Plataformas',NULL,NULL,NULL,'1991-01-01','America',NULL,NULL,NULL,'https://i11d.3djuegos.com/juegos/9983/sonic_the_hedgehog__cl_sico_/fotos/ficha/sonic_the_hedgehog__cl_sico_-2269715.jpg',11),
(12,'Sonic The Hedgehog 2','Plataformas',NULL,NULL,NULL,'1992-01-01','EU',NULL,NULL,NULL,'https://uvejuegos.com/img/caratulas/1979/Sonic-the-Hedgehog-2-MD-EU.jpg',12),
(13,'The Secret of Monkey Island','Aventura',NULL,NULL,NULL,'1990-01-01','EU',NULL,NULL,NULL,'https://i11d.3djuegos.com/juegos/3236/the_secret_of_monkey_island/fotos/ficha/the_secret_of_monkey_island-1689315.jpg',13),
(14,'Tetris','Puzzles',NULL,NULL,NULL,'1989-01-01','America',NULL,NULL,NULL,'https://i11b.3djuegos.com/juegos/14147/tetris__original_/fotos/ficha/tetris__original_-3567021.jpg',14),
(15,'Super Mario Land 2','Plataformas',NULL,NULL,NULL,'1993-01-01','EU',NULL,NULL,NULL,'https://media.vandal.net/m/14910/super-mario-land-2-6-golden-coins-cv-201423192846_1.jpg',15),
(16,'Super Mario Land','Plataformas',NULL,NULL,NULL,'1990-01-01','EU',NULL,NULL,NULL,'https://media.vandal.net/m/14468/super-mario-land-cv-2018912175518_5.jpg',16),
(17,'Doom','Shooter',NULL,NULL,NULL,'1993-01-01','America',NULL,NULL,NULL,'https://uvejuegos.com/img/caratulas/4444/Doom-SNES-EEUU.jpg',17),
(18,'Ninja Gaiden','Plataformas',NULL,NULL,NULL,'1988-01-01','America',NULL,NULL,NULL,'https://vignette.wikia.nocookie.net/videojuego/images/7/78/Ninja_Gaiden_-_Portada.jpg/revision/latest?cb=20100428021733',18),
(19,'Earthbound','Rol',NULL,NULL,NULL,'1995-01-01','America',NULL,NULL,NULL,'https://vignette.wikia.nocookie.net/earthboundla/images/f/f2/Car%C3%A1tula_de_EarthBound.jpg/revision/latest?cb=20190124162909&path-prefix=es',19),
(20,'Ratchet & Clank 2','Acción',NULL,NULL,NULL,'2003-01-01','EU',NULL,NULL,NULL,'https://www.caratulas.com/juegos/caratulas/R/Ratchet_And_Clank-DVD-PS2.jpg',20),
(21,'Zombies Ate My Neighbors','Shooter',NULL,NULL,NULL,'1993-01-01','America',NULL,NULL,NULL,'https://uvejuegos.com/img/caratulas/4514/Zombies-Ate-My-Neighbors-EU.jpg',21),
(22,'The Legend of Zelda: Wind Waker','Aventura',NULL,NULL,NULL,'2003-01-01','EU',NULL,NULL,NULL,'https://i.neoseeker.com/boxshots/R2FtZXMvR2FtZUN1YmUvQWN0aW9uL0FkdmVudHVyZQ==/the_legend_of_zelda_the_wind_waker_frontcover_large_kzrY1FUQLVqI5g1.jpg',22),
(23,'Xenogears','Rol',NULL,NULL,NULL,'1998-01-01','America',NULL,NULL,NULL,'https://i11b.3djuegos.com/juegos/7258/xenogears/fotos/ficha/xenogears-1727065.jpg',23),
(24,'Final Fantasy VII','Rol',NULL,NULL,NULL,'1997-01-01','EU',NULL,NULL,NULL,'https://media.vandal.net/m/1436/final-fantasy-vii-20161062139_1.jpg',24),
(25,'Final Fantasy X','Rol',NULL,NULL,NULL,'2001-01-01','EU',NULL,NULL,NULL,'https://media.vandal.net/m/67/final-fantasy-x-201961314145961_1.jpg',25),
(26,'Mother 3','Rol',NULL,NULL,NULL,'2006-01-01','Japon',NULL,NULL,NULL,'https://3.bp.blogspot.com/-JfGeKVN3rno/VnIX7w2O5LI/AAAAAAAADOc/N3j3ZAct3S4/s1600/Mother-1%252B2.png',26),
(27,'Wario World','Plataformas',NULL,NULL,NULL,'2004-01-01','America',NULL,NULL,NULL,'https://i11b.3djuegos.com/juegos/7044/wario_world/fotos/ficha/wario_world-1725921.jpg',27),
(28,'Balloon Fight','Plataformas',NULL,NULL,NULL,'1986-01-01','America',NULL,NULL,NULL,'https://images.wikidexcdn.net/mwuploads/esssbwiki/thumb/e/ee/latest/20120723203838/Car%C3%A1tula_Balloon_Fight.jpg/200px-Car%C3%A1tula_Balloon_Fight.jpg',28),
(29,'Ice Climbers','Plataformas',NULL,NULL,NULL,'1985-01-01','America',NULL,NULL,NULL,'https://vignette.wikia.nocookie.net/iceclimbers/images/2/22/Ice_Climber_Caratula_norteamericana.jpg/revision/latest/scale-to-width-down/340?cb=20130802213515&path-prefix=es',29),
(30,'Excitebike','Carreras',NULL,NULL,NULL,'1985-01-01','America',NULL,NULL,NULL,'https://i.pinimg.com/originals/ae/42/26/ae42262c49d4beaf0294b86013bd82b7.jpg',30),
(31,'Super Mario World 2: Yoshi’s Island','Plataformas',NULL,NULL,NULL,'1995-01-01','America',NULL,NULL,NULL,'https://media.vandal.net/m/788/super-mario-advance-2-super-mario-world-201961114142616_1.jpg',31);




INSERT INTO USUARIO (
	EMAIL,
	USERNAME,
	CONTRASEÑA,
	BIOGRAFIA
)
VALUES
('starwarsmejorqharrypotter@gmail.com','Moon','12345',NULL);


INSERT INTO PLATAFORMA_JUEGO (
	ID_JUEGO,
	ID_PLATAFORMA
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
(11,11),
(12,12),
(13,13),
(14,14),
(15,15),
(16,16),
(17,17),
(18,18),
(19,19),
(20,20),
(21,21),
(22,22),
(23,23),
(24,24),
(25,25),
(26,26),
(27,27),
(28,28),
(29,29),
(30,30),
(31,31);

INSERT INTO JUEGO_USUARIO_COMPRADO (
	ID_JUEGO,
	ID_USUARIO
)
VALUES
(1,0),
(2,0),
(3,0),
(4,0),
(5,0),
(6,0),
(7,0),
(8,0),
(9,0),
(10,0),
(11,0),
(12,0),
(13,0),
(14,0),
(15,0),
(16,0),
(17,0),
(18,0),
(19,0),
(20,0),
(21,0),
(22,0),
(23,0),
(24,0),
(25,0),
(26,0),
(27,0),
(28,0),
(29,0),
(30,0),
(31,0);

INSERT INTO JUEGO_USUARIO_WISHLIST (
	ID_JUEGO,
	ID_USUARIO
)
VALUES
(1,0),
(2,0),
(3,0),
(4,0),
(5,0),
(6,0),
(7,0),
(8,0),
(9,0),
(10,0),
(11,0),
(12,0),
(13,0),
(14,0),
(15,0),
(16,0),
(17,0),
(18,0),
(19,0),
(20,0),
(21,0),
(22,0),
(23,0),
(24,0),
(25,0),
(26,0),
(27,0),
(28,0),
(29,0),
(30,0),
(31,0);


INSERT INTO VALORACION_JUEGO_USUARIO (
	ID_JUEGO,
	ID_USUARIO,
	VARORACION
)
VALUES
(1,0,'7/10'),
(2,0,'8/10'),
(3,0,'9/10'),
(4,0,'7/10'),
(5,0,'8/10'),
(6,0,'6/10'),
(7,0,'7/10'),
(8,0,'7/10'),
(9,0,'7/10'),
(10,0,'8/10'),
(11,0,'7/10'),
(12,0,'5/10'),
(13,0,'6/10'),
(14,0,'8/10'),
(15,0,'8/10'),
(16,0,'6/10'),
(17,0,'7/10'),
(18,0,'9/10'),
(19,0,'10/10'),
(20,0,'10/10'),
(21,0,'5/10'),
(22,0,'7/10'),
(23,0,'6/10'),
(24,0,'6/10'),
(25,0,'5/10'),
(26,0,'8/10'),
(27,0,'9/10'),
(28,0,'9/10'),
(29,0,'7/10'),
(30,0,'7/10'),
(31,0,'9/10');


INSERT INTO NOTICIAS (
	ID_NOTICIAS,
	FECHA
)
VALUES
(1,'2000-01-01'),
(2,'1995-01-01'),
(3,'1993-01-01');


INSERT INTO LANZAMIENTOS_PROXIMOS (
	ID_JUEGO,
	FECHA_LANZAMIENTOS
)
VALUES
(30,NULL),
(22,'2020-06-21'),
(15,'2021-09-12');
	
