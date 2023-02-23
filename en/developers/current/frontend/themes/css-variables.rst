CSS Variables
=============

To ensure easy implementation of changing the appearance of themes, Tulia CMS has the ability to define
`CSS variables for the theme`_. When you want to configure the color of the theme, you can use CSS variables
to override the theme's default color with the one that the user selects from the color panel when
customizing the theme. You will learn here how to use this function in your theme.

Step 1: A global variable with a default value
#############################################

In your theme style, define a global variable that will hold the default value and use that variable
wherever you want to use that color and want the user to be able to change it. For our example,
let's assume we give away the ability to change the theme's leading color.

.. code-block:: css

    :root {
      --primary-color: #1e90ff;
    }

    a { color: var(--primary-color); }

Step 2: Variable definition in theme configuration
################################################

In the theme configuration, add a variable as a key, and as a value, give the name of the control
from which the system should get the value. This value will later be set as the value of the CSS variable.

.. code-block:: yaml

    cms:
        theme:
            configuration:
                Vendor/MyTheme:
                    customizer:
                        customizer:
                            variables:
                                :root:
                                    primary-color: lisa.color.primary

Description:

- line 7 - contains a list of CSS scopes for which we want to apply variables
- line 8 - In our case, we want to define a global variable (``:root``).
  But you can also use other local scopes as you would with CSS styles.
- line 9 - we give the name of the variable in the key, and as the value we give the name of the control

How it's working?
##############

You have defined the default values of CSS variables in your styles. These values will be adopted by
the browser. On the other hand, Tulia CMS will render the variables that you have defined in the
configuration, creating a separate style in the HTML document with only these variables and their
values. When the browser notices a variable directly in the HTML document, it will treat it as more
important in the CSS structure and will replace the one you defined in your styles.

So you can change the values of virtually every element on the page only through variables,
and give the user virtually complete freedom about colors, margins/paddings, backgrounds and
other CSS attributes that you allow him to edit.

Live edit preview
###################

Thanks to the built-in live preview function, while editing controls, Tulia CMS also allows you
to preview all Live variables. All you have to do is set ``transport: postMessage`` next to the
control that is assigned to the CSS variable. The system will automatically update the local style
value in the preview HTML document.

.. _CSS variables for the theme: https://www.w3schools.com/css/css3_variables.asp
