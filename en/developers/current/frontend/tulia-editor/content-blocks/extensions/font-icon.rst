FontIcon Extension
=====================

Thanks to the **FontIcon** extension, you can place an icon from the FontAwesome resources.
After clicking on the icon, a modal window will appear with the possibility of selecting and
searching for the icon of interest. As a result, the class name of the given icon from FontAwesome
will be stored.

Example of use
###############

**``Editor.vue``**

.. code-block:: vue

    <template>
        <FontIcon v-model="block.data.icon"></FontIcon>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('structure').block(props.block);
        const extensions = inject('extensions.registry');

        const FontIcon = extensions.editor('FontIcon');
    </script>

**``Render.vue``**

.. code-block:: vue

    <template>
        <span :class="block.data.icon"></span>
    </template>

It is enough to display the value from the block property in the ``class`` attribute of the element
that is to have the icon.
