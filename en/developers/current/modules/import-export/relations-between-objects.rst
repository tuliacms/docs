Relations between objects
=========================

Sometimes we need to import two objects that are dependent on each other. A good example will be the
import of the Menu and the Widget that the menu is to display. For the import to work, we need to
import the Widget with the ID of the Menu it is supposed to display. For such dependencies, a special
``@id`` field was created in objects.

The ``@id`` Field
-----------------

The ``@id`` field stores the object ID for import purposes - enter it only if you want to use this ID
in another object as a dependency. This field stores a string in the ``UUID`` format:

.. code-block:: json
    {
        "objects": [
            {
                "@type": "Menu",
                "@id": "c5085414-5c26-4bfa-9ee5-1aac5163a697"
            }
        ]
    }

The identifier does not have to exist in the system, it is an identifier that must be unique within
the imported file. You can generate it using free UUID generators on the internet.

Using a dependency to an object
----------------------------

Once you have defined an object ID that you need to use within another object, simply enter that
ID into the value of one of the fields of the object that requires this dependency. Let's do it on
the example of Menu and Widget.

.. code-block:: json
    {
        "objects": [
            {
                "@type": "Menu",
                "@id": "c5085414-5c26-4bfa-9ee5-1aac5163a697"
            },
            {
                "@type": "Widget",
                "attributes": [
                    {
                        "@type": "Attribute",
                        "code": "menu_id",
                        "uri": "menu_id",
                        "value": "[[@Menu:c5085414-5c26-4bfa-9ee5-1aac5163a697]]"
                    }
                ]
            },
        ]
    }

In the above example, you can see that the identifier ``c5085414-5c26-4bfa-9ee5-1aac5163a697`` will be
"injected" into the attribute named ``menu_id`` in the widget. In this way, you can create relations
between the imported objects in each cavity.

The formula for the ID value is ``[[@{OBJECT}:{ID}]]``, where:

- ``{OBJECT}`` - Object name, to which is this relation
- ``{ID}`` - Object ID, to which is this relation

The system will replace the character string in the value of the field where it finds the pattern.
So you can use pattern in the middle of long values, for example in serialized values (this is also
possible because it will always be UUID):

.. code-block:: text
    "my_field": "a:2:{s:2:"id";s:36:"[[@Menu:c5085414-5c26-4bfa-9ee5-1aac5163a697]]";s:4:"type";s:6:"string";}"

How it's working?
--------------

The ID you put manually in the JSON file is not the one that will be written to the database.
During import, each importer creates unique identifiers for objects saved in the database, even
if you import the same file several times.

The Importer class returns the ID of such an imported element, and the system is responsible for
replacing the value defined in the JSON file with the actual value of the created element in the
system before importing objects that are dependent on others.
