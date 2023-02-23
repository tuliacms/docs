Makefile commands
=================

Here you will find a list of all available commands that can be executed with the ``make`` command.

Docker/containers
-----------------

- ``make build`` - Builds application containers. If they are already built, it does not build them again.
- ``make rebuild`` - Rebuilds application containers. If the containers are already built, it builds them anew.
- ``make up`` - Picks up containers, starts local server.
- ``make down`` - Kills containers, shuts down the local server.
- ``make restart`` - Restarts containers.
- ``make bash`` - Opens bash in PHP container.

System
------

- ``make composer ${args}`` - Runs the composer command inside the PHP container (i.e. ``make composer install``).
- ``make recreate-local-database`` - Rebuilds the local database. Deletes all tables and data before rebuilding the tables.

Application
-----------

- ``make cc`` - Clear Symfony's cache
- ``make console ${args}`` - Runs a command on the Symfony console (np. ``make console cache:clear``).
- ``make setup`` - Runs the setup/first-boot script.
