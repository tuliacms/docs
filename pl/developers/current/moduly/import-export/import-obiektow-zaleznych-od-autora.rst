Import obiektów zależnych od autora
===================================

Tak jak Node (węzły treści) posiadają autora, tak inne obiekty mogą je potrzebować by zostać
zapisane w systemie. W systemie istnieje cecha (Trait) importera, która umożliwia dostanie
się do identyfikatora autora, z poziomu importowanego obiektu.

Dostęp do informacji o stronie i językach
-----------------------------------------

Importer może dostać informację o identyfikatorze autora obiektu, używając
``Tulia\Component\Importer\ObjectImporter\Traits\AuthorAwareTrait``. Trait dostarcza metodę
``getAuthorId()``, która zwraca identyfikator autora.

Przykład użycia:

.. code-block:: php
    namespace Tulia\Cms\Products\Infrastructure\Cms\Importer;

    use Tulia\Component\Importer\ObjectImporter\ObjectImporterInterface;
    use Tulia\Component\Importer\ObjectImporter\Traits\AuthorAwareTrait;
    use Tulia\Component\Importer\Structure\ObjectData;

    class ProductImporter implements ObjectImporterInterface
    {
        use AuthorAwareTrait;

        public function import(ObjectData $objectData): ?string
        {
            // Pobranie identyfikatora autora
            $this->getAuthorId();
        }
    }
