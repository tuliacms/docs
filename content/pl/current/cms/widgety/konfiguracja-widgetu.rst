---
Title: Konfiguracja widgetu - Tulia CMS
Description: Jak dodać opcje konfiguracyjne, które zmianią zachowanie widgetu w Tulia CMS.
Author: Adam Banaszkiewicz
---

# Konfiguracja widgetu

Podstawowa wersja widgetu nie pozwala na zbytnie szaleństwo, można wyświetlić widok a w nim jakiś tekst. Można jednak
dodać konfigurację do widgetu, dzięki której dodając go z poziomu panelu administracyjnego do wybranego miejsca
na stronie, będziemy mogli zdefiniować co i w jaki sposób ma zostać wyświetlone.

Na potrzeby przykładu rozważymy dodanie pola WYSIWYG, dzięki któremu z poziomu panelu administracyjnego będziemy
mogli dodać tekst, który wyświetlimy później na stronie.

## Formularz

Opcje konfiguracyjne widgetu definiowane są w formularzu. Formularze w Tulia CMS są oparte na komponencie
[Symfony Forms](https://symfony.com/doc/5.1/components/form.html). Dostępne są więc wszystkie funkcjonalności, które
udostępnia ten komponent i podlinkowana dokumentacja.

Stwórzmy więc nasz formularz z polem na edytor WYSIWYG. Formularz nazwiemy podobnie jak nasz widget, tylko z innym
suffixem. Widget z poprzedniej strony nazywał się `TextWidget`, więc nasz formularz nazwiemy `TextForm`.
Zamieścimy go w tym samym katalogu co nasz Widget. Poniżej znajduje się minimalna konfguracja takiego formularza,
z polem na wprowadzenie tekstu za pomocą edytora WYSIWYG.

```php
namespace Tulia\Theme\Tulia\Lisa\Widget;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Tulia\Cms\WysiwygEditor\Infrastructure\Framework\Form\FormType\WysiwygEditorType;

class TextForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('content', WysiwygEditorType::class);
    }
}
```

## Widok formularza

Aby formularz został poprawnie wyświetlony w zapleczu, podczas dodawania/edycji widgetu, nalezy stworzyć widok, który
ten formularz wyrenderuje. Widok zamieścimy w tym samym katalogu co widok frontowy, tylko nazwiemy go `backend.tpl`.
Poniżej znajduje się przykładowy widok, który renderuje jedno pole, z edytorem WYSIWYG.

```twig
{# /Resources/views/widget/text/backend.tpl #}

{{ form_row(form.content) }}
```

Zauważ, że renderujemy tylko to jedno pole - nie ma tutaj tagów rozpoczynających i kończących formularz. W zapleczu,
formularz ten jest integralną częścią głównego formularza, i nie musimy (a nawet nie możemy) dodawać tutaj tagów
rozpoczynających/kończących formularz.

## Pokazanie formularza w zapleczu

Ostatnim krokiem jest pokazanie tego pola z formularza w zapleczu, podczas dodawania/edycji widgetu. Będą nam do tego
potrzebne dwie dodatkowe metody, które dodamy do klasy widgetu:

- `getForm()` - która zwraca nazwe formularza widgetu, który ma zostać użyty.
- `getView()` - która zwraca widok oraz dane które mają zostać do niego wysłane w zapleczu.

Stwórzmy więc nasze metody w klasie widgetu.

```php
namespace Tulia\Theme\Tulia\Lisa\Widget;

use Tulia\Component\Templating\ViewInterface;
use Tulia\Component\Widget\AbstractWidget;
use Tulia\Component\Widget\Configuration\ConfigurationInterface;

class TextWidget extends AbstractWidget
{
    public function getView(ConfigurationInterface $config): ?ViewInterface
    {
        return $this->view('backend.tpl');
    }

    public function getForm(ConfigurationInterface $config): ?string
    {
        return TextForm::class;
    }

    // Pozostałe istniejące metody...
}
```

Zauważ, że w metodzie `getView()`, która zwraca widok, nie jest przesyłany formularz. Jest on natomiast automatycznie
wstrzykiwany podczas renderowania tego widoku, i dostępny w zmiennej `form`.

Teraz możesz edytować/stworzyć widget i zobaczysz, że w miejscu gdzie wcześniej było pusto, teraz widnieje edytor
WYSIWG. W taki sposób możesz dodawać kolejne pola w zależności od potrzeb.

## Wyświetlenie konfiguracji na froncie

Za wyświetlenie widgetu na stronie odpowiada znana już metoda `render()`. W argumencie przyjmuje ona obiekt interfejsu
`Tulia\Component\Widget\Configuration\ConfigurationInterface`, który przechowuje konfigurację i wartości z formularza,
które zostały zapisane podczas dodawania/edycji widgetu.

Możemy więc zmodyfikować nasza metodę, i wysłać zapisaną treść z edytora WYSIWYG do widoku na stronę, który pokaże ten
tekst.

```php
namespace Tulia\Theme\Tulia\Lisa\Widget;

use Tulia\Component\Templating\ViewInterface;
use Tulia\Component\Widget\AbstractWidget;
use Tulia\Component\Widget\Configuration\ConfigurationInterface;

class TextWidget extends AbstractWidget
{
    public function render(ConfigurationInterface $config): ?ViewInterface
    {
        return $this->view('frontend.tpl', [
            'content' => $config->get('content'),
        ]);
    }

    // Pozostałe istniejące metody...
}
```

Do widoku wysyłamy treść z edytora, która zapisana jest w konfiguracji pod nazwą `content`, i pod taką samą nazwą
będzie dostępna ta treść w widoku. Możemy więc zmienić nasz widok frontowy by wyświetlił tą treść ze zmiennej.
Dodamy tylko filtr `raw` by Twig pokazał kod HTML bez jakiegokolwiek filtrowania.

```twig
{# /Resources/views/widget/text/frontend.tpl #}

{{ content|raw }}
```

Gotowe, teraz gdy odświeżysz stronę, zobaczysz tekst wprowadzony w edytorze z poziomu zaplecza.
