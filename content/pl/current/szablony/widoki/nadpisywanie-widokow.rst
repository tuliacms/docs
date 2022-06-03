---
Title: Nadpisywanie widoków - Tulia CMS
Description: Gdzie przechowywać i jak ładować widoki szablonów.
Author: Adam Banaszkiewicz
---

# Nadpisywanie widoków

Podstawową funkcją szablonów jest możliwość nadpisywania widoków systemowych, dzięki czemu można w dowolny
sposób zmieniać wygląd i układ strony. Można nadpisywać tylko poszczególne widoki w zależności od potrzeb,
lub wszystkie dostępne, by całkowicie zmienić wygląd strony.

Taki system szablonów pozwala zbudować praktycznie każdy rodzaj strony na systemie Tulia CMS.

## Co można nadpisać?

- Widoki frontowe systemu CMS (node, taxonomy terms, login, homepage etc),
- Widoki modułów (instalowanych osobno w systemie)
- Widoki widgetów - pomimo tego, że widgety są integralną częścią modułów oraz systemu, to ich widoko są
nadpisywane osobno.

## Położenie plików

Aby nadpisać którykolwiek z widoków, należy umieścić go w odpowiednim miejscu w szablonie. Wszystkie nadpisywane widoki
należy umieszczać w katalogu `/Resources/views/overwrite` a dalej, w zależności od typu widoku kolejno:

#### Widoki frontowe

Przechowywane w katalogu `/Resources/views/overwrite/cms`, a dalej w katalogu typu treści/podstrony, na przykład dla 
node będzie to katalog `/Resources/views/overwrite/cms/node`, a dla strony głównej będzie to
`/Resources/views/overwrite/cms/homepage`.

#### Widoki modułów

Przechowywane w katalogu `/Resources/views/overwrite/module`, a dalej w katalogu z nazwą vendora i modułu, na przykład
`/Resources/views/overwrite/module/Tulia/Faq`.

#### Widoki widgetów

Przechowywane w katalogu `/Resources/views/overwrite/widget`, a dalej w katalogu z identyfikatorem widgetu.
Dla przykładu, jeśli identyfikator widgetu to `tulia.faq`, to katalog z widokiem nazywać się będzie
 `/Resources/views/overwrite/widget/tulia/faq`.

## Flow

Podczas przetwarzania, system sprawdzi czy ten widok istnieje w szablonie. Jeśli tak, wyrenderuje go zamiast
systemowego. Każdy inny widok, którego nie znajdzie w szablonie, zostanie znaleziony w widokach systemowych
(domyślnych), i ten zostanie wyrenderowany.

Takie podejście pozwala nadpisać tylko wybrane widoki, zamiast wszystkich dostępnych w systemie.

## Zasięg

Takie nadpisywanie widoków działa podczas renderowania widoków na podstronie, a także podczas dziedziczenia widoków
czy ładowania widoków w innych widokach, z użyciem skrótu `@theme`.

Lista wszystkich dostępnych widoków, które można nadpisać za pomocą szablonów znajduje się tutaj:
[Lista widoków systemowych](lista-widokow-systemowych).
