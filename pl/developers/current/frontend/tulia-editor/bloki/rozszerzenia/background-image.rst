Rozszerzenie BackgroundImage
============================

Dzięki rozszerzeniu **BackgroundImage** możesz umieścić dowolne zdjęcie w postaci tła elementu.

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
                size: 'size-name', // 'original' to show original image
            },
        }
    };

Przykład użycia
###############

**``Editor.vue``**

.. code-block:: vue

    <template>
        <BackgroundImage class="block-image d-none d-md-block" v-model="block.data.image"></BackgroundImage>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('blocks.instance').editor(props);

        // We get the extension from block instance
        const BackgroundImage = block.extension('BackgroundImage');
    </script>

**``Render.vue``**

.. code-block:: vue

    <template>
        <div class="block-image d-none d-md-block" :id="background.id"></div>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('blocks.instance').editor(props);

        // We get the extension from block instance
        const BackgroundImage = block.extension('BackgroundImage');
        // We create image instance to use as element ID in Document
        const background = new BackgroundImage(block, () => block.data.image);
    </script>

Wyrenderowany HTML zawiera ``<div>`` z unikanym ID w obrębie dokumentu, na który to ID w stylu CSS
nadany jest ``background-image``. Pozostałe stylowanie (``background-size`` itp.) nadajesz wg potrzeb.

Zauważ, że na elemencie działa atrybut ``class``. Tworzony element ``<div>`` będzie posiadał listę
klas które nadasz na ``<BackgroundImage>``.
