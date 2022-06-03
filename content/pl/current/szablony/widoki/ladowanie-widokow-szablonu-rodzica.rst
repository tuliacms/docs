---
Title: Ładowanie widoku szablonu rodzica - Tulia CMS
Description: 
Author: Adam Banaszkiewicz
---

# Ładowanie widoku szablonu rodzica

Wszystkie widoki są renderowane za pomocą następującej hierarchii:

1. Widok szablonu potomnego
2. Widok szablonu rodzica
3. Widok domyślny

W przypadku nie znalezienia pierwszego, system szuka kolejnego, i w ostateczności pokazując widok domyślny.
Są jednak sytuacje gdy w szablonie potomnym nadpisaliśmy widok z szablonu rodzica, a chcielibyśmy użyć ten widok.
Użycie skrótu `@theme` zawsze odnosi się do aktywnego szablonu - w tym przypadku do szablonu potomnego.

Dostępny jest jednak skrót `@parent`, który kieruje bezpośrednio do szablonu rodzica. Dzięki niemu można odnieść się
z szablonu potomnego, bezpośrednio do szablonu rodzica.

Skrót ten jest dostępny tylko w przypadku użycia szablonów potomnych. Gdy szablon nie posiada rodzica, skrót będzie
niedostępny a jego użycie spowoduje wyświetlenie błędów o niemożliwość zlokalizowania pliku do wyrenderowania.
