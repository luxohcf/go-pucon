/* Deletes */
DELETE FROM TBL_IMAGEN;
DELETE FROM TBL_ACTIVIDAD;
DELETE FROM TBL_TIPO_ACTIVIDAD;


/* Tipos de actividad */
INSERT INTO TBL_TIPO_ACTIVIDAD (ID_TIPO_ACTIVIDAD, NOMBRE_TIPO_ATIVIDAD) VALUES (1, 'Actividad');
INSERT INTO TBL_TIPO_ACTIVIDAD (ID_TIPO_ACTIVIDAD, NOMBRE_TIPO_ATIVIDAD) VALUES (2, 'Publicidad Interna');
INSERT INTO TBL_TIPO_ACTIVIDAD (ID_TIPO_ACTIVIDAD, NOMBRE_TIPO_ATIVIDAD) VALUES (3, 'Publicidad Externa');

/* Actividades */

INSERT INTO TBL_ACTIVIDAD 
(ID_ACTIVIDAD, ID_TIPO_ACTIVIDAD, NOMBRE_ACTIVIDAD, RESUMEN, DESCRIPCION, IMAGEN_RESUMEN, IMAGEN_RESUMEN_CHICA, URL_WEB,  ACTIVA) 
VALUES 
(1, 1, 'Pucon Rafting', 'Ejecutamos dos tramos del río Trancura (Trancura alto grado IV, y Trancura baj grado III).', 
'<p>Ejecutamos dos tramos del río Trancura (Trancura alto grado IV, y Trancura baj grado III).</p><h4>Requisitos:</h4><ul><li>Mayores de 8 años (Trancura bajo)</li><li>Muda de ropa liviana</li><li>Mayores de 14 años (Trancura alto)</li></ul><h4>Incluye:</h4><ul><li>Seguros de turismo aventura </li><li>Kayak de seguridad</li><li>Guía de rafting especializado</li><li>Equipo de río completo </li><li>Traslado ida y vuelta</li></ul><h4>Precios por persona: </h4><ul><li>Trancura bajo $15.000</li><li>Trancura alto $23.000</li></ul>'
, 'imagenes/1/principal.png'
, 'imagenes/1/principal_chica.png'
, 'detalleActividad.php?id=1'
, 1);

/* imagenes */
INSERT INTO TBL_IMAGEN (ID_ACTIVIDAD, URL_IMAGEN, ES_PRINCIPAL) VALUES (1, 'imagenes/1/principal.png', 1);
INSERT INTO TBL_IMAGEN (ID_ACTIVIDAD, URL_IMAGEN, ES_PRINCIPAL) VALUES (1, 'imagenes/1/principal_chica.png', 0);

INSERT INTO TBL_ACTIVIDAD 
(ID_ACTIVIDAD, ID_TIPO_ACTIVIDAD, NOMBRE_ACTIVIDAD, RESUMEN, DESCRIPCION, IMAGEN_RESUMEN, IMAGEN_RESUMEN_CHICA, URL_WEB,  ACTIVA) 
VALUES 
(2, 1, 'Ascenso Volcan Villarrica', 'atractivo y desafiante ascenso a la cumbre del Volcán Villarrica, actividad que parte desde nuestra agencia a las 06:30 a.m.', 
'<p>Ejecutamos dos tramos del río Trancura (Trancura alto grado IV, y Trancura baj grado III).</p><h4>Requisitos:</h4><ul><li>Mayores de 8 años (Trancura bajo)</li><li>Muda de ropa liviana</li><li>Mayores de 14 años (Trancura alto)</li></ul><h4>Incluye:</h4><ul><li>Seguros de turismo aventura </li><li>Kayak de seguridad</li><li>Guía de rafting especializado</li><li>Equipo de río completo </li><li>Traslado ida y vuelta</li></ul><h4>Precios por persona: </h4><ul><li>Trancura bajo $15.000</li><li>Trancura alto $23.000</li></ul>'
, 'imagenes/2/principal.png'
, 'imagenes/2/principal_chica.png'
, 'detalleActividad.php?id=2'
, 1);

INSERT INTO TBL_ACTIVIDAD 
(ID_ACTIVIDAD, ID_TIPO_ACTIVIDAD, NOMBRE_ACTIVIDAD, RESUMEN, DESCRIPCION, IMAGEN_RESUMEN, IMAGEN_RESUMEN_CHICA, URL_WEB,  ACTIVA) 
VALUES 
(3, 1, 'Pucon Cabalgatas', 'atractivo y desafiante ascenso a la cumbre del Volcán Villarrica, actividad que parte desde nuestra agencia a las 06:30 a.m.', 
'<p>Ejecutamos dos tramos del río Trancura (Trancura alto grado IV, y Trancura baj grado III).</p><h4>Requisitos:</h4><ul><li>Mayores de 8 años (Trancura bajo)</li><li>Muda de ropa liviana</li><li>Mayores de 14 años (Trancura alto)</li></ul><h4>Incluye:</h4><ul><li>Seguros de turismo aventura </li><li>Kayak de seguridad</li><li>Guía de rafting especializado</li><li>Equipo de río completo </li><li>Traslado ida y vuelta</li></ul><h4>Precios por persona: </h4><ul><li>Trancura bajo $15.000</li><li>Trancura alto $23.000</li></ul>'
, 'imagenes/3/principal.png'
, 'imagenes/3/principal_chica.png'
, 'detalleActividad.php?id=3'
, 1);

/* Publicidad Interna */

INSERT INTO TBL_ACTIVIDAD 
(ID_ACTIVIDAD, ID_TIPO_ACTIVIDAD, NOMBRE_ACTIVIDAD, RESUMEN, DESCRIPCION, IMAGEN_RESUMEN, IMAGEN_RESUMEN_CHICA, URL_WEB,  ACTIVA) 
VALUES 
(4, 2, 'Pucon Cabalgatas', 'atractivo y desafiante ascenso a la cumbre del Volcán Villarrica, actividad que parte desde nuestra agencia a las 06:30 a.m.', 
'<p>Ejecutamos dos tramos del río Trancura (Trancura alto grado IV, y Trancura baj grado III).</p><h4>Requisitos:</h4><ul><li>Mayores de 8 años (Trancura bajo)</li><li>Muda de ropa liviana</li><li>Mayores de 14 años (Trancura alto)</li></ul><h4>Incluye:</h4><ul><li>Seguros de turismo aventura </li><li>Kayak de seguridad</li><li>Guía de rafting especializado</li><li>Equipo de río completo </li><li>Traslado ida y vuelta</li></ul><h4>Precios por persona: </h4><ul><li>Trancura bajo $15.000</li><li>Trancura alto $23.000</li></ul>'
, 'imagenes/externa/6.png'
, null
, 'detalleActividad.php?id=4'
, 1);


/* Publicidad Externa */

INSERT INTO TBL_ACTIVIDAD 
(ID_ACTIVIDAD, ID_TIPO_ACTIVIDAD, NOMBRE_ACTIVIDAD, RESUMEN, DESCRIPCION, IMAGEN_RESUMEN, IMAGEN_RESUMEN_CHICA, URL_WEB,  ACTIVA) 
VALUES 
(5, 3, 'Pucon Cabalgatas', null, 
null
, 'imagenes/externa/5.png'
, null
, 'http://www.google.cl'
, 1);
