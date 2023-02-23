Image Extension
==================

Thanks to the **Image** extension, you can place any photo in the content of the block.
The extension uses the system Filemanager. In addition, you can define what size the photo
should be displayed.

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
                size: 'thumbnail', // 'original' to show original image
            },
        }
    };

Example of use
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


Usage with Collection
###################

When you need to use the ``Image`` extension together with ``Collection``, remember that both use
the ``id`` field to identify their parameters. Therefore, you should separate the data in the
objects of the collection so that they do not overlap.

Below is an example of such a separation:

.. code-block:: js

    // MyBlock.js
    export default {
        //...
        defaults: {
            images: [
                {
                    id: '1', // ID used for Collection
                    file: {
                        id: null, // ID used for Image
                        filename: null,
                        size: 'thumbnail',
                    }
                }
            ],
        }
    };

**``Editor.vue``**

.. code-block:: vue

    <template>
        <div class="col" v-for="entry in faq.collection" :key="entry.id">
            <!-- entry.file instead of just entry -->
            <Image v-model="entry.file"></Image>
        </div>
    </template>
