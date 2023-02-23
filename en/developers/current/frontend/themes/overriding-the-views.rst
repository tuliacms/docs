Overriding the views
====================

Themes, in addition to their own views, can also override system views and installed modules
in the system. Now you will learn how to override each of these types of views in your theme.

Overriding system views
#######################

The system has several predefined views that allow you to display the content even when the theme
did not implement it. As an example, we can take the entry view (``Node``). The theme doesn't need to
implement this view, and yet after entering the subpage of the entry you can see its content.

To be able to implement an individual view of a module for a theme, this view must be overwritten.
To overwrite system view, you need to put a view with the same name in the directory in your theme
``/Resources/views/overwrite/cms``. The system, when rendering a view, first checks for existence
view with a given name in that directory so it will render the theme view even if the system view
exists.

For example, when there is a system view called ``@cms/node/node.tpl``, to override it, create in your
theme view ``/Resources/views/overwrite/cms/node/node.tpl``. Remember to copy the content by default
system view so as not to miss the functions that the system provides by default.

.. tip:: Protip

    If you want to overwrite a view and you don't know what it's called, you can use the Symfony Profiler.
    In the Twig bookmark you will see all the views that have been rendered on a given subpage. All those,
    that start with ``@cms/``, these are system views that you can override.
