Customizer
==========

Customizer umożliwia konfigurację motywu za pomocą praktycznego sidebara z opcjami konfiguracyjnymi.
Każdy motyw może być konfigurowalny za pomocą Customizera. To, jak bardzo będzie on w taki sposób
konfigurowalny zależy tylko od developera wdrażającego motyw. Poznasz teraz w jaki sposób skonfigurować
motyw do działania z Customizerem.

Konfiguracja motywu
###################

Konfiguracja dostępnych kontrolek w Customizerze dla motywu znajduje się w pliku konfiguracyjnym motywu
``/Resources/config/config.yaml``, w polu ``cms.theme.configuration.{theme/name}.customizer``.
Konfiguracja Customizera składa się z trzech części, Zaczniemy od dodania i konfiguracji sekcji i kontrolek.

Sekcje i kontrolki konfiguracyjne
_________________________________

Pod wcześniej pokazanym kluczem motywu dodajemy klucz ``builder``, który przechowuje sekcje i kontrolki,
które mają się w tej sekcji znaleźć. Sekcje mogą być grupowane w innych sekcjach. Każda sekcja może zawierać
nieograniczoną liczbę kontrolek. Zacznijmy się od przykładu w którym zdefiniujemy kolor wiodący motywu.

.. code-block:: yaml

    cms:
        theme:
            configuration:
                Vendor/MyTheme:
                    customizer:
                        builder:
                            lisa.colors:
                                label: Colors
                                controls:
                                    lisa.color.primary:
                                        type: colorpicker
                                        label: Primary color
                                        value: '#0f61b9'

Tylko dla tego przykładu podana została pełna ścieżka konfiguracji Customizera. W dalszej części artykułu
pominięte zostanie wszystko aż do klucza ``builder``.

Omówimy teraz poszczególne części konfiguracji:

- linia 7 - najpierw definiujemy sekcję, w której zamieścimy kontrolki
- linia 8 - podajemy jej nazwę wyświetlaną sekcji
- linia 9 - podajemy listę kontrolek w tej sekcji
- linia 10 - każda kontrolka musi mieć unikalną nazwę, po niej będzie można się dostać do wartości kontrolki
- linia 11 - podajemy typ kontrolki. Domyślnie będzie to zawsze pole tekstowe.
  Listę typów kontrolek znajdziesz :ref:`tutaj<lista-typow-kontrolek>`.
- linia 12 - nazwa wyświetlana kontrolki
- linia 13 - możesz również podać wartość domyślną

.. tip:: Sekcja w sekcji

    Możesz zamieścić sekcję w innej sekcji. Aby to zrobić, wystarczy, że podasz klucz ``parent`` z nazwą
    sekcji nadrzędnej:

    .. code-block:: yaml

        lisa.colors.dedicated:
            label: Dedicated colors
            parent: lisa.colors

Dobrą praktyką jest nadawanie przedrostków do nazw sekcji i kontroler w postaci nazwy motywu.
Może to przeciwdziałać potencjalnym problemom z duplikacjami nazw.

Konfiguracja typów kontrolek
____________________________

Niektóre kontrolki posiadają swoją konfogurację. Na przykład typ ``select`` umożliwia podanie
listy opcji, które mają się znaleść w kontrolce. Konfigurację kontrolki definiujemy
w kluczu ``control_options``. Przykład kontrolki z dwopa opcjami do wyboru:

.. code-block:: yaml
    lisa.control:
        label: Control
        type: select
        control_options:
            choices: { yes: Do it, no: Dont do it }

Wyświetlenie wartości kontrolki w widoku
########################################

Gdy mamy już zapisane wartości customizera, przyszła pora na wyświetlenie tej wartości w widoku.
Za to odpowiedzalna jest funkcja ``customizer_get()`` do której podajemy nazwę kontrolki.
Zwróci ona wartość zapisaną w customizerze, lub wartość domyślną z konfiguracji YAML jeśli jeszcze
customizer nie został użyty. Przykład:

.. code-block:: twig

    <div>{{ customizer_get('lisa.control') }}</div>

Podgląd bez przeładowania
_________________________

Domyślnie wszystkie kontrolki zdefiniowane w motywie odświeżają się poprzez przeładowanie strony.
Możesz natomiast użyć innej metody transportu danych do podglądu o nazwie ``postMessage``, dzięki której
system wyśle zmienioną wartość kontrolki do podglądu bez przeładowania. Jednak w przypadku takiego
rozwiązania musisz pamiętać by wdrożyć odpowiedni kod, który będzie na żywo aktualizował wybrany element.
System posiada wbudowaną funkcję ``customizer_live_control()``, która trochę przysiesza proces
implementacji ``postMessage``.

Ale najpierw konfiguracja. Aby móc użyć tego rodzaju odświeżania do kontrolki należy dodać opcję
``transport: postMessage``. System w tedy zacznie inaczej traktować zmiany w tej kontrolce.

.. code-block:: yaml
    lisa.control:
        label: Control
        transport: postMessage

Aby wyświetlić prosty typ kontrolki (wartość tekstową wprowadzić do elementu HTML), na przykład
jakąś treść wstawić do DIVa, wystarczy użyć funkcji ``customizer_live_control()``. System zajmie
się aktualizacją automatycznie.

.. code-block:: twig

    <div {{ customizer_live_control('lisa.control') }}>
        {{ customizer_get('lisa.control') }}
    </div>

Funkcja ta zwraca atrybuty HTML, które nadane na element w którym została używa, mówią systemowi,
że ten element ma być aktualizowany na żywo. Zauważ, że mimo wstrzyknięcia funkcji
``customizer_live_control()``, nadal została funkcja ``customizer_get()``. Jest to spowodowane tym,
że dany element będzie aktualizowany na żywo przez system, ale mimo wszystko wartość w tym elemencie
musi być wyświetlona również bez włączonego trybu edycji Customizer w Panelu Administracyjnym
- prościej mówiąc: "na produkcji".

Wielojęzyczność wartości
########################

Jeśli jakaś wartość ma być zależna od języka, nadaj jej w konfiguracji wartość ``true`` w polu
``multilingual``:

.. code-block:: yaml
    lisa.control:
        label: Control
        multilingual: true

Tłumaczenia nazw
################

Domyślnie wszystkie nazwy (``label``) sekcji i pól są wyświetlane bezpośrednio z konfiguracji. Możesz
natomiast je przetłumaczyć. Aby to zrobić, wystarczy zdefiniować domenę tłumaczeń dla motywu, zdefiniować
tłumaczenia w plikach, a następnie zamiast nazwy w polu ``label`` użyć klucza translacji:

.. code-block:: yaml
    lisa.control:
        label: customizer.control

Na takiej zasadzie przetłumaczysz:

- ``label`` kontrolek
- ``label`` sekcji

.. _lista-typow-kontrolek:
Lista typów kontrolek
#####################

- ``text`` - pole tekstowe
- ``select`` - pole jednokrotnego wyboru
    .. code-block:: yaml
        control_options:
            choices: { yes: Do it, no: Dont do it }
- ``filepicker`` - pole wyboru pliku
    .. code-block:: yaml
        control_options:
            file_type: image
- ``colorpicker`` - wybór koloru na palecie barw
- ``yes_no`` - jednokrotny wybór z opcjami "Tak" i "Nie"

Czytaj więcej
#############

- :ref:`Jak używać zmiennych CSS do edycji wyglądu motywu?<zmienne-css>`
- :ref:`Jak stworzyć gotowe konfiguracje (changesets)?<gotowe-konfiguracje-customizera>`
