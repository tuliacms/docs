Modules
=======

Modules allows You to create new functionalities and extend existing ones without modifying source code.
Modules can be also used to organize Domain's Bounded Contexts. You'll learn here how to create modules,
manage them and how to extend system functionality.

Create new module
-----------------

We'll start from scratch, and we now create new module. Modules are stored in two places:

- in composer - those modules are from foreign vendors, or Your own modules, but stored in separate repositories.
- in ``/extension/module`` directory - here You can store modules for this project

In this document we describe creating modules and store them in ``/extension/module`` directory, for project
purposes.

Execute following command to generate module. Answer few questions and module will be ready to work.

.. code-block:: terminal

    $ make console make:module

After generating module, You can show it's existence in System -> Modules list.

Big picture
-----------

In created module there are few files, that need to be described to understand the rules fo creating module.

- ``manifest.json`` - Entry file, that contains details of the module. Read more in `Extension Manifest file`_,
- ``src/Resources/config`` - here You can find ``config.yaml`` and ``services.yaml`` - those files are
  main entry point of Your module. From here system tages configuration and services and loads them in DI
  Container. Here also You will create the ``routes.yaml`` file with routing.
- ``src/Resources/translations`` - translations directory, read more in `Symfony Translations page`_.
  This directory is already configured in ``config.yaml``.
- ``src/Resources/views`` - views directory. This directory is already configured in ``config.yaml``.

Tulia CMS is build on top of Symfony framework, so You can start to create any code using Symfony Framework,
like controllers, CLI commands, services and so on.

Views
_____

To render view from controller, just use ``view()`` method. There is registered namespace for this module,
called ``@module/Vendor/Name``, that points to ``src/Resources/views`` directory. Assume that You have module
named ``Acme/Products``, You can render the ``my-view.tpl`` file like following:

.. code-block:: php

    use Tulia\Component\Templating\View;

    public function action(): View
    {
        return $this->view('@module/Acme/Products/my-view.tpl');
    }

To render view for administration, extend from ``{% extends 'backend' %}``. For frontend views,
use ``{% extends 'theme' %}``

Translations
____________

There are no special treatment for translations. just follow `Symfony Translations page`_.

Entities/Doctrine
_________________

There are no special treatment for translations. just follow `Symfony Doctrine page`_.


.. _Extension Manifest file: ../../reference/extension/manifest-file.html
.. _Symfony Translations page: https://symfony.com/doc/current/translation.html
.. _Symfony Doctrine page: https://symfony.com/doc/current/doctrine.html
