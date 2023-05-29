BackgroundImage Extension
============================

Thanks to the **BackgroundImage** extension, you can place any photo as the background of an element.

This extension needs a specific model format to work. The model should be an object containing:

- ``filename`` - File name
- ``id`` - ID of the file

.. code-block:: js

    // MyBlock.js
    export default {
        //...
        store: {
            data: {
                state: () => {
                    return {
                        image: {
                            id: null,
                            filename: null,
                        },
                    };
                },
            },
        },
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
        const block = inject('structure').block(props.block);
        const extensions = inject('extensions.registry');

        const BackgroundImage = extensions.editor('BackgroundImage');
    </script>

**``Render.vue``**

.. code-block:: vue

    <template>
        <div class="block-image d-none d-md-block" :style="{ backgroundImage: background.backgroundImage }"></div>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('structure').block(props.block);
        const extensions = inject('extensions.registry');

        const BackgroundImage = extensions.editor('BackgroundImage');
        const background = new BackgroundImage(block, () => block.data.image);
    </script>

The `backgroundImage` property returns a `url('...')` CSS value.
