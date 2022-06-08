PHPROOT = docker exec -it --user "$(id -u):$(id -g)" --workdir="/var/www" tulia-docs_php
PHPROOTBUILD = docker exec -it --user "$(id -u):$(id -g)" --workdir="/var/www/_build" tulia-docs_php

build:
	docker-compose build --build-arg USER_ID=1000 --build-arg GROUP_ID=1000

up:
	docker-compose up -d --no-build && echo 'Docs are available on http://localhost:40404/'

down:
	docker-compose stop

restart:
	docker-compose restart

install:
	$(PHPROOT) composer install \
	&& $(PHPROOT) npm i chokidar \
	&& $(PHPROOT) cd public/docs \
	&& $(PHPROOT) npm install

bash:
	$(PHPROOT) /bin/bash

generate:
	$(PHPROOT) php bin/console docs:generate

watch:
	$(PHPROOT) php bin/console docs:watch

build-production:
	$(PHPROOT) php _build.php \
	&& $(PHPROOTBUILD) composer install --no-dev --optimize-autoloader \
	&& $(PHPROOTBUILD) php bin/console cache:clear --env=prod -q \
	&& echo 'Creating tulia-docs-build.zip zip package...' \
	&& zip -rq tulia-docs-build.zip _build/ \
	&& $(PHPROOT) rm -rf _build \
	&& echo 'Project building complete.'

.SILENT:
