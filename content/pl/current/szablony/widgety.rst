---
Title: Widgety w szablonach - Tulia CMS
Description: Co to są i jak działają Widgety w szablonach dla Tulia CMS?
Author: Adam Banaszkiewicz
---

# Widgety w szablonach

Pełna dokumentacja dotycząca widgetów znajduje się na stronie [Widgety](../cms/widgety). Tutaj dowiesz się jak
zarejestrować nowe miejsce na widget w swoim szablonie.

## Rejestracja nowego miejsca wyświetlania

Aby pokazać widget na stronie należy przygotować na to miejsce. Miejsce należy najpierw zarejestrować w szablonie.
Zrobisz to tworząc plik konfiguracyjny szablonu o nazwie `Configurator.php` w głównym katalogu szablonu. Do metody
`configure()` przesyłąny jest obiekt interfejsu `Tulia\Component\Theme\Configuration\ConfigurationInterface`, który
umożliwia wstepną konfigurację szablonu. Aby zarejestrować nowe miejsce na widgety, użyj metody `registerWidgetSpace()`,
jak poniżej:

```php
namespace Tulia\Theme\Tulia\Lisa;

use Tulia\Component\Theme\Configuration\AbstractConfigurator;
use Tulia\Component\Theme\Configuration\ConfigurationInterface;

class Configurator extends AbstractConfigurator
{
    public function configure(ConfigurationInterface $configuration): void
    {
        $configuration->add('widget_space', 'homepage', 'Homepage');
    }
}
```

Metoda `registerWidgetSpace()` przyjmuje dwa argumenty - pierwszy to nazwa miejsca na widgety, którą później użyjesz w
widokach, a drugi to nazwa miejsca widoczna w panelu administracyjnym. 

## Więcej informacji

- [Tworzenie widgetu](../cms/widgety/tworzenie-widgetu)
