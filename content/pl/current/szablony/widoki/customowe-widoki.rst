---
Title: Customowe widoki - Tulia CMS
Description: 
Author: Adam Banaszkiewicz
---

# Customowe widoki

Oprócz plików widoków używanych przez system, można również tworzyć widoki używane tylko przez dany szablon.

Rozważmy przykład sekcji z jakąś statyczną galerią zdjęć, którą musimy załadować na kilku różnych podstronach. Nasz widok
znajdować się będzie w `/Resources/views/parts/gallery.tpl`. My chcemy wykorzystać ten plik we wcześniej zdefiniowanym
widoku `/Resources/views/node/node.tpl`. Przykładowe uzycie w linijce 6:

```twig
{# /Resources/views/parts/gallery.tpl #}
{% extends 'theme' %}

{% block content %}
    {# ... #}
    {% include '@theme/parts/gallery.tpl' %}
{% endblock %}
```

Dodatkowe pliki które nie nadpisują tych domyślnych/systemowych nie będa użyte przez system CMS, dopóki nie nastąpi ich
jawny użycie w jakimś miejscu.
