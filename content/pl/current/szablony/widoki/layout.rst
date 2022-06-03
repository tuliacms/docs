---
Title: Widok layoutu - Tulia CMS
Description: Layout - główny plik szablonu
Author: Adam Banaszkiewicz
---

# Widok layoutu

Każdy widok podstrony (node, taksonomia, strona główna) dziedziczy po głównym widoku layoutu. Plik ten mieści się w
głównym katalogu widoków: `/Resources/views/layout.tpl`. Zawiera on układ HTML całego dokumentu, czyli doctype,
head czy stopkę. W nim renderowany jest główny blok treści o nazwie `content` którym jest właśnie treść danej podstrony.

Nazwa tego widoku to poprostu `theme`. Dzięki temu, gdy jakiś widok ma być renderowany w layoucie aktywnego szablonu,
należy użyć w nim dyrektywy `{% extends 'theme' %}`, a treść podstrony należy zdefiniować w bloku `content`.

Przykładowy widok podstrony, który renderowany będzie w layoucie może wyglądac następująco:

```twig
{% extends 'theme' %}

{% block content %}
    Page content.
{% endblock %}
```

Widok layoutu, do którego treść bloku `content` zostanie wstrzyknięta może wyglądać następująco:

```twig
<!doctype html>
<html lang="{{ app.request.contentLocale }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ title() }}</title>
        {{ theme_head() }}
    </head>
    <body class="{{ body_class() }}">
        {% block content %}{% endblock %}
        {{ theme_body() }}
    </body>
</html>
```

Wywołania funkcji `theme_head()` oraz `theme_body()` pozwalają załadować na stronie dodatkowe zasoby (pliki CSS czy
JavaScript) przez system, za pomocą Assettera i są one wymagane by szablon działał poprawnie.
