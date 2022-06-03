---
Title: Wyświetlenie wartości w widoku - Tulia CMS
Description: Jak wyświetlić zapisaną wartość Customizera w widoku?
Author: Adam Banaszkiewicz
---

# Wyświetlenie wartości w widoku

Po zapisaniu ustawień, Customizer udostępnia w widokach funkcję `customizer_get()`, która zwraca wartość danego pola
zapisaną dla aktywnego szablonu. Przykładowe użycie:

```twig
{% if customizer_get('lisa.footer.contact.show_widget') %}
    {{ widgets_space('footer_contact') }}
{% else %}
    {{ customizer_get('lisa.footer.contact.text') }}
{% endif %}
```

Funkcja ta zwraca domyślną wartość pola, jeśli jeszcze nie zmodyfikowano nic dla tego szablonu.
