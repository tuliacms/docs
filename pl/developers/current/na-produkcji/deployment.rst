Deployment
==========

Deployment systemu można przeprowadzić na kilka sposobów. Możesz użyć wbudowanego mechanizmu Deployera,
który automatyzuje cały proces deploymentu i publikacji strony na serwerze docelowym. Możesz ręcznie
przekopiować pliki na serwer docelowy. A możesz też wpiąć proces deploymentu w CD na przykład w Gitlabie
- nic trudnego - Tulia CMS jest oparty o Symfony, więc cały proces wygląda w większości tak samo jak każdej
aplikacji opartej na Symfony.

Konfiguracja dla środowiska produkcyjnego
#########################################

Tulia CMS wymaga, by na środowisku produkcyjnym istniał plik ``.env.prod``. Zawierać on powinien
zmienne środowiskowe dla środowiska produkcyjnego. Jest szczególnie wymagany dla Deployera - bez niego
deployer nie zadziała.

W pliku tym umieść konfigruację bazy danych i innych usług na środowisku prodykcyjnym. Dodatkowo pamiętaj
by ustawić prawidłowe zmienne ``APP_ENV=prod`` i ``APP_DEBUG=false``.

Deployer
########

`Deployer <https://deployer.org/>`_ to narzędzie napisane w języku PHP, które przeznaczone jest do
zautomatyzowania deploymentu małych i średnich aplikacji. Łączy się on z serwerem docelowym za pomocą
SSH i wykonuje deployment.

Jedną z jego zalet jest automatyzacja oraz zero-downtime deployment. Więcej informacji na jego temat
możesz poczytać na stronie `https://deployer.org <https://deployer.org/>`_. Jest to zalecana metoda
deploymentu, ponieważ Tulia CMS posiada już konfigurację deployera dla wielu hostingów współdzielonych.

Inicjacja Deployera
___________________

Aby skorzystać z deployera należy go zainicjować. Najpierw dodamy go do zależności projektu:

.. code-block:: terminal

    make composer require deployer/deployer

Teraz zainicjujemy deployer do pracy z systemem. Wykonaj poniższe polecenie i wybierz docelowy
hosting na którym będziesz serwerował aplikację.

.. code-block:: terminal

    make console make:deployer

.. tip:: Info

    Jeśli taki nie istnieje, wybierz opcję ``custom`` i ręcznie skonfiguruj deployer zgodnie z
    jego dokumentacją.

Wykonanie deploymentu
_____________________

Gdy mamy już skonfigurowany Deployer, przyszła pora na sam deployment. Aby go wykonać wystarczy odpalić
poniższe polecenie.

.. code-block:: terminal

    make deploy

.. tip:: Info

    Przy pierwszym deploymencie, gdy jeszcze nie ma struktury plików
    na serwerze i baza danych jest pusta, Deployer zapyta się czy chcesz zsynchronizować bazę
    bazę danych oraz pliki w katalogu ``/public``. Odpowiedz na te pytania ``Yes`` by Deployer wysłał
    aktualną wersję wszystkich danych z Twojego komputera na serwer docelowy. Przy każdym kolejnym
    deploymencie te dane nie będą synchronizowane.

Deploy ręczny i CD
##################

Aby wykonać deploy ręczny lub za pomocą narzędzi CD, należy kierować się dokumentacją
`Symfony <https://symfony.com/doc/current/deployment.html>`_. Jest jednak jedna rzecz,
którą należy wykonać dodatkowo. Jest to polecenie ``make console assets:publish``, które odpowiedzialne
jest za publikację zasobów/assetów systemowych i rozszerzeń do katalogu ``/public``.
