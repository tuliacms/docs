Motywy
======

- :ref:`Tworzenie motywu<tworzenie-motywu>`
- :ref:`Widoki<widoki>`
- :ref:`Dziedziczenie motywów<dziedziczenie-motywow>`
- :ref:`Customizer<customizer>`

Motywy pozwalają zmieniać wygląd i szatę graficzną strony internetowej. Każdy motyw to odrębna
paczka instalacyjna, zawierająca kompletny kod HTML/CSS/JS oraz obrazki i inne zasoby.
Poznasz możliwości tworzenia i dostosowywania motywów dla swoich potrzeb.

Widoki motywów, jak i wszystkie inne w systemie używają Twiga_ do renderowania treści.

.. _tworzenie-motywu:
Tworzenie motywu
----------

Tworzenie nowego motywu sprowadza się do wykonania jednego polecenia:

.. code-block:: terminal

    $ make console make:theme

Podczas jego wykonywania będziesz musiał wybrać czy chcesz zrobić :doc:`motyw-dziecko <dziedziczenie-motywow>`,
oraz podać nazwę motywu w formacie ``vendor/name``

System sam zauważy nowy motyw i od razu w Panelu Administracyjnym będziesz go widział,
i będziesz mógł go aktywować.

Nowy motyw stworzony zostanie w katalogu ``extension/theme/vendor/name`` Dla przykładu motyw o nazwie
``Tulia/Lisa``, znajdzie się w katalogu ``extension/theme/Tulia/Lisa``.

.. _widoki:
Widoki
------

Widoki motywu znajdują się w katalogu ``/Resources/views``. Głównym widokiem, który musi istnieć w każdym
motywie to widok o nazwie ``layout.tpl``. Zawierać on powinien strukturę dokumentu HTML oraz kilka wymaganych
wywołań, które pozwolą załączyć zasoby (JS/CSS). Widok ten został stworzony automatycznie przy tworzeniu motywu.

.. tip:: Więcej informacji

    Więcej informacji o głównym widoku motywu znajdziesz na stronie :doc:`Główny widok motywu <glowny-widok-motywu>`.

.. _dziedziczenie-motywow:
Dziedziczenie motywów
-------------

Motywy można rozszerzać, za pomocą motywów-dzieci. Są one przypisane jako dzieci do istniejącego,
pełnego motywu. Powstały one by móc zmodyfikować istniejący motyw, nie modyfikując jego plików.

.. tip:: Więcej informacji

    Więcej informacji o głównym widoku motywu znajdziesz na stronie :doc:`Dziedziczenie motywów <dziedziczenie-motywow>`.

.. _customizer:
Customizer
----------

Dzięki customizerowi masz możliwość zdefiniowania ustawień motywu. Możesz oddać w kontrolę użytkownikowi
między innymi teksty, kolorystykę, zdjęcia itp.

.. tip:: Więcej informacji

    Więcej informacji o tym, jak skonfigurować Customizer w motywie znajdziesz na stronie :doc:`Customizer <customizer>`.



.. _Twiga: https://twig.symfony.com/
