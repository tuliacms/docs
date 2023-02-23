Customizer
==========

The customizer allows you to configure the theme using a practical sidebar with configuration options.
Each theme can be customized with Customizer. That's how much he will be like this
configurable depends only on the developer deploying the theme. You will now learn how to configure
theme to work with Customizer.

Theme's configuration
#####################

The configuration of the available controls in the Customizer for a theme is in the theme configuration file
``/Resources/config/config.yaml``, in the ``cms.theme.configuration.{theme/name}.customizer`` field.
The Customizer configuration consists of three parts.
We will start with adding and configuring sections and controls.

Configuration sections and controls
___________________________________

Under the theme key shown earlier, we add the ``builder`` key that holds the sections and controls,
to be found in this section. Sections can be grouped within other sections. Each section may contain
unlimited number of controls. Let's start with an example in which we will define the theme's leading color.

.. code-block:: yaml

    cms:
        theme:
            configuration:
                Vendor/MyTheme:
                    customizer:
                        builder:
                            lisa.colors:
                                label: Colors
                                controls:
                                    lisa.color.primary:
                                        type: colorpicker
                                        label: Primary color
                                        value: '#0f61b9'

Only for this example, the full path of the Customizer configuration was provided. Later in the article
everything up to the ``builder`` key will be skipped.

We will now discuss the individual parts of the setup:

- line 7 - first we define the section where we will place the controls
- line 8 - we give it the display name of the section
- line 9 - we list the controls in this section
- line 10 - each control must have a unique name, after which you will be able to get to the value of the control
- line 11 - type of control. By default it will always be a text field.
  List of control types You can find :ref:`here<controls-type-list>`.
- line 12 - the display name of the control
- line 13 - you can also specify a default value

.. tip:: Section in section

    You can embed a section within another section. To do this, all you have to do is provide
    the ``parent`` key with a name parent section:

    .. code-block:: yaml

        lisa.colors.dedicated:
            label: Dedicated colors
            parent: lisa.colors

It is good practice to prefix the section names and the controls as the theme name.
This can counter potential problems with name duplication.

Configuration of control types
______________________________

Some controls have their configuration. For example, the type ``select`` allows you to specify
list of options to be included in the control. We define the configuration of the control
in the ``control_options`` key. Example of a control with two options to choose from:

.. code-block:: yaml
    lisa.control:
        label: Control
        type: select
        control_options:
            choices: { yes: Do it, no: Dont do it }

Display the value of the control in the view
############################################

Now that we have the customizer values saved, it's time to display that value in the view.
The function ``customizer_get()`` is responsible for this, to which we give the name of the control.
It will return the value stored in the customizer, or the default value from the YAML configuration, if any
customizer was not used. Example:

.. code-block:: twig

    <div>{{ customizer_get('lisa.control') }}</div>

Preview without reloading
_________________________

By default, all controls defined in the theme are refresh by reloading the page. You can, however, use another
method of transporting the preview data called ``postMessage``, thanks to which the system will send
the changed value of the control for preview without reloading. However, in the case of this
solutions, you must remember to implement the appropriate code that will update the selected element live.
The system has a built-in function ``customizer_live_control()``, which makes the ``postMessage``
implementation process a bit faster.

But first the configuration. To be able to use this type of refreshing, you need to add
the ``transport: postMessage`` option to the control. The system will then start to treat changes
in this control differently.

.. code-block:: yaml
    lisa.control:
        label: Control
        transport: postMessage

To display a simple type of control (enter a text value into an HTML element), for example insert
some content into a DIV, just use the ``customizer_live_control()`` function. The system will update
automatically.

.. code-block:: twig

    <div {{ customizer_live_control('lisa.control') }}>
        {{ customizer_get('lisa.control') }}
    </div>

This function returns the HTML attributes given to the element it uses tell the system that this element
is to be updated live. Note that even though the ``customizer_live_control()`` function was injected,
the `customizer_get()`` function was still injected. This is due to the fact that the given element
will be updated live by the system, but still the value in this element must be displayed also without
the Customizer edit mode enabled in the Administration Panel - simply put: "in production".

Multilingual values
###################

If any value is to be language dependent, set it to ``true`` in the ``multilingual``
field in the configuration:

.. code-block:: yaml
    lisa.control:
        label: Control
        multilingual: true

Name translations
#################

By default, all section and field names (``label``) are displayed directly from the configuration.
However, you can translate them. To do this, just define the translation domain for the theme,
define the translations in the files, and then use the translation key instead of the name in the
``label`` field:

.. code-block:: yaml
    lisa.control:
        label: customizer.control

That's how you translate:

- controls ``label``
- sections ``label``

.. _controls-type-list:
List of control types
#####################

- ``text`` - text field (oneliner)
- ``select`` - single-chose selection field

    .. code-block:: yaml
        control_options:
            choices: { yes: Do it, no: Dont do it }

- ``filepicker`` - File picker field

    .. code-block:: yaml
        control_options:
            file_type: image

- ``colorpicker`` - Color pallete picker
- ``yes_no`` - Single-chose select with "Yes" and "No" options

Read more
#########

- :ref:`How to use CSS variables to edit the appearance of the theme?<css-variables>`
- :ref:`How to create ready configurations (changesets)?<ready-to-use-config-sets>`
