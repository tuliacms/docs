Import of multilingual objects
===============================

Tulia CMS is a system that allows you to translate content into many languages. Therefore, the Importer
has a feature that supports importing objects in multiple languages. This can be done in many ways and
it is up to you whether you will import the object into one language and copy the content to the others,
or whether you need to create an import with objects translated into several languages at once.

You will see how to access information about languages in the Importer, and the implementation of the
solution to the multilingualism problem remains on your side.

Access to site information and languages
-----------------------------------------

The importer can get information about the whole website (``WebsiteInterface``) using
``Tulia\Component\Importer\ObjectImporter\Traits\WebsiteAwareTrait``. Trait provides a method
``getWebsite()`` which returns information about the currently active website.

Example of use:

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
