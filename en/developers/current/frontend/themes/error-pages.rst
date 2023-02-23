Error pages
===========

The theme should handle two types of errors: 404 - Not Found and error 500 - Server error. Symfony provides
an internal address to verify error codes, it is ``/_error/{code}``. You can use it to verify what the
theme's error page looks like.

These two errors are showed by two views named error codes: ``404.tpl`` and ``500.tpl``. They should be
in the root of your theme's views directory.

404 Not found
#############

The 404 error may be using the theme's main view. An example view can be found below:

.. code-block:: twig

    {% extends 'theme' %}

    {% block content %}
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Page not found :(</h1>
        </div>
    {% endblock %}

500 Internal Server Error
#########################

In the event of a 500 error, you cannot use the theme and system. This is due to a number of different
factors that can go wrong which will result in a 500 error page.

Keep in mind that there may even be a bug in your theme that will show page 500, so you can't even rely
on that.

The view of the 500 error page should therefore be independent and contain the full HTML structure and
information about the error.
