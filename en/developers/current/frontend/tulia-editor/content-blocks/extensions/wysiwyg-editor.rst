WysiwygEditor Extension
==========================

Thanks to the **WysiwygEditor** extension, you can create text sections editable with the WYSIWYG
editor - bold, underline, font size, links, etc. The extension accepts the content in the model,
the HTML code to be displayed. It operates on HTML code (for plain text editing, see
:doc:`Contenteditable<contenteditable>`).

Example of use:

.. code-block:: vue

    <template>
        <WysiwygEditor v-model="block.data.description"></WysiwygEditor>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('blocks.instance').editor(props);

        // We get the extension from block instance
        const WysiwygEditor = block.extension('WysiwygEditor');
    </script>
