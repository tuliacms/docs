---
Title: Budowanie konfiguracji - Tulia CMS
Description: Jak zbudować sekcje z konfiguracjami szablonu z uzyciem Customizera?
Author: Adam Banaszkiewicz
---

# Budowanie konfiguracji

Konfiguracja Customizera składa się z dwóch rzeczy: sekcji oraz pól formularza. Sekcje pozwalają grupowac wiele pól
pod względem ich docelowego umieszczenia czy zawartości. Sekcje mogą być również zawierane w innych sekcjach, dzięki
czemu można tworzyć zagnieżdżane sekcje jedna w drugiej. Pola formularza natomiast przypisane są do konkretnych
sekcji i mogą być różnego typu.

Dowiesz się tutaj jak używać Customizera do zbudowania konfiguracji szablonu.

## Sekcje

Poniżej zawarty jest przykład sekcji, wraz ze wszystkimi dostępnymi polami konfiguracyjnymi. Konfiguracja ta opisana
jest poniżej.

```php
// Główna sekcja
$builder->addSection('lisa.footer', [
    'label' => 'Stopka',
]);

// Podsekcja, która posiada `parent`
$builder->addSection('lisa.footer.contact', [
    'label'  => 'Kontakt',
    'parent' => 'lisa.footer',
]);
```

Metoda `addSection()` przyjmuje dwa argumenty. Pierwszym jest nazwa sekcji. Nazwa ta musi być unikalna, jest używana
do identyfikowania które pola są przypisane do danej sekcji oraz w samym JavaScripcie do tego, by włączyć/pokazać
odpowiednie sekcje po ich wybraniu. Zalecane jest używanie małych liter oraz podkreślników, oraz kropek w formie
separatorów. Drugim argumentem jest tablica z konfiguracją sekcji, podajemy w niej:

- `label` - nazwa sekcji, wyświetlana w panelu administracyjnym
- `parent` - ID sekcji w której ma być zamieszczona dana sekcja. Tworzy podsekcje.

Ilość sekcji jest nieograniczona.

## Pola konfiguracyjne

Do sekcji przypisujemy pola konfiguracyjne. Poniżej przykład pola tekstowego wraz z opisem.

```php
$builder->addControl('lisa.footer.socials.facebook', 'text', [
    'label'     => 'Facebook',
    'section'   => 'lisa.footer.socials',
    'value'     => '#facebook',
]);
```

Metoda `addControl()` przyjmuje trzy argumenty: nazwaę pola (podobnie jak nazwa sekcji, zalecane jest używanie małych
liter, podkreślników oraz kropek jako separatorów), typ pola (np. tekst, lista wyboru czy manager plików) oraz
tablicę z konfiguracja pola danego typu.

Podstawowymi kluczami konfiguracyjnymi, które są dostępne dla wszystkich typów pól są:

- `label` _(wymagane)_ - nazwa pola, wyświetlana w panelu administracyjnym
- `section` _(wymagane)_ - nazwa sekcji, do której to pole należy, w której ma zostać wyświetlone
- `value` - wartość domyślna tego pola, pokazywana gdy pierwszy raz ktoś modyfikuje szablon za pomocą customizera
- `transport` - oznacza w jaki sposób ma zostać zaktualizowana strona gdy zmieni się wartość tego pola. Więcej
informacji znajdziesz na stronie [Aktualizacja podglądu](./aktualizacja-podgladu).

### Dostępne typy pól

Poniżej znajdziesz listę dostępnych rodzajów pól, które można używać w Customizerze, a także ich indywidualne
klucze konfiguracyjne.

- `text`
- `textarea`
- `select`
- `radio`
- `checkbox`
- `filepicker`

#### # `select`

- `choices` - tablica dostepnych wartości do wyboru. Kluczem tablic jest wartość zapisywana w systemie, a wartością jest
nazwa wyświetlana w panelu administracyjnym.
