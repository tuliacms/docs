---
Title: Szablony - Tulia CMS
Description: Jak wdrożyć szablon oraz zmienić wygląd strony internetowej opartej na Tulia CMS.
Author: Adam Banaszkiewicz
---

# Szablony

Szablon odpowiada za wygląd strony, każdy posiada domyślną konfigurację i Customizer, dzięki któremu można
zmienić jego układ czy wygląd.

W tym rozdziale dowiesz się jak zbudowane są szablony, jak je tworzyć i konfigurować.

## Położenie plików na serwerze

Szablony przechowywane są w katalogu `/extension/theme`. W nim każdy szablon przechowywany jest w katalogu z nazwą
Vendora, a wewnątrz w katalogu z nazwą szablonu. Na przykład `Tulia/Lisa`, `MyThemes/SuperDuperTheme` itd.
Nie ma ograniczenia dotyczącego zainstalowanych szablonów na stronie, jednak tylko jeden szablon
może być aktywny na raz, na jednej stronie.

W katalogu jednego vendora może znajdować sie wiele szablonów. Struktura ta pozwala pozwala uniknąć sytuacji, gdy kilku
producentów szablonów stworzy szablon o tej samej nazwie. Mogłoby to doprowadzić do nadpisywania plików i nieoczekiwanych
błędów systemu.

Nazwy katalogów vendorów oraz szablonów, poza tymi znajdującymi się w katalogu `/Resources`, muszą być pisane z
użyciem stylu `CamelCase`.

## Struktura katalogów

```text
VendorName\
    ThemeName\
        Resources\
            config\
                assets.php
                services.php
            views\
            public\
        Configurator.php
        Customizer.php
        Theme.php
```

### Resources\config

Katalog przechowuje konfigurację szablonu, podzieloną na poszczególne pliki PHP.

- `assets.php` - lista assetów (biblioteki CSS/JS) wraz z ich zależnościami, które szablon może ładować na stronie.
- `services.php` - definicje serwisów, z których korzysta szablon (w tym widgety).

### Resources\views

Katalog z widokami. Domyślnie przechowuje się tutaj widoki, które nadpisują widoki domyślne systemu. To dzięki
tym widokom możemy zmieniać wygląd i układ strony. Oprócz widoków które nadpisują te systemowe, można również definiować
swoje własne widoki czy makra, które z łatwością można używać w całym szablonie.

### Resources\public

Katalog z zasobami publicznymi, takimi jak obrazki, pliki CSS/JS. Podczas instalowania szablonu, zawartość tego katalogu
jest kopiowana do katalogu publicznego systemu, tak, by pliki te były dostępne z poziomu przeglądarki.

### Configurator.php

Plik zawiera klasę `Configurator`, dzięki której możemy skonfigurować szablon, nadać domyślne ustawienia i parametry
wpływające na działanie i wygląd szablonu.

### Customizer.php

Plik zawiera klasę `Customizer`, która odpowiada za rejestrację pól konfiguracji szablonu w systemie. Dzięki tej opcji,
można skonfigurować szablon praktycznie w dowolny sposób.

### Theme.php

Główny plik szablonu, przechowuje podstawowe informacje o nim, takie jak nazwa, autor, wersja czy szablon pochodny
(Parent Theme).

## Podstawowa struktura

Powyższa struktura plików zawiera wszystkie dostępne pliki i katalogi. Aby szablon można było używać wystarczy ich
o wiele mniej. Aby można było użyć szablonu, musi on posiadać plik `Theme.php` oraz katalog z widokami, jak poniżej.

```text
VendorName\
    ThemeName\
        Resources\
            views\
        Theme.php
```

Przejdź dalej, by dowiedzieć się [jak skonfigurować plik Theme.php](szablony/konfiguracja-pliku-theme-php).
