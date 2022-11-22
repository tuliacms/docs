Motywy
======

- :ref:`Tworzenie szablonu<tworzenie-szablonu>`
- :ref:`Przechowywanie motywów na serwerze<przechowywanie-motywow-na-serwerze>`
- :ref:`Widoki<widoki>`
- :ref:`Motyw-dziecko<motyw-dziecko>`
    - :ref:`Odwołanie do widoków rodzica<odwolanie-do-widokow-rodzica>`
- :ref:`Customizer<customizer>`

Motywy pozwalają zmieniać wygląd i szatę graficzną strony internetowej. Każdy motyw to odrębna
paczka instalacyjna, zawierająca kompletny kod HTML/CSS/JS oraz obrazki i inne zasoby.
Poznasz możliwości tworzenia i dostosowywania motywów dla swoich potrzeb.

.. _tworzenie-szablonu:
Tworzenie szablonu
----------

Tworzenie nowego motywu sprowadza się do wykonania jednego polecenia:

.. code-block:: terminal

    $ make console make:theme

Podczas jego wykonywania będziesz musiał podać:

- Czy chcesz stworzyć motyw-dziecko
    - Jeśli tak, to możesz wybrać motyw który chcesz rozszerzyć
- Nazwę motywu w formacie ``vendor/name``.

System sam zauważy nowy motyw i od razu w Panelu Administracyjnym będziesz go widział,
i będziesz mógł go aktywować.

.. _przechowywanie-motywow-na-serwerze:
Przechowywanie motywów na serwerze
----------------------------------

Motywy znajdują się w katalogu ``extension/theme``. Każdy motyw znajduje się w osobnym katalogu w środku,
o nazwach ``vendor`` oraz ``name``.

Dla przykładu motyw o nazwie ``Tulia/Lisa``, znajdzie się w katalogu ``extension/theme/Tulia/Lisa``.

.. _widoki:
Widoki
------



.. _motyw-dziecko:
Motyw-dziecko
-------------

Motywy można rozszerzać, za pomocą Motywów-dzieci. Są one przypisane jako dzieci do istniejącego,
pełnego motywu. Powstały one by móc zmodyfikować istniejący motyw, nie modyfikując jego plików.

W sytuacji gdy aktywnym motywem będzie motyw, który posiada rodzica to system będzie ładował
wszystkie zasoby i pliki z motywu-rodzica, a dopiero póxniej te z motywu-dziecka. Dzięki temu
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

W przypadku aktywnego motywu, skrót do widoków to ``@theme`` - bez względu na to czy motyw posiada
rodzica czy nie. Jednak w przypadku gdy aktywnym motywem jest motyw który posiada rodzica, w systemie
istnieje skrót ``@parent``, który kieruje do widoków motywu-rodzica.

Przydaje się to, w sytuacji gdy nadpisujesz widok motywu-rodzica, jednak potrzebujesz wyświetlić widok
motywu-rodzica w innym miejscu. Na przykład:

.. code-block:: twig

    {# view extension/theme/Tulia/Lisa/Resources/views/_parts/header.tpl #}

    <header>
        <a href="/"><img src="{{ asset('/assets/logo.png') }}" /></a>
    </header>

.. code-block:: twig

    {# view extension/theme/Tulia/LisaChild/Resources/views/_parts/header.tpl #}

    {% include '@parent/_parts/header.tpl' %}
    <div class="header-pillow"></div>

Powyższy przykład ilustruje sutyację, w której w motywie-dziecku chcesz dodać coś do danego widoku
motywu rodzica. W takiej sytuacji importujemy widok z motywu-rodzica (``@parent/_parts/header.tpl``)
a następnie wyświetlamy dodatkową treść.

.. _customizer:
Customizer
----------

Dzięki customizerowi masz możliwość zdefiniowania ustawień motywu. Możesz oddać w kontrolę użytkownikowi
między innymi teksty, kolorystykę, zdjęcia itp. Więcej informacji o tym, jak skonfigurować Customizer
w szablonie znajdziesz na stronie :doc:`Customizer <customizer>`.
