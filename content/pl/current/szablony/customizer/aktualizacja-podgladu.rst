---
Title: Aktualizacja podglądu - Tulia CMS
Description: Jak zaktualizować podgląd na żywo, bez odświeżania strony?
Author: Adam Banaszkiewicz
---

# Aktualizacja podglądu

Domyślnym sposobem na odświeżanie podglądu podczas konfiguracji strony za pomocą Customizera jest jej zwykłe
przeładowanie. Takie zachowanie działa dla wszystkich typów pól. Można jednak zmienić to zachowane, i aktualizować
podgląd praktycznie na żywo.

Dowiesz się tutaj jak należy skonfigurować pole oraz szablon, by móc aktualizować podgląd na żywo.

## Transport

Przy każdym polu, które chcesz by zostało odświeżane na żywo, należu zdefiniować w tablicy konfiguracyjnej
klucz `transport` z wartością `postMessage`. Poinformuje to system, że gdy zmieni się wartość tego pola, system nie
powinien odświeżyć całej strony, a tylko poinformować podgląd o tym, że się data wartość zmieniła.

```php
$builder->addControl('lisa.footer.socials.facebook', 'text', [
    // ...
    'transport' => 'postMessage',
]);
```

## Listener

Drugim krokiem jest stworzenie listenera w JavaScripcie, który będzie nasłuchiwał tej zmiany. Gdy zmiana w tym polu
zostanie wykonana, listener ten będzie odpowiedzialny za zaktualizowanie danego elementu na stronie na żywo.

### Przygotowanie zasobu z listenerami

Aby listenery poprawnie działały, należy je załadować na stronie, ale tylko w teddy, gdy włączony jest tryb podglądu
Customizera. Najlepszym rozwiązaniem jest stworzenie odrębnego, dedykowanego pliku `customizer.js`, zarejestrowanie
do jako zasób w pliku konfiguracyjnym `/Resources/config/assets.php`, a następnie załadowanie go tylko w momencie, gdy
jest włączony tryb Customizera (metoda `configureCustomizer()` w klasie `Configurator` szablonu).

Więcje na temat takiej konfiguracji znajdziesz na stronie [Konfiguracja assetów](../konfiguracja-assetow).

### Wdrożenie listenera

Listener wygląda następująco:

```js
customizer.customized('lisa.footer.socials.facebook', function (value) {
    // Aktualizacja elementu na stronie...
});
```

W trybie Customizera, na stronie dostępny jest obiekt `customizer`, który zawiera metodę `customized()`. Pierwszym
argumentem jest nazwa pola, na jaki chcemy nasłuchiwać, drugim natomiast funkcja która zostanie wywołana gdy wartość
tego pola się zmieni. Funkcja ta przyjmuje jako argument wartość tego pola.

W funkcji tej należy zaimplementować kod który zaktualizuje element w podglądzie. Na przykład zmieni wartość atrybutu
`href` dla linku facebooka, czy podmieni tekst nagłówka czy zdjęcie baneru.
