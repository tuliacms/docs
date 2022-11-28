Gotowe konfiguracje CUstomizera dla motywu
==========================================

Customizer pozwala na dostosowanie motywu do potrzeb użytkownika. Może on natomiast skorzystać z gotowych
konfiguracji, które przygotujesz na potrzeby motywu. Grupy konfiguracji mogą tyczyć się na przykład
predefiniowanej kolorystyki, opcji świątecznej motywu lub układu RTL. Dowiesz się teraz jak przygotować
gotowe konfiguracje dla motywu.

Krok 1: Konfiguracja
####################

W konfiguracji customizera swojego motywu dodaj kolekcje konfiguracji pod kluczem ``changesets``:

.. code-block:: yaml

    cms:
        theme:
            configuration:
                Vendor/MyTheme:
                    customizer:
                        changesets:
                            lisa.predefined_changeset:
                                label: Predefined changeset
                                description: This is predefined changeset description
                                data:
                                    hero.static.headline: Some value of this changeset control
                                    hero.static.description: Some value of this changeset another control

- linia 7 - identyfikator changesetu
- linia 8-9 - nazwa i opis changesetu, może być tłumaczona tak jak nazwy kontrolek
- linia 10 - zawiera listę wartości kontrolek, któe zostaną do nich przypisane gdy użytkownik zastosuje
  ten dany changeset

Gdy użytkownik będzie chciał dostosować motyw, będzie mógł zastosować przygotowane przez Ciebie gotowe
konfiguracje. Gdy daną zastosuje, konfiguracja motywu zostanie zresetowana, a później wartości
z danego gotowego changesetu zostaną przypisane do odpowiednich kontrolek.
