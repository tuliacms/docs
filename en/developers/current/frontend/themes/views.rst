Theme's views
=============

Theme views use Twig_ to render content. View files have the ``.tpl`` extension.
Here you will learn how to build views, call them and render them in the theme.

.. tip:: Info

    The information in this article assumes you created the theme with the command ``make console make:theme``.

View rendering
###################

We'll start with how to render a view and we'll do it with an example. Now that you have the theme's main view,
we will add another view in which we will render the header of the page.

How you arrange the directory structure with layout parts depends only on you. We prefer
putting all partial views in a separate directory so that everything is there
in one place. For the purposes of the example, we will place these views in the ``/_parts`` directory.

So let's create a simple view with a page header:

.. code-block:: twig

    {# view extension/theme/Tulia/Lisa/Resources/views/_parts/header.tpl #}

    <header>
        <a href="/"><img src="{{ asset('/assets/logo.png') }}" /></a>
    </header>

Now we need to render it in :doc:`Main View of Theme<main-view-of-theme>`. We will use a function
``include`` from Twig_ to do this this. You will get all links to the active view using the ``template()``
function. It returns a link to the view that will later be rendered by Twig.
So let's add this to the main view (the view has been simplified for documentation purposes):

.. code-block:: twig

    {# view extension/theme/Tulia/Lisa/Resources/views/layout.tpl #}

    <body class="{{ body_class(app.request) }}">
        {% include template('_parts/header.tpl') %}
        {# ... #}
    </body>

And that's it :) We render each view from the active theme in the same way. It's good practice to create
partial views for larger blocks of code and loading them.

.. tip:: Inherit views from a theme

    In a situation where there is a need to inherit the view from the active theme (apart from inheritance
    main view - read about it below), you can also use the ``template()`` function.

    .. code-block:: twig

        {# extends template('_parts/layouts/empty.tpl') %}


Inherit the main view
#####################

Inheritance of the main theme's view occurs when the system displays the content of a subpage. For example
let this be the contact page. The content of this page is placed in a block called ``content``.
And the view itself (according to Twig_) must inherit from the root view that contains the HTML structure.
In Tulia CMS, the active theme, specifically the main view of the active theme, is called ``theme``.
When it comes to inheriting the root view, just specify that name, for example:

.. code-block:: twig

    {% extends 'theme' %}

Functions available in views
############################

In addition to the functions available by default in Twig, Tulia CMS also has many functions that make it easier
application development. You can see them all in :doc:`List of functions<twig-view-functions>`.

.. _Twig: https://twig.symfony.com/
