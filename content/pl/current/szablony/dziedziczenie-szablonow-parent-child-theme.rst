---
Title: Dziedziczenie szablonów (Parent/Child Theme) - Tulia CMS
Description: Struktura widoków frontowych CMS
Author: Adam Banaszkiewicz
---

# Dziedziczenie szablonów (Parent/Child Theme)

Każdy szablon może posiadać jeden szablon rodzica, a każdy rodzic może posiadać wiele szablonów potomnych.
Dzięki takiej strukturze, możemy zdefiniować jeden główny szablon, oraz dodatkowe, które nadpisują tylko wybrane
elementy szablonu rodzica.

Można więc stworzyć wersję świąteczną oraz wakacyjną swojej strony, używając do tego dwóch dodatkowych szablonów
potomnych, w których nadpiszemy tylko style CSS zmieniające kolorystykę strony.

## Jak działa dziedziczenie?

Aby szablon dziedziczył po innym szablonie, należy do pliku `Theme.php` tego szablonu dodać właściwość `$parent` z nazwą
szablonu rodzica. System najpierw załaduje elementy szablonu rodzica, a następnie elementy z szablonu potomnego.
W sytuacji gdy szablon potomny posiada te same elementy - zastąpią one te z szablonu rodzica.
Dzięki czemu strona uruchomi się z szablonem rodzica, a dodatkowo będzie można ładować kolejne zasoby
(na przykład style CSS) z szablonu potomnego czy nadpisywać widoki.

## Jakie elementy są nadpisywane a jakie dodawane?

Niektóre elementy, na przykład wszystkie pliki przechowywane przez szablon, będą dodawane przez szablon potomny.
Oznacza to, że szablon potomny nie będzie mógł nadpisać plików szablonu rodzica - są one przechowywane w osobnych
katalogach na serwerze.

Są jednak elementy takie jak konfiguracja, serwisy czy widgety, które mogą być dodawane oraz nadpisywane przez
szablon pochodny. Oznacza to, że można dodawać nowe oraz nadpisywać te istniejące w szablonie rodzicu.

Tabela przedstawia różnice, które elementy szablonów są dodawane, a które nadpisywane. 

<table class="table text-center">
    <thead>
        <tr>
            <th>Nazwa</th>
            <th>Dodawane</th>
            <th>Nadpisywane</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>pliki CSS/JS/zdjęcia</td>
            <td><span class="text-success">Tak</span></td>
            <td><span class="text-danger">Nie</span></td>
        </tr>
        <tr>
            <td>widoki</td>
            <td><span class="text-success">Tak</span></td>
            <td><span class="text-success">Tak</span></td>
        </tr>
        <tr>
            <td>konfiguracja serwisów</td>
            <td><span class="text-success">Tak</span></td>
            <td><span class="text-success">Tak</span></td>
        </tr>
        <tr>
            <td>konfiguracja assetów</td>
            <td><span class="text-success">Tak</span></td>
            <td><span class="text-success">Tak</span></td>
        </tr>
        <tr>
            <td>widgety</td>
            <td><span class="text-success">Tak</span></td>
            <td><span class="text-success">Tak</span></td>
        </tr>
    </tbody>
</table>

## Assety (CSS/JS)

W przypadku plików CSS/JS są one przechowywane w osobnych katalogach, więc nie są nadpisywane, jednak można je nadpisać
używając konfiguracji assettera.

Zalecane jest jednak nie nadpisywać assetów. W przypadku plików CSS wystarczy skonfigurować nowe assety dla szablonu
potomnego i w nich nadpisać poszczególne elementy HTML. Takie rozwiązanie spowoduje, że każda aktualizacja szablonu
rodzica będzie miała wpływ również na szablon potonmy - w przypadku całkowitego nadpisania plików CSS/JS, pliki te
nie zostaną załadowane z szablonu rodzica, a działać będą tylko te z szablonu potomnego.
