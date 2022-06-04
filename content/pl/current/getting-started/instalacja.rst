Instalacja
==========

Dowiesz się jak zainstalować system Tulia CMS lokalnie na komputerze, by móc rozpocząć pracę.

Tulia Project Manager
#####################

Instalacja systemu odbywa się za pomocą Tulia Project Managera. Możesz go zainstalować lokalnie
za pomocą polecenia:

.. code-block:: terminal

    $ npm i -g tulia-project-manager

Tulia Project Manager pozwala na zarządzanie i przełączanie się pomiędzy lokalnymi wersjami
systemu (w sytuacji gdy lokalnie posiadasz więcej instancji), buduje i startuje kontenery
oraz pozwala wykonywać polecenia na tych kontenerach.

.. code-block:: tip

    Jeśli wykonałeś polecenie z nazwą katalogu w której instalacja ma się odbyć, pamiętaj
    by wejść do tego katalogu. Wszystkie poniższe polecenia należy wykonywać w katalogu
    w którym istnieje instancja systemu.

Tworzenie lokalnej instancji systemu
####################################

Aby pobrać i zainstalować Tulia CMS w wybranym katalogu, w terminalu wykonaj polecenie:

.. code-block:: terminal

    $ tulia init my_new_project

Polecenie to pobierze najnowszą wersję systemu i zainstaluje w katalogu `my_new_project`.
Jeśli chcesz by zainstalował w katalogu w którym wykonujesz polecenie, pomiń ten parametr.

Budowanie obrazu Docker
#######################

Aby zbudować obrazy kontenerów Docker, wykonaj następujące polecenie:

.. code-block:: terminal

    $ tulia build

Uruchomienie kontenerów/systemu
###############################

Wykonaj poniższe polecenie, aby wystartować kontenery z systemem:

.. code-block:: terminal

    $ tulia start

System dostępny jest domyślnie pod adresem http://localhost/. Możesz natomiast używać systemu
pod domeną http://tulia.loc/. Aby to zrobić wykonaj polecenie:

.. code-block:: terminal

    $ tulia install:hosts

Zatrzymanie kontenerów
######################

Gdy skończysz pracę z systemem, lub chcesz przepiąć się na inną instancję, wykonaj poniższe
polecenie by zatrzymać kontenery aktualnej instancji:

.. code-block:: terminal

    $ tulia stopfgh

Czytaj więcej
#############

sdfsdf

See :ref: `jak-pracowac-z-wieloma-instancjami-systemu`
:doc:`Jak pracować z wieloma instancjami systemu? <jak-pracowac-z-wieloma-instancjami-systemu>`

asd
adsasd
