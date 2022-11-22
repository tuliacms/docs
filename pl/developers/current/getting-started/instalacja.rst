Instalacja
==========

Dowiesz się jak w dwóch krokach zainstalować system Tulia CMS lokalnie, by móc rozpocząć pracę.
Aby móc pracować z Tulia CMS, upewnij się, że posiadasz zainstalowane poniższe wymagania.

.. tip:: Wymagania
    Potrzebny Ci będzie:

    - Git
    - Docker + Docker Compose 2.*
    - Dostęp do terminala

1. Instalacja projektu
######################

Sklonuj projekt do wybranego katalogu, za pomocą Gita:

.. code-block:: terminal

    $ git clone --depth=1 https://github.com/tuliacms/tuliacms.git && rm ./tuliacms/.git -rf
    $ cd tuliacms

2. Konfiguracja systemu
#######################

Wykonaj poniższe polecenie i odpowiedz na pytania, które umożliwią Ci wstępne skonfigurowanie
i uruchomienie systemu.

.. code-block:: terminal

    $ make setup

3. Gotowe
#######################

System dostępny jest pod adresem http://localhost/.

Czytaj więcej
_____________

- :doc:`Wszystkie polecenia make <lista-polecen-make>`
