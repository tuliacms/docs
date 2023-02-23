List of Twig functions
======================

Here you will find a list of features available in Twig views. They have been divided into
modules so that you can understand them better.

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

Returns whether the current page is the home page.

*Returns*: ``boolean``

.. _frontend-functions-core-get_flashes:
``flashes()``
----

Returns a list of flash messages. The first level of the table is a pair of message type as key
(``info``, ``success``, ``warning``, ``danger``) and list of messages as value.

*Returns*: ``array<string, array<int, string>>``

.. _frontend-functions-core-flashes:
``flashes()``
----

Returns flash messages as already rendered HTML.

*Returns*: ``string``


.. _frontend-functions-core-is_dev_env:
``is_dev_env()``
----

Returns whether the current environment is a development environment.

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

Returns the active language of the site.

*Returns*: ``Tulia\Cms\Platform\Infrastructure\Framework\Routing\Website\LocaleInterface``

.. _frontend-functions-website-locales:
``locales()``
----

Returns a list of all languages available for the site.

*Returns*: ``array<int, Tulia\Cms\Platform\Infrastructure\Framework\Routing\Website\LocaleInterface>``

.. _frontend-functions-website-page_locale:
``page_locale()``
----

Returns the active language of the active site as an ISO code (e.g. ``en_US``).

*Returns*: ``string``

.. _frontend-functions-website-current_website:
``current_website()``
----

Returns the active site object with all its information (including its languages).

*Returns*: ``Tulia\Cms\Platform\Infrastructure\Framework\Routing\Website\WebsiteInterface``

.. _frontend-functions-website-website_list:
``website_list()``
----

Returns a list of sites available for this system installation.

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

Returns an object with the active theme.

*Returns*: ``Tulia\Component\Theme\ThemeInterface``

.. _frontend-functions-customizer-customizer_get:
``customizer_get()``
----

Returns the value stored in the Customizer for the active theme. If there is none, it will return
the default value of the control. As a parameter, it accepts the name of the control, and (optionally)
the default value.

*Returns*: ``mixed``

.. code-block:: twig

    <div>{{ customizer_get('lisa.control') }}</div>

.. _frontend-functions-customizer-customizer_live_control:
``customizer_live_control()``
----

Returns the HTML attributes needed for the built-in function of :doc:`Live Control of Customizer<customizer>`.

.. code-block:: twig

    <div {{ customizer_live_control('lisa.control') }}>
        {{ customizer_get('lisa.control') }}
    </div>

*Returns*: ``string``

.. _frontend-functions-customizer-template:
``template()``
----

It takes a relative link and returns an absolute link to the view file from the active theme.

*Returns*: ``string``

.. code-block:: twig

    {% include template('_parts/header.tpl') %}

.. _frontend-functions-customizer-parent_template:
``parent_template()``
----

It takes a relative link and returns an absolute link to the parent theme view file from the active theme.

*Returns*: ``string``

.. code-block:: twig

    {% include parent_template('_parts/header.tpl') %}
