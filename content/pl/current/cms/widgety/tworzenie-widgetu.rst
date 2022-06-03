---
Title: Tworzenie widgetu - Tulia CMS
Description: Jak stworzyć widget od podstaw, w Tulia CMS.
Author: Adam Banaszkiewicz
---

# Tworzenie widgetu

Na widget składają się conajmniej dwa widoki i jedna klasa. Widget należy zarejestrować jako serwis z odpowiednim tagiem.
To wystarczy by system go rozpoznał i dał możliwość jego dodawania na stronie.

Mała uwaga, tworzenie widgetów działa tak samo w modułach jak i w szablonach, jednakże na potrzeby tej dokumentacji,
opisane zostanie to na przykładzie widgetu szablonu. Jeśli chciałbyś stworzyć widget w swoim module, będzie to wyglądało
dokładnie tak samo ponieważ struktura katalogów jest taka sama - zmienią się tylko nazwy: zamiast `theme` będzie `module`. 

## Klasa widgetu

Przyjęło się, by wszystkie widgety trzymać w jednym miejscu - będziemy je trzymać zatem w katalogu `/Widget`. Każdy
musi dziedziczyć po klasie `Tulia\Component\Widget\AbstractWidget`. Klasa widgetu zawierać będzie kilka wymaganych metod
które opisane zostały poniżej:

- `getId()` - zwraca identyfikato widgetu. Musi to być unikalny identyfikator. Dobrym podejściem jest dodawanie
przedrostka z nazwą vendora, na przykład: `tulia_text`, `requtize_gallery` czy `client_name_contact_form`.
- `getInfo()` - zwraca informacje o widgecie, takie jak jego nazwa, opis czy nazwa domeny z plików językowych,
gdy nazwa i opis są tłumaczone w tych plikach.
- `render()` - metoda odpowiedzialna za wyrenderowanie widgetu na froncie. Przyjmuje w parametrze konfigurację
która została zapisana podczas tworzenia widgetu w zapleczu. Na podstawie tej konfiguracji metoda ta renderuje
widget.

Poniżej znajdziesz najprostszy widget, który tylko i wyłącznie renderuje jeden widok na froncie. Jest to minimalna
konfiguracja klasy widgetu.

```php
namespace Tulia\Theme\Tulia\Lisa\Widget;

use Tulia\Component\Templating\ViewInterface;
use Tulia\Component\Widget\AbstractWidget;
use Tulia\Component\Widget\Configuration\ConfigurationInterface;

class TextWidget extends AbstractWidget
{
    public function getId(): string
    {
        return 'my_custom_text';
    }

    public function getInfo(): array
    {
        return ['name' => 'Text widget'];
    }

    public function render(ConfigurationInterface $config): ?ViewInterface
    {
        return $this->view('frontend.tpl');
    }
}
```

## Widok frontowy

Metoda `render()` widoku zwraca informacje na temat widoku, który ma zostać wyrenderowany. W powyższym przykładzie jest
to widok o nazwie `frontend.tpl`. Zauważ, że podana została nazwa pliku wrac z przedrostkiem `@Lisa`, który mówi
systemowi, żeby załadować plik z tego szablonu, o nazwie `Lisa`.

Widoki przechowywane powinny być w katalogu `/Resources/views` - dobrym podejściem jest separowanie ich w zależności
od typu oraz danego widgetu. Tutaj mamy katalog `/widget/text`.

Widok widgetu to zwykły plik `.tpl` z kodem HTML i Twig - na przykład:

```twig
{# /Resources/views/widget/text/frontend.tpl #}

<h3>Hello :)</h3>
```

## Rejestracja widgetu jako serwis

Aby system zobaczył nasz widget, musimy go zarejestrować jako serwis z odpowiednim tagiem. Serwisy przechowywane są
w pliku `/Resources/config/services.php`. Dodaj więc do niego kod na podstawie poniższego przykłądu, zmieniając
oczywiście nazwe klasy i jej namespace w zalezności od tego, jak wygląda on u Ciebie.

```php
// /Resources/config/services.php

use Tulia\Theme\Lisa\Widget\TextWidget;
 
$builder->setDefinition(TextWidget::class, TextWidget::class, [
    'tags' => [ tag_widget() ],
]);
```

Jako jeden tag, dodaj wywołanie funkcji `tag_widget()`, która to poinformuje system, że ten serwis jest widgetem.

Teraz widget będzie widoczny w systemie. Możesz teraz udać się do zakładki "Widgety" w panelu administracyjnym, i
spróbowac dodac nowy widget - w oknie modalnym powinien być on już widoczny.

## Wyświetlanie widgetu w szablonie

Do wyświetlania widgetów należy użyć funkcji `widgets_space()` w widoku. Przyjmuje ona jako parametr nazwę miejsca, do
którego przypisane są widgety z poziomu Panelu Administracyjnego. Przykładowe użycie wyświetlania widgetów w miejscu
o nazwie `homepage`:

```twig
{{ widgets_space('my_custom_space') }}
```

Aby sprawdzić czy w danym miejscu istnieją jakiekolwiek widgety, można użyć funkcji `widgets_space_count()`, która
zwraca liczbę widgetów przypisanych do danego miejsca, na przykład:

```twig
{% if widgets_space_count('my_custom_space') %}
    {{ widgets_space('my_custom_space') }}
{% else %}
    No widgets here...
{% endif %}
```

## Dodanie widgetu na stronę

Gotowe, możesz teraz dodać swój widget na stronę w wybrane miejsce. Pamiętaj, że miejsce to musi być zrefiniowane
w szablonie, inaczej nie pojawi się ono w liście dostepnych miejsc podczas dodawania widgetu.
