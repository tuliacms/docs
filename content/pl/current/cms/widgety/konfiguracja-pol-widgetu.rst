---
Title: Konfiguracja pól widgetu - Tulia CMS
Description: jak dodać wartości domyślne oraz zdefiniować tłumaczenia pól dla różnych języków w Tulia CMS.
Author: Adam Banaszkiewicz
---

# Konfiguracja pól widgetu

Podstawowa funkcjonalność widgetu, to zapisanie konfiguracji z pól formularza dostepnych z poziomu panelu
administracyjnego. Jednak z czasem jest to niewystarczające, na przykład w tedy gdy w trakcie aktualizacji
dodajemy nowe pole, albo tłumaczymy naszą stronę na wiele języków. Dowiesz się tutaj jakie opcje konfiguracyjne dla
pól widgetu udostępnia Tulia CMS.

## Metoda `configure()`

Cała konfiguracja opisana w tym artykule odbywa się w metodzie `configure()`, która należy stworzyć w klasie widgetu.
Przyjmuje ona w argumencie obiekt interfejsu `Tulia\Component\Widget\Configuration\ConfigurationInterface`, na którym
należy wykonywać operacje konfiguracji.

Metoda ta wykonywana jest w nastepujących miejscach:

- przy tworzeniu widgetu w panelu administracyjnym, na samym początku tuż przed wykonaniem innych metod widgetu
- przy edycji widgetu w panelu administracyjnym, na samym początku tuż przed wykonaniem innych metod widgetu
- przy wyświetlaniu widgetu na stronie, na samym początku tuż przed wstrzyknięciem zapisanych wartości z konfiguracji
widgetu zapisanych w panelu administracyjnym

## Konfiguracja zależna od języka

Bardzo często zdarza się, że widget zawiera pola tekstowe, które muszą zawierać teksty zależne od języka na stronie.
W sytuacji gdy stronę mamy przetłumaczoną na język angielski i niemieckim, warto by widgety również miały
przetłumaczone teksty.

Aby zdefiniować, które pola mają zostać zapisywane w zależności od języka, należy użyć metody `multilingualFields()`,
która przyjmuje jako parametr tablice z nazwami pól, które mają być językowe.

```php
use Tulia\Component\Widget\Configuration\ConfigurationInterface;

public function configure(ConfigurationInterface $configuration): void
{
    $configuration->multilingualFields(['content', 'title']);
}
```

## Domyślna wartość pola

W przypadku gdy potrzebujemy nadać jakąś domyślną wartość pola, należy użyć metody `set()`.

```php
use Tulia\Component\Widget\Configuration\ConfigurationInterface;

public function configure(ConfigurationInterface $configuration): void
{
    $configuration->set('content', '');
}
```
