Strony błędów
=============

Motyw powinien obsługiwać dwa rodzaje błędów: 404 - Nie znaleziono; błąd 500 - Błąd serwera.
Symfony udostępnia wewnętrzny adres do weryfikacji kodów błędów, jest to ``/_error/{code}``.
Możesz go użyć do weryfikacje tego jak wygląda strona błędu w motywie.

Za te dwa błędy odpowiadają dwa widoki o nazwach kodóe błędów: ``404.tpl`` oraz ``500.tpl``.
Powinny znajdować się w głównym katalogu widoków motywu.

404 Nie znaleziono
##################

Błąd 404 może korzystać z głównego widoku motywu. Przykładowy widok znajdziesz poniżej:

.. code-block:: twig

    {% extends 'theme' %}

    {% block content %}
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Page not found :(</h1>
        </div>
    {% endblock %}

500 Błąd serwera
################

W przypadku błędu 500, nie możesz korzystać z dobrodziejstw motywu i systemu. Jest to spowodowane
wieloma różnymi czynnikami, które mogą pójść nie tak, z których powodu pokaże się strona błędu 500.

Pamiętaj, że może być nawet błąd w Twoim motywie, który pokaże stronę 500, więc nie możesz
polegać nawet na tym.

Widok strony błędu 500 powinien więc być niezależny i zawierać pełną strukturę HTML oraz informację
o błędzie.
