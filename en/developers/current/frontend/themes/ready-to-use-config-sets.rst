Ready to use Customizer sets
============================

The customizer allows you to customize the theme to the user's needs. However, it can use ready-made
configurations that you will prepare for the theme. Configuration groups can refer to, for example,
a predefined color scheme, a Christmas theme option or an RTL layout. You will now learn how to prepare
ready-made configurations for the theme.

Configuration
############

In your theme customizer configuration, add configuration collections under the ``changesets`` key:

.. code-block:: yaml

    cms:
        theme:
            configuration:
                Vendor/MyTheme:
                    customizer:
                        changesets:
                            lisa.predefined_changeset:
                                label: Predefined changeset
                                description: This is predefined changeset description
                                data:
                                    hero.static.headline: Some value of this changeset control
                                    hero.static.description: Some value of this changeset another control

- line 7 - changeset ID
- line 8-9 - the name and description of the changeset, can be translated as the names of the controls
- line 10 - contains a list of control values that will be assigned to them when the user applies this given changeset

When the user wants to customize the theme, he will be able to apply ready-made configurations
prepared by you. When the data is applied, the theme configuration will be reset, and then the
values from the ready-made changeset will be assigned to the appropriate controls.
