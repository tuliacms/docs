Zależności pomiędzy obiektami
=============================

Czasami potrzebujemy zaimportować dwa obiekty, które są od siebie zależne. Dobrym przykładem
będzie import Menu oraz Widgetu który to menu ma wyświetlić. Aby import zadziałał, musimy zaimportować
Widget z identyfikatorem Menu, które ma wyświetlić. Do takich zależności powstało specjalne pole ``@id``
w obiektach.

Pole ``@id``
------------

Pole ``@id`` przechowuje identyfikator obiektu na potrzeby importu - podaj je tylko w tedy gdy chcesz
użyć tego identyfikatora w innym obiekcie jako zależności. Pole to przechowuje ciąg znaków w formacie
``UUID``:

.. code-block:: json
    {
        "objects": [
            {
                "@type": "Menu",
                "@id": "c5085414-5c26-4bfa-9ee5-1aac5163a697"
            }
        ]
    }

Identyfikator nie musi istnieć w systemie, jest to identyfikator który musi być unikalny w ramach
importowanego pliku. Możesz go wygenerować za pomocą darmowych generatorów UUID w internecie.

Użycie zależności do obiektu
----------------------------

Gdy masz już zdefiniowany identyfikator obiektu, który potrzebujesz użyć w ramach innego obiektu,
wystarczy wprowadzić ten identyfikator do wartości jednego z pól obiektu, który wymaga tej
zależności. Zróbmy to na przykładzie Menu i Widgetu.

.. code-block:: json
    {
        "objects": [
            {
                "@type": "Menu",
                "@id": "c5085414-5c26-4bfa-9ee5-1aac5163a697"
            },
            {
                "@type": "Widget",
                "attributes": [
                    {
                        "@type": "Attribute",
                        "code": "menu_id",
                        "uri": "menu_id",
                        "value": "[[@Menu:c5085414-5c26-4bfa-9ee5-1aac5163a697]]"
                    }
                ]
            },
        ]
    }

W powyższym przykładzie widać, że identyfikator ``c5085414-5c26-4bfa-9ee5-1aac5163a697`` zostanie
"wstrzyknięty" do atrybutu o nazwie ``menu_id`` w widgecie. W ten sposób można tworzyć relacje pomiędzy
importowanymi obiektami na każdym zagłębieniu.

Wzór na wartość identyfikatora to ``[[@{OBJECT}:{ID}]]``, gdzie:

- ``{OBJECT}`` - nazwa obiektu, do którego jest zależność
- ``{ID}`` - identyfikator obiektu, do którego jest zależność

System podmieni ciąŋ znaków w wartości pola, gdzie znajdzie wzorzec. Możesz więc używać wzorca
w środku długich wartości, na przykład w zserializowanych wartościach (jest to możliwe również dlatego,
że to zawsze będzie UUID):

.. code-block:: text
    "my_field": "a:2:{s:2:"id";s:36:"[[@Menu:c5085414-5c26-4bfa-9ee5-1aac5163a697]]";s:4:"type";s:6:"string";}"

Jak to działa?
--------------

Identyfikator, który zamieściłeś ręcznie w pliku JSON nie jest tym, który zostanie zapisany
do bazy danych. Podczas importowania każdy importer tworzy unikalne identyfikatory obiektów zapisywanych
w bazie danych, nawet jeśli ten sam plik zaimportujesz kilka razy.

Klasa Importera zwraca Identyfikator takiego zaimportowanego elementu, a system odpowiedzialny jest by
przed importem obiektów które są zależne od innych, podmienić wartość zdefiniowaną w pliku JSON,
na wartość rzeczywistą stworzonego elementu w systemie.
