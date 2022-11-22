<?php

return [
    'sections' => [
        ['label' => 'Getting started', 'icon' => 'fa-solid fa-book-open', 'links' => [
            ['link' => 'getting-started/wprowadzenie', 'label' => 'Wprowadzenie'],
            ['link' => 'getting-started/instalacja', 'label' => 'Instalacja systemu'],
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
            ['link' => 'frontend/motywy', 'label' => 'Motywy'],
            //['link' => 'frontend/zasoby', 'label' => 'Zasoby (assets)'],
           // ['link' => 'architektura/hooks', 'label' => 'Hooks'],
        ]],
        /*['label' => 'Tulia Editor', 'icon' => 'fa-solid fa-brush', 'links' => [
            ['link' => 'tulia-editor/podstawy-edytora', 'label' => 'Podstawy edytora'],
            ['link' => 'tulia-editor/bloki', 'label' => 'Bloki'],
            ['link' => 'tulia-editor/rozszerzenia', 'label' => 'Rozszerzenia'],
        ]],*/
        ['label' => 'Moduły', 'icon' => 'fa-solid fa-box-open', 'links' => [
            ['link' => 'moduly/import-export', 'label' => 'Import/Export'],
            //['link' => 'moduly/options', 'label' => 'Options'],
        ]],
        ['label' => 'Na produkcji', 'icon' => 'fa-solid fa-cloud', 'links' => [
            ['link' => 'na-produkcji/deployment', 'label' => 'Deployment'],
            //['link' => 'na-produkcji/wydajnosc', 'label' => 'Wydajność'],
        ]],
    ]
];
