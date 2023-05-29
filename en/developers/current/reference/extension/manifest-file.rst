Extension Manifest file
=======================

The ``manifest.json`` file stores informations about extension, it's type, name, storage, icons, entrypoints,
and so on. Here You can find description of the whole files, for every field.

Global ones, for both modules and themes:

- ``name`` - Name of the extension. Name is showed on modules/themes lists.
- ``type`` - Type of the extension. Can be ``module`` or ``theme``.
- ``translations`` - List of locale codes fo which extension is translated.
- ``info`` - Short info about this extension.
- ``entrypoint`` - Entry point to extension, this must be a FQCN (of the module or theme).

Specialized for themes:

- ``css_framework`` - CSS Framework used for this theme.
- ``supports`` - WIP
- ``showreel`` - Link to showreel file for theme. Showreel is a very long screenshot of the theme,
  that shows theme in full while hovering mouse over the thumbnail.
- ``thumbnail`` - Link to thumbnail of the theme.

