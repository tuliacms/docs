Contenteditable Extension
============================

With the **Contenteditable** extension, you can create editable pieces of text in your block.
The extension accepts the content in the model, the text to be displayed. It does not operate
on HTML code but on plain text (for HTML editing see :doc:`WysiwygEditor<wysiwyg-editor>`).

Example of use:

.. code-block:: vue

    <template>
        <Contenteditable v-model="block.data.description"></Contenteditable>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('structure').block(props.block);
        const extensions = inject('extensions.registry');

        const Contenteditable = extensions.editor('Contenteditable');
    </script>
