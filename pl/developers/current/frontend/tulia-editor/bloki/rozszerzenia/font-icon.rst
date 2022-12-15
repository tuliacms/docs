Rozszerzenie FontIcon
=====================

Dzięki rozszerzeniu **FontIcon** możesz umieścić ikonkę z zasobów FontAwesome. Po kliknięciu ikonki
pojawi się okno modalne z możliwością wyboru i wyszukania interesującej ikonki. Jako rezultat przechowywana
będzie nazwa klasy danej ikonki z FontAwesome.

Przykład użycia
###############

**``Editor.vue``**

.. code-block:: vue

    <template>
        <FontIcon v-model="block.data.icon"></FontIcon>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('blocks.instance').editor(props);

        // We get the extension from block instance
        const FontIcon = block.extension('FontIcon');
    </script>

**``Render.vue``**

.. code-block:: vue

    <template>
        <span :class="block.data.btn.icon"></span>
    </template>

Wystarczy wyświetlić wartość z właściwości bloku w atrybucie ``class`` elementu, który ma posiadać ikonkę.
