Zmienne CSS
===========

Aby zapewniść łatwość wdrażania zmiany wyglądu motywów, Tulia CMS posiada możliwość definiowania
`zmiennych CSS dla motywu`_. Gdy chcesz oddać do konfiguracji kolor wiodący motywu, możesz użyć zmiennych
CSS by nadpisać kolor domyślny motywu, tym, który użytkownik wybierze z panelu barw podczas dostosowywania
Motywu. Dowiesz się tutaj jak wykorzystać tą funkcję w swoim motywie.

Krok 1: Globalna zmienna z domyślną wartością
#############################################

W stylu motywu zdefiniuj globalną zmienną, która będzie przechowywała wartość domyślną i użyj tej zmiennej
wszędzie tam, gdzie chcesz użyć tego koloru i chcesz by użytkownik mógł go zmieniać. Dla naszego
przykładu załóżmy, że oddamy możliwość zmiany koloru wiodącego motywu.

.. code-block:: css

    :root {
      --primary-color: #1e90ff;
    }

    a { color: var(--primary-color); }

Krok 2: Definicja zmiennej w konfiguracji motywu
################################################

W konfiguracji motywu, dodaj zmienną jako klucz, a jako wartość podaj nazwę kontrolki, z której
system ma pobrać wartość. Wartość ta zostanie później ustawiona jako wartość zmiennej CSS.

.. code-block:: yaml

    cms:
        theme:
            configuration:
                Vendor/MyTheme:
                    customizer:
                        customizer:
                            variables:
                                :root:
                                    primary-color: lisa.color.primary

Dla wyjaśnienia:

- linia 7 - zawiera listę scope'ów CSS, dla których chcemy zmienne zastosować
- linia 8 - W naszym przypadku chcemy zdefiniować zmienną globalną (``:root``).
  Ale również możesz użyć innych scope'ów lokalnych, tak jak zrobiłbyś to w stylach CSS.
- linia 9 - podajemy nazwę zmiennej w kluczu, a jako wartość podajemy nazwę kontrolki

Jak to działa?
##############

Domyślne wartości zmiennych CSS zdefiniowałeś w stoich stylach. Te wartości zostaną przyjęte przez
przeglądarkę. Natomiast Tulia CMS wyrenderuje zmienne które zdefiniowałeś w konfiguracji, tworząc
osobny styl w dokumencie HTML tylko z tymi zmiennymi i ich wartościami. Gdy przeglądarka zauważy zmienną
znajdującą się bezpośrednio w dokumencie HTML, potrakuje ją jako ważniejszą w strukturze CSS i zastąpi tą,
którą zdefiniowałeś w swoich stylach.

Dzięki czemu możesz zmieniać wartości praktycznie każdego elementu na stronie tylko poprzez zmienne,
i oddać użytkownikowi praktycznie pełną swobodę w temacie kolorów, marginesów/paddingów, teł i innych
atrybutów CSS, które pozwolisz mu edytować.

Podgląd edycji Live
###################

Dzięki wbudowanej funkcji podglądu live, podczas edytowania kontrolek, Tulia CMS umożliwia również
podgląd wszystkich zmiennych Live. Wystarczy, że przy kontrolce, która jest przypisana do zmiennej CSS
ustawisz ``transport: postMessage``. System sam zaktualizuje wartość stylu lokalnego w dokumencie HTML
podglądu.

.. _zmiennych CSS dla motywu: https://www.w3schools.com/css/css3_variables.asp
