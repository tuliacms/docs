Lista funkcji Twig dla widoków
==============================

Znajdziesz tutaj listę funkcji dostępnych w widokach Twig. Podzielone zostały one na moduły, aby można
było lepiej się w nich rozeznać.

- :ref:`Core<frontend-functions-core>`
- :ref:`Website<frontend-functions-website>`
- :ref:`Customizer<frontend-functions-customizer>`



---

.. _frontend-functions-core:
Core
_______

- :ref:`is_homepage()<frontend-functions-core-is_homepage>`
- :ref:`get_flashes()<frontend-functions-core-get_flashes>`
- :ref:`flashes()<frontend-functions-core-flashes>`
- :ref:`is_dev_env()<frontend-functions-core-is_dev_env>`

.. _frontend-functions-core-is_homepage:
``is_homepage()``
----

Zwraca informację, czy aktualna strona to strona główna.

*Returns*: ``boolean``

.. _frontend-functions-core-get_flashes:
``flashes()``
----

Zwraca listę wiadomości flash. Pierwszy poziom tablicy to para typ wiadomości jako klucz
(``info``, ``success``, ``warning``, ``danger``), a lista wiadomości jako wartość.

*Returns*: ``array<string, array<int, string>>``

.. _frontend-functions-core-flashes:
``flashes()``
----

Zwraca wiadomości flash w postaci już wyrenderowanego kodu HTML.

*Returns*: ``string``


.. _frontend-functions-core-is_dev_env:
``is_dev_env()``
----

Zwraca informację czy aktualne środowisko to środowisko developerskie.

*Returns*: ``bool``






---


.. _frontend-functions-website:
Website
_______

- :ref:`locale()<frontend-functions-website-locale>`
- :ref:`locales()<frontend-functions-website-locales>`
- :ref:`page_locale()<frontend-functions-website-page_locale>`
- :ref:`current_website()<frontend-functions-website-current_website>`
- :ref:`website_list()<frontend-functions-website-website_list>`

.. _frontend-functions-website-locale:
``locale()``
----

Zwraca język aktualnie aktywnej witryny.

*Returns*: ``Tulia\Cms\Platform\Infrastructure\Framework\Routing\Website\LocaleInterface``

.. _frontend-functions-website-locales:
``locales()``
----

Zwraca listę wszystkich języków dostępnych dla aktualnej witryny.

*Returns*: ``array<int, Tulia\Cms\Platform\Infrastructure\Framework\Routing\Website\LocaleInterface>``

.. _frontend-functions-website-page_locale:
``page_locale()``
----

Zwraca aktywny język, aktywnej witryny, w postaci kodu ISO (np. ``en_US``).

*Returns*: ``string``

.. _frontend-functions-website-current_website:
``current_website()``
----

Zwraca obiekt aktywnej witryny, wraz z jej wszystkimi informacjiami (w tym jej językami).

*Returns*: ``Tulia\Cms\Platform\Infrastructure\Framework\Routing\Website\WebsiteInterface``

.. _frontend-functions-website-website_list:
``website_list()``
----

Zwraca listę witryn dostępnych dla tej instalacji systemu.

*Returns*: ``array<int, Tulia\Cms\Platform\Infrastructure\Framework\Routing\Website\WebsiteInterface>``




---


.. _frontend-functions-customizer:
Customizer
_______

- :ref:`theme()<frontend-functions-customizer-theme>`
- :ref:`customizer_get()<frontend-functions-customizer-customizer_get>`
- :ref:`customizer_live_control()<frontend-functions-customizer-customizer_live_control>`
- :ref:`template()<frontend-functions-customizer-template>`
- :ref:`parent_template()<frontend-functions-customizer-parent_template>`

.. _frontend-functions-customizer-theme:
``theme()``
----

Zwraca obiekt z aktywnym motywem.

*Returns*: ``Tulia\Component\Theme\ThemeInterface``

.. _frontend-functions-customizer-customizer_get:
``customizer_get()``
----

Zwraca wartość zapisaną w Customizerze, dla aktywnego motywu. Jeśli takiej nie ma, zwróci wartość domyślną
kontrolki. Jako parametr przyjmuje nazwę kontrolki, oraz (opcjonalnie) wartość domyślną.

*Returns*: ``mixed``

.. code-block:: twig

    <div>{{ customizer_get('lisa.control') }}</div>

.. _frontend-functions-customizer-customizer_live_control:
``customizer_live_control()``
----

Zwraca atrybuty HTML potrzebne dla wbudowanej funkcji :doc:`edycji kontrolek Customizera Live<customizer>`.

.. code-block:: twig

    <div {{ customizer_live_control('lisa.control') }}>
        {{ customizer_get('lisa.control') }}
    </div>

*Returns*: ``string``

.. _frontend-functions-customizer-template:
``template()``
----

Przyjmuje link względny i zwraca absolutny link do pliku widoku z aktywnego motywu.

*Returns*: ``string``

.. code-block:: twig

    {% include template('_parts/header.tpl') %}

.. _frontend-functions-customizer-parent_template:
``parent_template()``
----

Przyjmuje link względny i zwraca absolutny link do pliku widoku motywu rodzica z aktywnego motywu.

*Returns*: ``string``

.. code-block:: twig

    {% include parent_template('_parts/header.tpl') %}
