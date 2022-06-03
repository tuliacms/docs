---
Title: Konfiguracja assetów - Tulia CMS
Description: Konfiguracja assetów, plików CSS oraz JS, oraz ich zależności.
Author: Adam Banaszkiewicz
---

# Konfiguracja assetów

Za budowanie i ładowanie zasobów CSS/JS oraz ich zależności odpowiada Assetter. Cała konfiguracja kolekcji zasobów
JS i CSS dostępnych dla szablonu znajduje się w pliku `/Resources/config/assets.php`. Zasoby te domyślnie przechowywane
są w katalogu `/Resources/public` i podczas instalacji szablonu kopiowane są do katalogu
`/public/assets/theme/{nazwa_vendora}/{nazwa_szablonu}`.

## Definiowanie zasobów i zależności

Lista zasobów znajduje się w pliku `/Resources/config/assets.php`. Plik ten zwraca tablicę z konfiguracją zasobów, gdzie
pod nazwą zasobu znajdują się wszystkie informacje na jego temat. Na przykład:

```php
// /extension/theme/Tulia/Lisa/Resources/config/assets.php

return [
    'tulia.lisa.main' => [
        'styles' => [
            '/assets/theme/tulia/lisa/app/dist/css/style.css',
        ],
        'require' => ['bootstrap'],
    ],
];
```

Powyżej widać zasób o nazwie `tulia.lisa.main`, który zależny jest od innego, o nazwie `bootstrap`, a sam zawiera tylko jeden
plik CSS (`styles`). Nazwy zasobów zaleca się poprzedzać nazwą vendora, w formie przedrostku, na przykład:
`tulia.lisa.main`, `my_client.assets` czy `requtize_faq` - zapobiega to przypadkowemu nadpisywaniu zasobów z innych
szablonów, modułów czy nawet systemowych.

Zasoby mogą mieć wiele zależności i ładować wiele różnych plików CSS i JS. Poniżej znajdziesz listę dostępnych opcji
konfiguracji zasobów.

1. `styles` *array* - Lista plików CSS do załadowania. Znajduje się tutaj ścieżka względna do katalogu publicznego `/public`
w głównym katalogu domeny - nie jest to katalog `/Resources/public` szablonu.
1. `scripts` *array* - Lista plików JavaScript do załadowania. Znajduje się tutaj ścieżka względna do katalogu
publicznego `/public` w głównym katalogu domeny - nie jest to katalog `/Resources/public` szablonu.
1. `require` *array* - Lista zależności, które muszą być załadowane razem z danym zasobem. O ładowanie w odpowiedniej
kolejności dba Assetter.
1. `group` *string* - nazwa grupy ładowania zasobów. Dostępne są dwie grupy:
    - `head` - oznacza, że dany zasób (ale nie jego zależności) zostanie załadowany w sekcji `<head>` strony
    - `body` - oznacza, że dany zasób (ale nie jego zależności) zostanie załadowany w sekcji `<body>` strony, na samym jej końcu

## Ładowanie zasobu w szablonie

Zasoby można ładować praktycznie w dowolnym momencie we wszystkich plikach widoków z wyjątkiem głównego pliku widoku.
W nim należy załadować pliki odpowiednio:
    - Przed wywołaniem `{{ do_action('theme-head') }`, aby trafiły do sekcji `<head>`,
    - Przed wywołaniem `{{ do_action('theme-body') }`, aby trafiły do sekcji `<body>`,

W widokach, należy użyć polecenia `{% assets %}` i przekazać do niego tablicę z nazwami zasobów, na przykład:

```twig
{# /extension/theme/Tulia/Lisa/Resources/views/layout.tpl #}
{% assets ['tulia.lisa.main', 'font_awesome'] %}
```

## Ładowanie zasobów z poziomu konfiguracji

W pliku `Configurator.php` możesz również załadować zasoby, a różnica pomiędzy widokiem a tym plikiem jest taka, że
zasoby załadowane tutaj widoczne są widoczne na stronie w obrębie całego szablonu, a ładowane w wioku, są dostepne tylko
gdy załadowany jest dany widok.

Aby załadować zasoby globalnie na stronie, w metodzie `configure()` użyj `add('asset', '...')`:

```php
namespace Tulia\Theme\Tulia\Lisa;

use Tulia\Component\Theme\Configuration\AbstractConfigurator;
use Tulia\Component\Theme\Configuration\ConfigurationInterface;

class Configurator extends AbstractConfigurator
{
    public function configure(ConfigurationInterface $configuration): void
    {
        $configuration->add('asset', 'tulia.lisa.main');
    }
}
```

Dodatkowo dla Customizera możesz załadować osobne zasoby, które system załączy na stronę tylko w momencie, gdy będziesz
edytować szablom z poziomu Customizera. Dokonaj tego w metodzie `configureCustomizer()`:

```php
namespace Tulia\Theme\Tulia\Lisa;

use Tulia\Component\Theme\Configuration\AbstractConfigurator;
use Tulia\Component\Theme\Configuration\ConfigurationInterface;

class Configurator extends AbstractConfigurator
{
    public function configure(ConfigurationInterface $configuration): void
    {
        // ...
    }

    public function configureCustomizer(ConfigurationInterface $configuration): void
    {
        $configuration->add('asset', 'tulia.lisa.customizer');
    }
}
```
