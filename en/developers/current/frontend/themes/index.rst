Themes
======

- :ref:`Create new theme<create-new-theme>`
- :ref:`Views<views>`
- :ref:`Themes inheritance<themes-inheritance>`
- :ref:`Customizer<customizer>`

Themes let you change the look and feel of a website. Each theme is separate
installation package containing complete HTML/CSS/JS code as well as images and other resources.
You will learn about the possibilities of creating and customizing themes for your needs.

Theme views, like everything else in the system, use Twig_ to render content.

.. _create-new-theme:
Create new theme
----------------

Creating a new theme comes down to one command:

.. code-block:: terminal

    $ make console make:theme

During its execution you will have to choose whether you want to do a :doc:`child-theme <themes-inheritance>`,
and specify the name of the theme in the ``vendor/name`` format.

The system will notice the new theme by itself and you will see it immediately in the Administration Panel,
and you will be able to activate it.

A new theme will be created in the directory ``extension/theme/vendor/name``. For example, a theme called
``Tulia/Lisa`` will be in the ``extension/theme/Tulia/Lisa`` directory.

.. _views:
Views
-----

Theme views are located in the ``/Resources/views`` directory. The main view file that must exist in every
theme is a view called ``layout.tpl``. It should contain the structure of the HTML document and some
required ones calls that will allow you to attach resources (JS/CSS). This view was created automatically
when creating the theme.

.. tip:: More informations

    For more information about the theme's main view, see :doc:`Main theme's view <main-view-of-theme>`.

.. _themes-inheritance:
Themes inheritence
-------------

Themes can be extended with child themes. They are assigned as children to an existing,
full theme. They were created to be able to modify an existing theme without modifying its files directly.

.. tip:: More informations

    For more information about theme inheritance, see :doc:`Themes inheritence <themes-inheritance>`.

.. _customizer:
Customizer
----------

Thanks to the customizer, you can define theme settings. You can give control to the user
including texts, colors, photos, etc.

.. tip:: More informations

    More information on how to configure the Customizer in the theme, see :doc:`Customizer <customizer>`.



.. _Twig: https://twig.symfony.com/
