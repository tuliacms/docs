Themes inheritance
==================

Themes can be extended using Child Themes. Child Themes are assigned as children to an existing full theme.
They were created to be able to customize an existing theme without modifying its files.

If the active theme is a theme that has a parent, the system will load all resources and files from
the parent theme, and then those from the child theme. Thanks to this, in a child theme, you can
overwrite only specific files, or add your own without removing existing files.

For views (``.tpl``), this will always be an override. So if the file also exists in the child theme,
it will be overwritten and the one from the child theme will be shown. In the case of resources (CSS, JS)
you will have to manually overwrite these resources in the configuration file to overwrite them.
In most cases, however, it is enough to add your script or CSS style to the child theme and overwrite
the styles or add a new JS code that will modify the theme.

Call parent theme views
_______________________

In the case of an active theme, to return a link to the view, use the ``template()`` function -
regardless of whether the theme has a parent or not. However, if the active theme is a theme that
has a parent, use the ``parent_template()`` function, which returns a link to the parent theme's views.

This is useful when you are overriding the parent theme view but need to display the parent theme view
in a different place. For example:

.. code-block:: twig

    {# extension/theme/Tulia/Lisa/Resources/views/_parts/header.tpl #}

    <header>
        <a href="/"><img src="{{ asset('/assets/logo.png') }}" /></a>
    </header>

.. code-block:: twig

    {# extension/theme/Tulia/LisaChild/Resources/views/_parts/header.tpl #}

    {% include parent_template('_parts/header.tpl') %}
    <div class="header-pillow"></div>

The above example illustrates a situation where in a child theme you want to add something to a
given parent theme view. In this case, we import the view from the parent theme
(``parent_template('_parts/header.tpl')``) and then display the additional content.
