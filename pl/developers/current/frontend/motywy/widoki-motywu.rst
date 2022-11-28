Widoki motywu
=============

Widoki motywów używają Twiga_ do renderowania treści. Pliki widoków mają rozszerzenie ``.tpl``.
Dowiesz się tutaj jak budować widoki, wywoływać je i renderować w motywie.

.. tip:: Info

    Informacje w tym artykule zakładają, że stworzyłeś motyw za pomocą polecenia ``make console make:theme``.

Renderowanie widoku
###################

Zaczniemy od tego, jak wyrenderować widok i zrobimy to na przykładzie. Mając już główny widok motywu,
dołożymy kolejny widok, w którym wyrenderujemy nagłówek strony.

To jak ułożysz sobie strukturę katalogów z częściami layoutu zależy tylko od Ciebie. My preferujemy
umieszczenie wszystkich widokówc częściowych (partials) w osobnym katalogu, tak by wszystko było
w jednym miejscu. Dla potrzeb przykładu widoki te będziemy umieszczać w katalogu ``/_parts``.

Stwórzmy więc prosty widok z nagłówkiem strony:

.. code-block:: twig

    {# view extension/theme/Tulia/Lisa/Resources/views/_parts/header.tpl #}

    <header>
        <a href="/"><img src="{{ asset('/assets/logo.png') }}" /></a>
    </header>

Teraz musimy go wyrenderować w :doc:`głównym widoku<glowny-widok-motywu>`. Wykorzystamy do tego funkcję
``include`` z Twiga_. Wszystkie linki do aktywnego widoku dostaniesz za pomocą funkcji ``template()``.
Zwraca ona link do widoku który później zostanie wyrenderowany przez Twiga.
Dodajmy więc to do głównego widoku (widok został uproszczony na potrzeby dokumentacji):

.. code-block:: twig

    {# view extension/theme/Tulia/Lisa/Resources/views/layout.tpl #}

    <body class="{{ body_class(app.request) }}">
        {% include template('_parts/header.tpl') %}
        {# ... #}
    </body>

I to tyle :) Każdy widok z aktywnego motywu renderujemy w taki sam sposób. Dobrą praktyką jest tworzenie
częściowych widoków dla większych bloków kodu i ładowanie ich.

.. tip:: Dziedziczenie widoków z motywu

    W sytuacji gdy przyjdzie potrzeba dziedziczenia widoku z aktywnego motywu (pomijając dziedziczenie
    głównego widoku - o tym przeczytasz niżej), możesz również użyć funkcji ``template()``.

    .. code-block:: twig

        {# extends template('_parts/layouts/empty.tpl') %}


Dziedziczenie głównego widoku
#############################

Dziedziczenie głównego widoku motywu zachodzi w sytuacji gdy system wyświetla treść podstrony. Dla przykładu
niech będzie to strona kontaktu. Treść tej strony umieszczana jest w bloku o nazwie ``content``.
A sam widok (zgodnie z działaniem Twiga_) musi dziedziczyć po głównym widoku, który zawiera strukturę
HTML. W Tulia CMS aktywny motyw, a konkretnie główny widok aktywnego motywu nosi nazwę ``theme``.
Gdy przychodzi do dziedziczenia głównego widoku, wystarczy podać tą nazwę, na przykład:

.. code-block:: twig

    {% extends 'theme' %}

Funkcje dostępne w widokach
###########################

Oprócz funkcji dostępnych domyślnie w Twigu, Tulia CMS posiada również wiele funkcji które ułatwiają
development aplikacji. Możesz zobaczyć je wszystkie w :doc:`Liście funkcji<funkcje-widokow-twig>`.

.. _Twiga: https://twig.symfony.com/
