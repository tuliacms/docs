Główny widok motywu
===================

Dowiesz się tutaj, jak wygląda struktura głównego widoku motywu i co powinien zawierać.

Widok ``layout.tpl`` to główny widok motywu. Zawiera strukturę HTMl dokumentu, oraz kilka wymaganych
dla motywów wywołań, które odpowiadają za załadowanie zasobów JS i CSS na stronie, oraz kilka domyślnych bloków.

Podstawowa struktura głównego widoku
####################################

.. code-block:: twig

    <!doctype html>
    <html lang="{{ page_locale() }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            {{ do_action('theme.head') }}
        </head>
        <body class="{{ body_class(app.request) }}">
            {% block content %}{% endblock %}
            {{ do_action('theme.body') }}
        </body>
    </html>

Jak widzisz, oprócz dokumentu HTML wymagane są jeszcze dodatkowe elementy, takie jak:

- linia 2 - ``page_locale()`` zwraca kod języka aktualnie wybranego przez klienta.
- linia 6 - ``do_action('theme.head')`` wykonuje akcję (Hooks), tutaj między innymi wstrzykiwane są metatagi SEO oraz style CSS.
- linia 9 - Główny blok wyświetlający treść strony. Każdy widok modułu/motywy, który może być osadzony w motywie będzie definiował ten blok.
- linia 10 - ``do_action('theme.body')`` wykonuje akcję na końcu motywu. Tutaj między innymi są wstrzykiwane zasoby JS oraz inne elementy strony (na przykład popup ciasteczek).

To jest podstawowy główny widok motywu. Możesz go modyfikować do własnych potrzeb, rozbudowywać itp.
Pamiętaj tylko, by te główne elementy zaznaczone powyżej były widoczne zawsze.

Wiadomości flash
################

Symfony powiada funkcję jednorazowych wiadomości flash. Aby je wyświetlić nalezy użyć funkcji ``flashes()``
dostępnej w widokach. Zwraca ona kod HTML z wszystkimi istniejącymi wiadomościami. Przykład użycia:

.. code-block:: twig

    {{ flashes() }}

Możesz również pobrać listę wiadomości flash za pomocą funkcji ``get_flashes()``:


.. code-block:: twig

    {% for type, messages in get_flashes() %}
        {% for message in messages %}
            <div class="alert alert-{{ type }}">{{ message }}</div>
        {% endfor %}
    {% endfor %}

Kluczem jest typ wiadomości (``info``, ``success``, ``warning``, ``danger``),
a w wartości jest kolekcja wiadomości.
