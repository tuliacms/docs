Rozszerzenie Image
==================

Dzięki rozszerzeniu **Image** możesz umieścić dowolne zdjęcie w treści bloku. Rozszerzenie korzysta
z Filemanagera systemowego. Dodatkowo możesz zdefiniować jakiego rozmiaru zdjęcie powinno się wyświetlać.

Rozszerzenie to potrzebuje do działania konkretnego formatu modelu. Model powinien być obiektem,
zawierającym:

- ``filename`` - nazwa pliku
- ``id`` - ID pliku
- ``size`` - rozmiar pliku

.. code-block:: js

    // MyBlock.js
    export default {
        //...
        defaults: {
            image: {
                id: null,
                filename: null,
                size: 'thumbnail', // 'original' to show original image
            },
        }
    };

Przykład użycia
###############

**``Editor.vue``**

.. code-block:: vue

    <template>
        <Image v-model="block.data.image"></Image>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('blocks.instance').editor(props);

        // We get the extension from block instance
        const Image = block.extension('Image');
    </script>

**``Render.vue``**

.. code-block:: vue

    <template>
        <Image v-model="block.data.image"></Image>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('blocks.instance').editor(props);

        // We get the extension from block instance
        const Image = block.extension('Image');
    </script>
