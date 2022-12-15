Rozszerzenie WysiwygEditor
==========================

Dzięki rozszerzeniu **WysiwygEditor** możesz utworzyć sekcje tekstu edytowalne za pomocą edytora
WYSIWYG - pogrubienia, podkreślenia, wielkość czcionki, linki itp. Rozszerzenie przyjmuje w modelu treść,
kod HTML do wyświetlenia. Operuje on na kodzie HTML (do edycji zwykłego tekstu zobacz
:doc:`Contenteditable<contenteditable>`)

Przykład użycia:

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
