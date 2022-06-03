---
Title: Customizer Wprowadzenie - Tulia CMS
Description: Jak dodać Customizer do szablonu od podstaw.
Author: Adam Banaszkiewicz
---

# Wprowadzenie

Cała konfiguracja Customizera kryje się w pliku `Customizer.php`, który należy stworzyć w głównym katalogu szablonu.
Poniżej przedstawiona jest pusta klasa na której będziemy bazować w następnych przykładach:

```php
namespace Tulia\Theme\Tulia\Lisa;

use Tulia\Component\Theme\Customizer\Provider\AbstractProvider;
use Tulia\Component\Theme\Customizer\CustomizerInterface;

class Customizer extends AbstractProvider
{
    public function build(CustomizerInterface $builder): void
    {
        
    }
}
```

Jak widać, wymagana jest metoda `build()`, która odpowiada za zbudowanie konfiguracji Customizera dla twojego szablonu.
Do metody tej przekazywany jest argument `$builder`, który przechowuje pełną konfigurację Customizera dla danego
szablonu. Jest ona indywidualna i przypisana tylko dla aktywnego szablonu, tak więc nawet jeśli zainstalowanych
jest na stronie 5 szablonów, Customizer konfiguruje tylko i wyłącznie aktywny szablon.
