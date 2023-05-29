<?php

return [
    'sections' => [
        ['label' => 'Getting started', 'icon' => 'fa-solid fa-book-open', 'links' => [
            ['link' => 'getting-started/introduction', 'label' => 'Introduction'],
            ['link' => 'getting-started/installation', 'label' => 'Installation', 'links' => [
                ['link' => 'getting-started/makefile-commands', 'label' => 'Makefile commands'],
            ]],
        ]],
        /*['label' => 'Architektura', 'icon' => 'fa-solid fa-layer-group', 'links' => [
            ['link' => 'architektura/backend-fontend', 'label' => 'Backend/Frontend'],
            ['link' => 'architektura/website-i-wielojezycznosc', 'label' => 'Multisite i wielojęzyczność'],
            ['link' => 'architektura/typy-tresci', 'label' => 'Typy treści', 'links' => [
                ['link' => 'architektura/typy-tresci/typ-tresci', 'label' => 'Typ treści'],
                ['link' => 'architektura/typy-tresci/Atrybuty', 'label' => 'Atrybuty'],
            ]],
            ['link' => 'architektura/nodes', 'label' => 'Nodes (wpisy)'],
        ]],*/
        ['label' => 'Frontend', 'icon' => 'fa-solid fa-panorama', 'links' => [
            ['link' => 'frontend/themes/index', 'label' => 'Themes', 'links' => [
                ['link' => 'frontend/themes/main-view-of-theme', 'label' => 'Main view of theme'],
                ['link' => 'frontend/themes/views', 'label' => 'Views'],
                ['link' => 'frontend/themes/overriding-the-views', 'label' => 'Overriding the views'],
                ['link' => 'frontend/themes/customizer', 'label' => 'Customizer', 'links' => [
                    ['link' => 'frontend/themes/css-variables', 'label' => 'CSS variables'],
                    ['link' => 'frontend/themes/ready-to-use-config-sets', 'label' => 'Ready to use config sets'],
                ]],
                ['link' => 'frontend/themes/themes-inheritance', 'label' => 'Themes inheritance'],
                ['link' => 'frontend/themes/error-pages', 'label' => 'Error pages'],
                ['link' => 'frontend/themes/twig-view-functions', 'label' => 'List of functions'],
                ['link' => 'frontend/themes/implementation-checklist', 'label' => 'Implementation checklist'],
            ]],
            //['link' => 'frontend/themes/zasoby', 'label' => 'Zasoby (assets)'],
            ['link' => 'frontend/tulia-editor/index', 'label' => 'Tulia Editor', 'links' => [
                ['link' => 'frontend/tulia-editor/index', 'label' => 'Editor basics'],
                ['link' => 'frontend/tulia-editor/content-blocks', 'label' => 'Content Blocks', 'links' => [
                    ['link' => 'frontend/tulia-editor/content-blocks/extensions/index', 'label' => 'Extensions', 'links' => [
                        ['link' => 'frontend/tulia-editor/content-blocks/extensions/contenteditable', 'label' => 'Contenteditable'],
                        ['link' => 'frontend/tulia-editor/content-blocks/extensions/wysiwyg-editor', 'label' => 'WysiwygEditor'],
                        ['link' => 'frontend/tulia-editor/content-blocks/extensions/image', 'label' => 'Image'],
                        ['link' => 'frontend/tulia-editor/content-blocks/extensions/background-image', 'label' => 'BackgroundImage'],
                        ['link' => 'frontend/tulia-editor/content-blocks/extensions/font-icon', 'label' => 'FontIcon'],
                        ['link' => 'frontend/tulia-editor/content-blocks/extensions/collection', 'label' => 'Collection'],
                    ]],
                    /*['link' => 'frontend/tulia-editor/bloki/kontrolki/index', 'label' => 'Kontrolki', 'links' => [
                        ['link' => 'frontend/tulia-editor/bloki/kontrolki/input-text', 'label' => 'Input.Text'],
                        ['link' => 'frontend/tulia-editor/bloki/kontrolki/input-range', 'label' => 'Input.Range'],
                        ['link' => 'frontend/tulia-editor/bloki/kontrolki/select', 'label' => 'Select'],
                    ]],*/
                ]],
                /*['link' => 'frontend/tulia-editor/rozszerzenia', 'label' => 'Rozszerzenia'],*/
            ]],
        ]],
        /*['label' => 'Tulia Editor', 'icon' => 'fa-solid fa-brush', 'links' => [
            ['link' => 'tulia-editor/podstawy-edytora', 'label' => 'Podstawy edytora'],
            ['link' => 'tulia-editor/bloki', 'label' => 'Bloki'],
            ['link' => 'tulia-editor/rozszerzenia', 'label' => 'Rozszerzenia'],
        ]],*/
        ['label' => 'Modules', 'icon' => 'fa-solid fa-box-open', 'links' => [
            ['link' => 'modules/developing', 'label' => 'Developing modules'],
            ['link' => 'modules/import-export', 'label' => 'Import/Export', 'links' => [
                ['link' => 'modules/import-export/relations-between-objects', 'label' => 'Relations between objects'],
                ['link' => 'modules/import-export/import-of-multilingual-objects', 'label' => 'Import of multilingual objects'],
                ['link' => 'modules/import-export/import-of-author-dependent-objects', 'label' => 'Import of author dependent objects'],
                ['link' => 'modules/import-export/list-of-objects-available-to-import', 'label' => 'List of available objects for import'],
                ['link' => 'modules/import-export/files-import', 'label' => 'Files Import'],
            ]],
            //['link' => 'moduly/options', 'label' => 'Options'],
        ]],
        ['label' => 'On production', 'icon' => 'fa-solid fa-cloud', 'links' => [
            ['link' => 'on-production/deployment', 'label' => 'Deployment'],
            //['link' => 'na-produkcji/wydajnosc', 'label' => 'Wydajność'],
        ]],
        ['label' => 'References', 'icon' => 'fa-solid fa-cloud', 'links' => [
            ['link' => 'reference/extension/manifest-file', 'label' => 'Extension manifest file'],
        ]],
    ]
];
