Collection Extension
=======================

With the **Collection** extension, you can create a collection of items and manage them (add/delete,
swipe up/down and right/left) - for example, FAQ. In addition, control buttons are added to each element
to speed up the collection management process.

The condition for the correct operation of the collection is to assign an ID to each element of
the collection at the start, in the form of a value of the ``string`` type (it can be a rigidly
defined list of values, as in the example, but it must be a unique ID within a given collection):

.. code-block:: js

    // MyBlock.js
    export default {
        //...
        defaults: {
            faq: [
                {
                    id: '1',
                    question: 'Will You marry me?',
                    answer: 'Yes, I do!',
                },
                {
                    id: '2',
                    question: 'When?',
                    answer: 'Today!',
                },
            ],
        }
    };


Example of use
###############

**``Editor.vue``**

.. code-block:: vue

    <template>
        <div class="row">
            <!-- Loop over the entries.collection, each entry has id property -->
            <div class="col" v-for="entry in faq.collection" :key="entry.id">
                <!-- Render controls for each entry's property -->
                <Contenteditable v-model="entry.question"></Contenteditable>
                <p><Contenteditable v-model="entry.answer"></Contenteditable></p>
                <!-- Render edit actions for this `entry`, across all `faq`-->
                <Actions actions="moveUp,moveDown,remove" :collection="faq" :item="entry"></Actions>
            </div>
            <div class="col-12">
                <!-- Render edit actions for all `faq`-->
                <Actions actions="add" :collection="faq"></Actions>
            </div>
        </div>
    </template>

    <script setup>
        const { defineProps, inject } = require('vue');
        const props = defineProps(['block']);
        const block = inject('blocks.instance').editor(props);

        // We get the extension from block instance
        const Collection = block.extension('Collection');

        // We get the controls for collection
        const Actions = block.extension('Collection.Actions');

        // We have to create collection manager for edition purposes
        // First add the current collection, and second add the default element (without ID!) that
        // will be added automatically when user clicks od the action "Add new"
        const faq = new Collection(block.data.faq, {
            question: 'Will You marry me?',
            answer: 'Yes, I do!',
        });
    </script>

**``Render.vue``**

.. code-block:: vue

    <template>
        <div class="row">
            <!-- Loop over the block.data.entries, each entry has id property -->
            <div class="col" v-for="entry in block.data.faq" :key="entry.id">
                <!-- Render controls for each entry's property -->
                <h2>{{ entry.question }}</h2>
                <p>{{ entry.answer }}</p>
            </div>
        </div>
    </template>

Just loop through the elements in the block. Each item in the collection has a unique ID
(needed for the ``for`` loop in VueJS).
