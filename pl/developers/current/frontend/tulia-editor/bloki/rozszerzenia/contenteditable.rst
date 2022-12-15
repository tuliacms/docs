Rozszerzenie Contenteditable
============================

Dzięki rozszerzeniu **Contenteditable** możesz utworzyć edytowalne kawałki tekstu w swoim bloku.
Rozszerzenie przyjmuje w modelu treść, tekst do wyświetlenia. Nie operuje on na kodzie HTML a na zwykłym
czystym tekście (do edycji HTML zobacz :doc:`WysiwygEditor<wysiwyg-editor>`)

Przykład użycia:

.. code-block:: vue

    <template>
        <Contenteditable v-model="block.data.description"></Contenteditable>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('blocks.instance').editor(props);

        // We get the extension from block instance
        const Contenteditable = block.extension('Contenteditable');
    </script>
