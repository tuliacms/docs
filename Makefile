build:
	docker-compose build --no-cache --build-arg USER_ID=1000 --build-arg GROUP_ID=1000

up:
	docker-compose up -d --no-build && echo 'Docs are available after compiling on http://localhost:40402/'

down:
	docker-compose stop

restart:
	docker-compose restart

install:
	docker exec -it tulia_docs_www --work-dir="/var/www" "composer -v"

bash:
	docker exec -it --user "$(id -u):$(id -g)" tulia_docs_www /bin/bash

compile:


.SILENT:
