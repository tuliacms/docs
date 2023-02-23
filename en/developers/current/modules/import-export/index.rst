Import/Export
============

The importer is used to supplement the system with sample data, for example during the template
installation or the first launch of the website. The importer works on files in JSON format.
Each file contains objects to be imported. Objects have their schema (Schema) in the module
configuration, and separate importers that are responsible for the proper saving of the object
from the imported file to the system.

Import data file
------------------------

Files store data in JSON format with a specific structure. The file holds the objects to be imported.
Each object must have its type (``@type``) and fields with data to be imported. Sample import file
with one entry:

.. code-block:: json
    {
        "objects": [
            {
                "@type": "Node",
                "type": "page",
                "title": "Homepage"
            }
        ]
    }

The file can of course contain many more objects, each in a new element of the ``objects`` array.

.. tip:: Tip
    All available types of objects that can be imported in the system can be found in
    :doc:`List of available objects for import <list-of-objects-available-to-import>`.

Some objects contain other objects within them. For example, when importing a Menu, we also import
the tabs of that Menu. From the definition of the ``Menu`` type, it follows that the Menu items
should be in the ``items`` field. An example of such nesting looks like this.

.. code-block:: json
    {
        "objects": [
            {
                "@type": "Menu",
                "name": "Main menu",
                "items": [
                    {
                        "@type": "MenuItem",
                        "name": "Homepage"
                    },
                    {
                        "@type": "MenuItem",
                        "name": "About us"
                    },
                    {
                        "@type": "MenuItem",
                        "name": "Contact"
                    }
                ]
            }
        ]
    }

.. tip:: Warning
    Note that child elements also have a ``@type`` field. Each element, whether it is the main object
or a subordinate object at any level, must have information about its type. This is required by the
Schema Validator.

Object schema configuration
------------------------------

In order to import any object, its schema must be defined so that the system knows how to handle
it and save it in the system. The configuration is stored in the ``config.yaml`` files in the modules.

Suppose we are making a product catalog. So we have Products. The product has a name, description
and visibility on the website. So let's configure such an object.

.. code-block:: yaml
    cms:
        importer:
            objects:
                Product:
                    mapping:
                        name: ~
                        description:
                            required: false
                        visible:
                            type: boolean
                            default_value: true

In our case, a description is not required. By default, however, each field is required,
so we have to change the requirement manually. We have visibility, but we don't want to have
to specify it every time, so we assume that all imported products are visible by default.
By default, all fields are also of type ``string``. The available field types are:

.. raw:: html
    <table class="table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>string</code></td>
                <td>Text</td>
            </tr>
            <tr>
                <td><code>boolean</code></td>
                <td>Boolean value</td>
            </tr>
            <tr>
                <td><code>integer</code></td>
                <td>Number</td>
            </tr>
            <tr>
                <td><code>scalar</code></td>
                <td>Scalar value</td>
            </tr>
            <tr>
                <td><code>number</code></td>
                <td>Number</td>
            </tr>
            <tr>
                <td><code>array</code></td>
                <td>Array</td>
            </tr>
            <tr>
                <td><code>one_dimension_array</code></td>
                <td>One-dimensional array</td>
            </tr>
            <tr>
                <td><code>uuid</code></td>
                <td>UUID</td>
            </tr>
            <tr>
                <td><code>datetime</code></td>
                <td>Date and time in format <code>Y-m-d H:i:s</code></td>
            </tr>
        </tbody>
    </table>

Object importer
----------------

The last step will be to create the object importer itself. The importer is a class that implements
``Tulia\Component\Importer\ObjectImporter\ObjectImporterInterface``. It should be located in the
Infrastructure layer. So let's create an importer for our product catalog.

.. code-block:: php
    namespace Tulia\Cms\Products\Infrastructure\Cms\Importer;

    use Tulia\Component\Importer\ObjectImporter\ObjectImporterInterface;
    use Tulia\Component\Importer\Structure\ObjectData;

    class ProductImporter implements ObjectImporterInterface
    {
        public function import(ObjectData $objectData): ?string
        {
            $this->creator->create(
                $objectData['name'],
                $objectData['description'] ?? '',
                $objectData['visibility'],
            );
        }
    }

The interface requires the ``import()`` method, which takes an object of the
``Tulia\Component\Importer\Structure\ObjectData`` class as an argument. It stores all the data of
the imported object. You access this data by referencing the object as an array.

This object also contains the definition of the imported object (a list of fields and their types).
You can access it by calling ``$objectData->getDefinition()``.

Now all you have to do is assign the Importer class to the object you want to import. You do this
by adding FQCN to your YAML configuration:

.. code-block:: yaml
    cms:
        importer:
            objects:
                Product:
                    importer: 'Tulia\Cms\Products\Infrastructure\Cms\Importer\ProductImporter'
                    mapping: # Dotychczasowa lista pól...

Read more
#############

- :doc:`Relations between objects <relations-between-objects>`
- :doc:`Import of multilingual objects <import-of-multilingual-objects>`
- :doc:`Import of author dependent objects <import-of-author-dependent-objects>`
- :doc:`List of available objects for import <list-of-objects-available-to-import>`
- :doc:`Files Import <files-import>`
