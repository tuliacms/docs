---
Title: Wprowadzenie do używania Gulpa w projekcie - Tulia CMS
Description: Podstawy użycia Gulp'a w projekcie opartym na Tulia CMS.
Author: Adam Banaszkiewicz
---

# Wprowadzenie do używania Gulpa w projekcie

Nie musisz znać Gulpa aby móc skorzystac z jego dobrodziejstw. Przygotowaliśmy podstawowe pliki konfiguracjne, dzięki
którym uruchomisz Gulpa oraz będziesz mógł wdrażać szablon bez potrzeby samodzielnej konfiguracji.

Znajdziesz tutaj informacje, jak krok po kroku podpiąć Gulpa do swojego projektu, za pomocą przygotowanych już plików
konfiguracyjnych.

## Struktura katalogów

Głównym katalogiem w którym będzie pracował Gulp to katalog `/Resources/public/app`. W nim należy zamieścić plik
`gulpfile.js` oraz `package.json` z potrzebnymi zależnościami. Pliki te możesz pobrać za pomocą poniższych linków:

- [Plik `gulpfile.js`](%assets_url%/uploads/doc-attachments/current/gulp/gulpfile.js).
- [Plik `package.json`](%assets_url%/uploads/doc-attachments/current/gulp/package.json).

Pobierz te pliki i zamieść je w katalogu `/Resources/public/app` w swoim szablonie.

## Zainstalowanie zależności

Przed użyciem Gulpa należy zainstalować wszystkie zależności. Wykonasz to odpalając następujące polecenie w terminalu,
i podając nazwę swojego szablonu zamiast `{nazwa_szablonu}`:

```bash
$_> bin/theme gulp:install {nazwa_szablonu}
```

## Uruchomienie

Domyślne polecenie nasłuchuje wszystkich zmian w plikach w katalogu `/Resources/public/app/src`, i gdy jakakolwiek
zmiana nastąpi, kompiluje kod SASS i publikuje wszystkie zasobu w katalogu publicznym na serwerze, by były dostępne
z poziomu przeglądarki.

Aby uruchomić to nasłuchiwanie odpal w terminalu następujące polecenie:

```bash
$_> bin/theme gulp {nazwa_szablonu}
```

Polecenie to będzie działało w tle i reagowało na każdą zmianę w plikach. Aby zakończyć działanie tego polecenia użyj
kombinacji <kbd>CTRL</kbd> + <kbd>C</kbd>.

## Style szablonu

Domyślnie możesz używać zwykłego CSS aby stylować swój szablon, jednak istnieje możliwość stylowania za pomocą
SASSa. Pliki ze stylem SASS należy umieścić w katalogu `/Resources/public/app/src/sass`, i przy kompilacji wylądują
one docelowo w katalogu `/Resources/public/app/dist/css`.
