INSERT INTO `EMPRESA` (
    `ID_EMPRESA`, 
    `NOMBRE_EMPRESA`, 
    `PAIS`
) 

VALUES ('1', 'Nintendo', 'Japon');

INSERT INTO `DISTRIBUIDORA` ( 
    `ID_DISTRIBUIDORA`, 
    `ID_EMPRESA`
) 
VALUES ('1', '1');

INSERT INTO `DESARROLLADORA` ( 
    `ID_DESARROLLADORA`, 
    `ID_EMPRESA`
) 
VALUES ('1','1');

INSERT INTO `JUEGO` (
    `ID_JUEGO`,
    `NOMBRE`,
    `GENERO1`,
    `GENERO2`, 
    `GENERO3`, 
    `GENERO4`, 
    `FECHA_PUBLICACION`,
    `REGION1`,
    `REGION2`, 
    `REGION3`, 
    `REGION4`,
    `CARATULA`, 
    `ID_DESARROLLADORA`
) 
VALUES ('1', 'Pokemon Amarillo', 'AVENTURAS', 'ROL', NULL, NULL, '1998-09-12', 'Japon', NULL, NULL, NULL, 'img/PAmarillo.jpg', '1');
INSERT INTO `JUEGO` (
    `ID_JUEGO`,
    `NOMBRE`,
    `GENERO1`,
    `GENERO2`, 
    `GENERO3`, 
    `GENERO4`, 
    `FECHA_PUBLICACION`,
    `REGION1`,
    `REGION2`, 
    `REGION3`, 
    `REGION4`,
    `CARATULA`, 
    `ID_DESARROLLADORA`
) 
VALUES ('2', 'Super Mario 64', 'AVENTURAS', NULL, NULL, NULL, '1996-05-23', 'Japon', NULL, NULL, NULL, 'img/supermario.jpg', '1');