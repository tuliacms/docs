Import wielojęzycznych obiektów
===============================

Tulia CMS jest systemem umożliwiającyh tłumaczenie treści na wiele języków. Dlatego też Importer
posiada cechę wspierającą importowanie obiektów w wielu językach. Można to zrobić na wiele sposobów
i tylko od Ciebie zależy, czy będziesz importował obiekt do jednego języka i kopiował treść do
pozostałych, czy od razu wymagał stworzenia importu z obiektami przetłumaczonymi na kilka języków.

Zobaczysz jak dostać się do informacji o językach w Importerze, a sama implementacja rozwiązania
problemu wielojęzyczności zostaje po Twojej stronie.

Dostęp do informacji o stronie i językach
-----------------------------------------

Importer może dostać informację o całej stronie (``WebsiteInterface``), używając
``Tulia\Component\Importer\ObjectImporter\Traits\WebsiteAwareTrait``. Trait dostarcza metodę
``getWebsite()``, która zwraca informacje o aktalnie aktywnej stronie.

Przykład użycia:

.. code-block:: php
    namespace Tulia\Cms\Products\Infrastructure\Cms\Importer;

    use Tulia\Component\Importer\ObjectImporter\ObjectImporterInterface;
    use Tulia\Component\Importer\ObjectImporter\Traits\WebsiteAwareTrait;
    use Tulia\Component\Importer\Structure\ObjectData;

    class ProductImporter implements ObjectImporterInterface
    {
        use WebsiteAwareTrait;

        public function import(ObjectData $objectData): ?string
        {
            // Pobranie domyślnego języka
            $this->getWebsite()->getDefaultLocale()->getCode();
        }
    }

Czytaj więcej
-------------

- Wielojęzyczność
