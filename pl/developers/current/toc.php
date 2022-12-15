<?php

return [
    'sections' => [
        ['label' => 'Getting started', 'icon' => 'fa-solid fa-book-open', 'links' => [
            ['link' => 'getting-started/wprowadzenie', 'label' => 'Wprowadzenie'],
            ['link' => 'getting-started/instalacja', 'label' => 'Instalacja systemu', 'links' => [
                ['link' => 'getting-started/lista-polecen-make', 'label' => 'Lista poleceń make'],
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
            ['link' => 'frontend/motywy/index', 'label' => 'Motywy', 'links' => [
                ['link' => 'frontend/motywy/glowny-widok-motywu', 'label' => 'Główny widok motywu'],
                ['link' => 'frontend/motywy/widoki-motywu', 'label' => 'Widoki motywu'],
                ['link' => 'frontend/motywy/nadpisywanie-widokow', 'label' => 'Nadpisywanie widoków'],
                ['link' => 'frontend/motywy/customizer', 'label' => 'Customizer', 'links' => [
                    ['link' => 'frontend/motywy/zmienne-css', 'label' => 'Zmienne CSS'],
                    ['link' => 'frontend/motywy/gotowe-konfiguracje-customizera', 'label' => 'Gotowe konfiguracje'],
                ]],
                ['link' => 'frontend/motywy/dziedziczenie-motywow', 'label' => 'Dziedziczenie motywów'],
                ['link' => 'frontend/motywy/strony-bledow', 'label' => 'Strony błędów'],
                ['link' => 'frontend/motywy/funkcje-widokow-twig', 'label' => 'Lista funkcji widoków'],
            ]],
            //['link' => 'frontend/motywy/zasoby', 'label' => 'Zasoby (assets)'],
            ['link' => 'frontend/tulia-editor/index', 'label' => 'Tulia Editor', 'links' => [
                ['link' => 'frontend/tulia-editor/index', 'label' => 'Podstawy edytora'],
                ['link' => 'frontend/tulia-editor/bloki-tresci', 'label' => 'Bloki', 'links' => [
                    ['link' => 'frontend/tulia-editor/bloki/rozszerzenia/index', 'label' => 'Rozszerzenia', 'links' => [
                        ['link' => 'frontend/tulia-editor/bloki/rozszerzenia/contenteditable', 'label' => 'Contenteditable'],
                        ['link' => 'frontend/tulia-editor/bloki/rozszerzenia/wysiwyg-editor', 'label' => 'WysiwygEditor'],
                        ['link' => 'frontend/tulia-editor/bloki/rozszerzenia/image', 'label' => 'Image'],
                        ['link' => 'frontend/tulia-editor/bloki/rozszerzenia/background-image', 'label' => 'BackgroundImage'],
                        ['link' => 'frontend/tulia-editor/bloki/rozszerzenia/font-icon', 'label' => 'FontIcon'],
                        ['link' => 'frontend/tulia-editor/bloki/rozszerzenia/collection', 'label' => 'Collection'],
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
        ['label' => 'Moduły', 'icon' => 'fa-solid fa-box-open', 'links' => [
            ['link' => 'moduly/import-export', 'label' => 'Import/Export', 'links' => [
                ['link' => 'moduly/import-export/zaleznosci-pomiedzy-obiektami', 'label' => 'Zależności pomiędzy obiektami'],
                ['link' => 'moduly/import-export/import-wielojezycznych-obiektow', 'label' => 'Import wielojęzycznych obiektów'],
                ['link' => 'moduly/import-export/import-obiektow-zaleznych-od-autora', 'label' => 'Import obiektów zależnych od autora'],
                ['link' => 'moduly/import-export/lista-dostepnych-obiektow-do-importu', 'label' => 'Lista dostępnych obiektów do importu'],
                ['link' => 'moduly/import-export/import-plikow', 'label' => 'Import plików'],
            ]],
            //['link' => 'moduly/options', 'label' => 'Options'],
        ]],
        ['label' => 'Na produkcji', 'icon' => 'fa-solid fa-cloud', 'links' => [
            ['link' => 'na-produkcji/deployment', 'label' => 'Deployment'],
            //['link' => 'na-produkcji/wydajnosc', 'label' => 'Wydajność'],
        ]],
    ]
];
