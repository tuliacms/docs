BackgroundImage Extension
============================

Thanks to the **BackgroundImage** extension, you can place any photo as the background of an element.

This extension needs a specific model format to work. The model should be an object containing:

- ``filename`` - File name
- ``id`` - ID of the file
- ``size`` - image size

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

Example of use
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

The rendered HTML contains a ``<div>`` with a unique ID within the document, which is given
a CSS-style ID ``background-image``. The rest of the styling (``background-size`` etc.) you give as needed.

Note that the ``class`` attribute works on the element. The created ``<div>`` element will
have a list of classes that you give to ``<BackgroundImage>``.
