---
Title: Konfiguracja pliku Theme.php - Tulia CMS
Description: This description will go in the meta description tag
Author: Adam Banaszkiewicz
---

# Konfiguracja pliku Theme.php

Plik `Theme.php` to główny plik szablonu, przechowuje podstawowe informacje o nim, takie jak nazwa, autor,
wersja czy szablon pochodny (Parent Theme). Jest to jedyny plik szablonu, który musi istnieć by szablon działał.
Z tego artykułu dowiesz się jak go poprawnie skonfigurować.

## Podstawowa treść pliku

```php
// extension/theme/Tulia/Lisa/Theme.php

namespace Tulia\Theme\Tulia\Lisa;

use Tulia\Component\Theme\AbstractTheme;

class Theme extends AbstractTheme
{
}
```

Początek przestrzeni nazw (`namespace`) każdego szablonu zaczyna się od `Tulia\Theme`, po czym występuje nazwa vendora
(autora szablonu) a następnie nazwa szablonu.
Jest to wymuszone przez autoloading. W naszym przypadku jest to szablon o nazwie `Lisa`, który umieszczony jest w
katalogu `/extension/theme/Tulia/Lisa`.

Pusty plik `Theme.php` wystarczy by uruchomić szablon. Oczywiście bez widoków czy zasobów publicznych
(zdjęcia, pliki CSS/JS) strona wyświetli się za pomocą domyślnych widoków dostępnych w systemie, jednak jest to punkt
startowy pracy nad szablonem.

Poniżej znajduje się opis wszystkich dostępnych pól szablonu.

- `$parent` - Nazwa szablonu-rodzica (Parent Theme). Więcej informacji:
[Dziedziczenie szablonów (Parent/Child Theme)](dziedziczenie-szablonow-parent-child-theme).
- `$version` - Wersja szablonu. W przypadku gdy
szablon jest tworzony tylko dla danego klienta/strony, i nie będzie uaktualniany przez system aktualizacji, nie trzeba
podawać wersji. W przypadku gdy chcesz udostępnić szablon dla społeczności, chcesz go sprzedawać i mieć możliwość
publikowania jego aktualizacji, należy podać wersję i podnosić ją zgodnie z [Semantic Versioning 2.0.0](https://semver.org/lang/pl/).
- `$author` - Autor szablonu. Nazwa firmy lub imię i nazwisko/pseudonim autora.
- `$authorUrl` - Adres URL do strony autora szablonu.
- `$info` - Krótka informacja o szablonie, widoczna na liście szablonów w systemie.
- `$thumbnail` - Link do podglądu szablonu (plik JPG lub PNG). Pojawia się ono na liście szablonów, aby ułatwić identyfikację szablonu. Ścieżka względna do katalogu `/public`, na przykład `/assets/theme/lisa/thumbnail.jpg`.
