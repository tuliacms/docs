Import/Export
============

Importer wykorzystywany jest do uzupełniania systemu przykładowymi danymi, na przykład podczas
instalacji szablonu lub pierwszego uruchomienia strony. Importer działa na plikach w formacie JSON.
Każdy plik zawiera obiekty do importu. Obiekty posiadają swój schemat (Schema) w konfiguracji modułu,
oraz osobne importery, które odpowiedzialne są za właściwe zapisanie obiektu z importowanego pliku,
do systemu.

Plik z danymi do importu
------------------------

Pliki przechowują dane w formacie JSON, o konkretnej strukturze. Plik przechowuje obiekty
do importu. Każdy z obiektów musi posiadać swój typ (``@type``) oraz pola z danymi do zaimportowania.
Przykładowy plik importu z jednym wpisem:

.. code-block:: json
    {
        "objects": [
            {
                "@type": "Node",
                "type": "page",
                "title": "Homepage"
            }
        ]
    }

Plik oczywiście może zawierać wiele więcej obiektów, każdy w nowym elemencie tablicy ``objects``.

.. tip:: Wskazówka
    Wszystkie dostępne typy obiektów możliwe do zaimportowania w systemie znajdziesz w
    :doc:`Lista dostępnych obiektów do importu <lista-dostepnych-obiektow-do-importu>`.

Niektóre obiekty zawierają w sobie inne obiekty. Na przykład podczas importowania Menu,
importujemy również zakładki tego Menu. Z definicji typu ``Menu`` wynika, że elementy Menu
powinny znajdwać się w polu ``items``. Przykład takiego zagnieżdżenia wygląda następująco.

.. code-block:: json
    {
        "objects": [
            {
                "@type": "Menu",
                "name": "Main menu",
                "items": [
                    {
                        "@type": "MenuItem",
                        "name": "Homepage"
                    },
                    {
                        "@type": "MenuItem",
                        "name": "About us"
                    },
                    {
                        "@type": "MenuItem",
                        "name": "Contact"
                    }
                ]
            }
        ]
    }

.. tip:: Uwaga
    Zauważ, że elementy podrzędne również posiadają pole ``@type``. Każdy element, bez względu na to
    czy jest to główny obiekt, czy podrzędny na którymkolwiek poziomie, musi posiadać informacje
    o swoim typie. Jest to wymagane przez walidator schematu obiektów (Schema Validator).

Konfiguracja schematu obiektów
------------------------------

Aby można było zaimportować jakikolwiek obiekt, należy zdefiniować jego schemat, by system wiedział
jak go obsłużyć i zapisać w systemie. Konfigurację przechowują pliki ``config.yaml`` w modułach.

Załóżmy, że robimy katalog produktów. Posiadamy więc Produkty. Produkt posiada nazwę, opis oraz
widoczność na stronie. Zróbmy więc konfigurację takiego obiektu.

.. code-block:: yaml
    cms:
        importer:
            objects:
                Product:
                    mapping:
                        name: ~
                        description:
                            required: false
                        visible:
                            type: boolean
                            default_value: true

W naszym przypadku opis nie jest wymagany. Domyślnie jednak każde pole jest wymagane więc musimy
ręcznie zmienić wymagalność. Posiadamy widoczność, ale nie chcemy by za każdym razem trzeba było ją
podawać, więc domyślnie przyjmujemy, że wszystkie importowane produkty są widoczne.
Domyślnie również wszystkie pola są typu ``string``. Dostępne typy pól to:

.. raw:: html
    <table class="table">
        <thead>
            <tr>
                <th>Typ</th>
                <th>Opis</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>string</code></td>
                <td>Ciąg znaków</td>
            </tr>
            <tr>
                <td><code>boolean</code></td>
                <td>Wartość logiczna</td>
            </tr>
            <tr>
                <td><code>integer</code></td>
                <td>Liczba</td>
            </tr>
            <tr>
                <td><code>scalar</code></td>
                <td>Wartość skalarna</td>
            </tr>
            <tr>
                <td><code>number</code></td>
                <td>Numer</td>
            </tr>
            <tr>
                <td><code>array</code></td>
                <td>Tablica</td>
            </tr>
            <tr>
                <td><code>one_dimension_array</code></td>
                <td>Tablica jednowymiarowa</td>
            </tr>
            <tr>
                <td><code>uuid</code></td>
                <td>UUID</td>
            </tr>
            <tr>
                <td><code>datetime</code></td>
                <td>Data i czas w formacie <code>Y-m-d H:i:s</code></td>
            </tr>
        </tbody>
    </table>

Importer obiektu
----------------

Ostatnim krokiem będzie stworzenie samego importera obiektów. Importer to klasa implementująca
``Tulia\Component\Importer\ObjectImporter\ObjectImporterInterface``. Powinna być umiejscowiona w
warstwie Infrastruktury. Stwórzmy więc importer naszego katalogu produktów.

.. code-block:: php
    namespace Tulia\Cms\Products\Infrastructure\Cms\Importer;

    use Tulia\Component\Importer\ObjectImporter\ObjectImporterInterface;
    use Tulia\Component\Importer\Structure\ObjectData;

    class ProductImporter implements ObjectImporterInterface
    {
        public function import(ObjectData $objectData): ?string
        {
            $this->creator->create(
                $objectData['name'],
                $objectData['description'] ?? '',
                $objectData['visibility'],
            );
        }
    }

Interfejs wymaga metody ``import()``, która przyjmuje w argumencie obiekt klasy
``Tulia\Component\Importer\Structure\ObjectData``. Przechowuje on wszystkie dane importowanego
obiektu. DOstęp do tych danych uzyskasz przez odwoływanie się do obiektu jak to tablicy.

Obiekt ten rownież zawiera definicję importowanego obiektu (listę pól i ich typy). Możesz się
do niej dostać poprzez wywołanie ``$objectData->getDefinition()``.

Teraz wystarczy przypisać klase Importera do obiektu, który ma importować. Zrobisz to dodając FQCN
do konfiguracji YAML:

.. code-block:: yaml
    cms:
        importer:
            objects:
                Product:
                    importer: 'Tulia\Cms\Products\Infrastructure\Cms\Importer\ProductImporter'
                    mapping: # Dotychczasowa lista pól...

Czytaj więcej
#############

- :doc:`Zależności pomiędzy obiektami <zaleznosci-pomiedzy-obiektami>`
- :doc:`Import wielojęzycznych obiektów <import-wielojezycznych-obiektow>`
- :doc:`Import obiektów zależnych od autora <import-obiektow-zaleznych-od-autora>`
- :doc:`Lista dostępnych obiektów do importu <lista-dostepnych-obiektow-do-importu>`
