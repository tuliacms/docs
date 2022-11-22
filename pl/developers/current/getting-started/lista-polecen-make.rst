Lista poleceń ``make`` (Makefile)
=================================

Znajdziesz tutaj listę wszystkich dostępnych poleceń możliwych do wykonania za pomocą polecenia ``make``.

Docker/kontenery
----------------

- ``make build`` - Buduje kontenery aplikacji. Jeśli już są zbudowane, nie buduje ich na nowo.
- ``make rebuild`` - Przebudowuje kontenery aplikacji. Jeśli kontenery są już zbudowane, buduje je na nowo.
- ``make up`` - Podnosi kontenery, uruchamia serwer lokalny.
- ``make down`` - Ubija kontenery, wyłącza serwer lokalny.
- ``make restart`` - Restartuje kontenery.
- ``make bash`` - Loguje i przełącza do terminala wewnątrz kontenera PHP

System
------

- ``make composer ${args}`` - Uruchamia polecenie composera wewnątrz kontenera (np. ``make composer install``).
- ``make recreate-local-database`` - Przebudowuje lokalną bazę danych. Usuwa wszystkie tabele i dane przed zbudowaniem tabel na nowo.

Aplikacja
---------

- ``make cc`` - Czyści cache Symfony
- ``make console ${args}`` - Uruchamia polecenie na konsoli Symfony (np. ``make console cache:clear``).
- ``make setup`` - Uruchamia skrypt konfiguracyjny/pierwszego uruchomienia systemu.
