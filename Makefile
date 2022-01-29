.PHONY: pg dump import

PG_CONTAINER_NAME = prof-postgre
PHP_CONTAINER_NAME = prof-php
NGINX_CONTAINER_NAME = prof-nginx
DB_NAME = prof_db
PG_USER = root
PG_PASS = root

EXEC_PG = docker exec -it $(PG_CONTAINER_NAME) bash
EXEC_PHP = docker exec -it $(PHP_CONTAINER_NAME) bash
EXEC_NGINX = docker exec -it $(NGINX_CONTAINER_NAME) bash

pg_container:
	$(EXEC_PG)

dump:
	pg_dump $(DB_NAME) > dump/new_dump.sql

import:
	psql $(DB_NAME) < dump/new_dump.sql

php_container:
	$(EXEC_PHP)

nginx_container:
	$(EXEC_NGINX)
