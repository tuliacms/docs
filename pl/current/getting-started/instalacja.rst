Instalacja
==========

Dowiesz się jak w kilku krokach zainstalować system Tulia CMS lokalnie, by móc rozpocząć pracę.
Potrzebny Ci będzie:

- Dostęp do terminala
- Docker
- Git

1. Instalacja projektu
######################

Zainstaluj projekt w wybranym katalogu, za pomocą Composera:

.. code-block:: terminal

    $ git clone --depth=1 https://github.com/tuliacms/tuliacms.git my_project_name && rm ./.git -rf
    $ cd my_project_name

System zostanie sklonowany i umieszczony w katalogu ``my_project_name``.

2. Konfiguracja systemu
#######################

Gdy wszystko jest zainstalwoane, pozostaje już tylko konfiguracja systemu. Wykonaj poniższe polecenie
i odpowiedz na pytania, które umożliwią Ci wstępne skonfigurowanie i uruchomienie systemu.

.. code-block:: terminal

    $ make setup

########################

System dostępny jest domyślnie pod adresem http://localhost/.

.. tip:: Wskazówka
    Możesz localnie używać systemu pod domeną http://tulia.loc/. Aby to zrobić wykonaj poniższe
    polecenie, które zainstaluje lokalnie dostęp do domeny ``tulia.loc``.

    .. code-block:: terminal

        $ make install-hosts

Zatrzymanie kontenerów
######################

Gdy skończysz pracę z systemem, lub chcesz przepiąć się na inną instancję, wykonaj poniższe
polecenie by zatrzymać kontenery aktualnej instancji:

.. code-block:: terminal

    $ make down

Czytaj więcej
#############

- :doc:`Wszystkie polecenia make <lista-polecen-make>`

