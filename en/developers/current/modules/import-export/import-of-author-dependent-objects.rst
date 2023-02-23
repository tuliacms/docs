Import of author dependent objects
===================================

Just as Nodes have an author, other objects may need them to be written to the system.
There is a feature (Trait) of the importer in the system that allows access to the author's identifier
from the level of the imported object.

Access to site information and languages
-----------------------------------------

The importer can get information about the object's author ID using
``Tulia\Component\Importer\ObjectImporter\Traits\AuthorAwareTrait``. Trait provides a method
``getAuthorId()`` which returns the author ID.

Example of use:

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
            // Get the author ID
            $this->getAuthorId();
        }
    }
