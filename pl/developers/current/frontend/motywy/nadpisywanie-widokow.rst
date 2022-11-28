Nadpisywanie widoków systemowych
================================

Motywy oprócz swoich własnych widoków, mogą również nadpisywać widoki systemowe oraz modułów zainstalowanych
w systemie. Dowiesz się teraz w jaki sposób nadpisać każdy z tych rodzajów widoków w swoim motywie.

Nadpisywanie widoków systemwych
###############################

System posiada kilka predefiniowanych widoków, które umożliwiają wyświetlenie treści nawet gdy motyw
tego nie wdrożył. Za przykład może zrobić widok wpisu (``Node``). Motyw nie musi implementować tego
widoku, a mimo wszystko po wejściu na podstronę wpisu widać jego treść.

Aby móc zaimplementować indywidualny dla motywu widok jakiegoś modułu, należy go nadpisać. Aby nadpisać
widok systemowy, w motywie należy umieścić widok o tej samej nazwie w katalogu
``/Resources/views/overwrite/cms``. System podczas renderowania widoku, najpierw sprawdza istnienie
widoku o danej nazwie w tym katalogu dzięki temu wyrenderuje widok motywu, nawet jeśli widok systemowy
istnieje.

Na przykład, gdy istnieje widok systemowy o nazwie ``@cms/node/node.tpl``, aby go nadpisać, stwórz w swoim
motywie widok ``/Resources/views/overwrite/cms/node/node.tpl``. Pamiętaj by domyślnie skopiować treść
widoku systemowego, by nie pominąć funkcji, które system udostępnia domyślnie.

.. tip:: Porada

    Jeśli chcesz nadpisać widok, a nie wiesz jak się on nazywa, możesz użyć Profilera Symfony. W zakładce
    Twig zobaczysz wszystkie widoki, które zostały wyrenderowane na danej podstronie. Wszystkie te,
    które zaczynają się od ``@cms/``, to są widoki systemowe, które możesz nadpisać.
