Main View of Theme
===================

Here you will learn how the main theme's view is structured and what it should contain.

The ``layout.tpl`` view is the theme's main view. It contains the HTML structure of the document,
plus some calls that are required fot theme, which are responsible for loading JS and CSS resources
on the page, and some default blocks.

The basic structure of the main view
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

As you can see, with the HTML document, additional elements are required, such as:

- line 2 - ``page_locale()`` returns the code of the language currently selected by the user.
- line 6 - ``do_action('theme.head')`` performs an action (Hooks), i.e. SEO meta tags and CSS styles are injected.
- line 9 - The main block displaying the content of the page. Any module/theme view that can be embedded in the theme will define this block.
- line 10 - ``do_action('theme.body')`` performs the action at the end of the theme. For example, JS resources and other page elements (e.g. popup cookies) are injected.

This is the basic main theme view. You can modify it to suit your needs, extend it, etc.
Just remember to keep the main elements highlighted above visible at all times.

Flash messages
##############

Symfony has a feature of one-time flash messages. To display them, use the ``flashes()`` function
available in views. It returns HTML code with all existing messages. Example of use:

.. code-block:: twig

    {{ flashes() }}

You can also retrieve a list of flash messages with the ``get_flashes()`` function:

.. code-block:: twig

    {% for type, messages in get_flashes() %}
        {% for message in messages %}
            <div class="alert alert-{{ type }}">{{ message }}</div>
        {% endfor %}
    {% endfor %}

The key is the message type (``info``, ``success``, ``warning``, ``danger``),
and in the value is a collection of messages.
