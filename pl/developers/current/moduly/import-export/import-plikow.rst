Import plików
=============

Importować można również pliki do Managera Plików. Plik musi znajdować się na serwerze by móc go
zaimportować. Ścieżkę do pliku można podać bezwzględny lub względny do importowanego pliku JSON.
Zaimportowany plik zostanie umieszczony w Managerze plików a do pozostałych zaimportowanych obiektów
z pliku JSON, które będą korzystały z tego pliku, zostanie wstrzyknięty identyfikator pliku z
Managera Plików.

Przykładowo, posiadamy plik o nazwie ``tj-holowaychuk-1EYMue_AwDw-unsplash.jpg``. Najpierw umieszczamy
go w katalogu z którego chcemy go zaimportować. Najlepszą opcją jest utworzenie podkatalogu obok pliku
JSON z importem i wykorzystanie linku względnego.

Zatem umieszczamy plik w katalogu ``images``. W pliku JSON wrzucamy ścieżkę względną do tego pliku:

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

Kolejna rzecz, do sam importer. Aby dostać się do ścieżki bezwzględnej pliku, należy użyć metody
``$objectData->getFilepathOf('filepath')``, podając jej w parametrze nazwę pola, które chcemy dostać.

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

