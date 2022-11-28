Dziedziczenie motywów
=====================

Motywy można rozszerzać, za pomocą Motywów-dzieci. Są one przypisane jako dzieci do istniejącego,
pełnego motywu. Powstały one by móc zmodyfikować istniejący motyw, nie modyfikując jego plików.

W sytuacji gdy aktywnym motywem będzie motyw, który posiada rodzica to system będzie ładował
wszystkie zasoby i pliki z motywu-rodzica, a dopiero później te z motywu-dziecka. Dzięki temu
w motywie-dziecku można nadpisać tylko konkretne pliki, lub dodać swoje własne nie usuwając
istniejących plików.

W przypadku widoków (``.tpl``), zawsze to będzie nadpisanie. Czyli jeśli dany plik istnieje również
w motywie-dziecku, to zostanie on nadpisany i pokazany ten z motywu-dziecka. W przypakdu zasobów
(CSS, JS) będzie trzeba ręcznie nadpisać te zasoby w pliku konfiguracyjnym by je nadpisać.
W większości przypadków jednak wystarczy nam dodanie swojego skryptu lub stylu CSS do motywu-dziecka
i nadpisanie styli lub dodanie nowego kodu JS który zmodyfikuje motyw.



.. -odwolanie-do-widokow-rodzica:
Odwołanie do widoków rodzica
____________________________

W przypadku aktywnego motywu aby zwrócić link do widoku należy użyć funkcji ``template()`` - bez względu
na to czy motyw posiada rodzica czy nie. Jednak w przypadku gdy aktywnym motywem jest motyw który
posiada rodzica, należy użyć funkcji ``parent_template()``, która zwraca link do widoków motywu-rodzica.

Przydaje się to, w sytuacji gdy nadpisujesz widok motywu-rodzica, jednak potrzebujesz wyświetlić widok
motywu-rodzica w innym miejscu. Na przykład:

.. code-block:: twig

    {# view extension/theme/Tulia/Lisa/Resources/views/_parts/header.tpl #}

    <header>
        <a href="/"><img src="{{ asset('/assets/logo.png') }}" /></a>
    </header>

.. code-block:: twig

    {# view extension/theme/Tulia/LisaChild/Resources/views/_parts/header.tpl #}

    {% include parent_template('_parts/header.tpl') %}
    <div class="header-pillow"></div>

Powyższy przykład ilustruje sutyację, w której w motywie-dziecku chcesz dodać coś do danego widoku
motywu rodzica. W takiej sytuacji importujemy widok z motywu-rodzica (``parent_template('_parts/header.tpl')``)
a następnie wyświetlamy dodatkową treść.
