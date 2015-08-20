### mediastar

#### Install mediastar  v2
Despues de instalar y configurar la base de datos.

#### SQL QUERY
ejecutar SQL: crear nueva categoria padre


	INSERT INTO ac_category (id, id_parent, name, created_at, updated_at, status)
	VALUES ('20', NULL, 'SOCIAL', NULL, NULL, '1'); 


agregar registros (social)

	INSERT INTO ac_category (id_parent, name, created_at, updated_at, status)
	VALUES ('20', 'facebook', NULL, NULL, '1');

	INSERT INTO ac_category (id_parent, name, created_at, updated_at, status)
	VALUES ('20', 'youtube', NULL, NULL, '1');

	INSERT INTO ac_category (id_parent, name, created_at, updated_at, status)
	VALUES ('20', 'twitter', NULL, NULL, '1');


	INSERT INTO ac_category (id_parent, name, created_at, updated_at, status)
	VALUES ('20', 'instagram', NULL, NULL, '1');


