Files Import
=============

You can also import files to the File Manager. The file must be on the server to be able to import it.
The file path can be given absolute or relative to the imported JSON file. The imported file will be
placed in the File Manager and the other imported objects from the JSON file that will use this file
will be injected with the file ID from the File Manager.

For example, we have a file named ``tj-holowaychuk-1EYMue_AwDw-unsplash.jpg``. First, we place it in
the directory from which we want to import it. The best option is to create a subdirectory next to the
import JSON file and use a relative link.

So we put the file in the ``images`` directory. In the JSON file, we put the relative path to this file:

.. code-block:: json

    {
        "objects": [
            {
                "@type": "File",
                "@id": "347a3433-3cf6-4d6c-983a-3a5b4e478c25",
                "filepath": "./images/tj-holowaychuk-1EYMue_AwDw-unsplash.jpg"
            }
        ]
    }

Another thing is the importer himself. To get to the absolute path of the file, use the
``$objectData->getFilepathOf('filepath')`` method, giving it the name of the field we want to get
in the parameter.

.. code-block:: php

    namespace Tulia\Cms\Products\Infrastructure\Cms\Importer;

    use Tulia\Component\Importer\ObjectImporter\ObjectImporterInterface;
    use Tulia\Component\Importer\Structure\ObjectData;

    class ProductImporter implements ObjectImporterInterface
    {
        public function import(ObjectData $objectData): ?string
        {
            $this->uploader->uploadFile(
                $objectData['name'],
                $objectData->getFilepathOf('filepath'),
            );
        }
    }

