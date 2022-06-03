build:
	docker-compose build --no-cache --build-arg USER_ID=1000 --build-arg GROUP_ID=1000

up:
	docker-compose up -d --no-build && echo 'Docs are available on http://localhost:40402/'

down:
	docker-compose stop

restart:
	docker-compose restart

install:
	docker exec -it --user "$(id -u):$(id -g)" --workdir="/var/www" tulia-docs_php php composer.phar install

bash:
	docker exec -it --user "$(id -u):$(id -g)" --workdir="/var/www" tulia-docs_php /bin/bash

generate:
	docker exec -it --user "$(id -u):$(id -g)" --workdir="/var/www" tulia-docs_php php generate.php

.SILENT:
