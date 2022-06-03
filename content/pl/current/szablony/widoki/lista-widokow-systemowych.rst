---
Title: Lista widoków systemowych - Tulia CMS
Description: Struktura widoków frontowych CMS
Author: Adam Banaszkiewicz
---

# Lista widoków systemowych

Niniejsza strona przedstawia strukturę domyślnych widoków systemu CMS, które są używane do wyświetlania strony.
Każdy z tych widoków może być nadpisany przez aktywny szablon.

Jeśli w jednym katalogu znajduje się kilka widoków o takim samym przedrostku (np. `node.tpl` oraz `node-{id}.tpl`),
to znaczy, że podczas renderowania strony użyty będzie pierwszy znaleziony/nadpisany. Na przykład dla plików
`node`, najpierw sprawdzane jest czy istnieje plik z identyfikatorem Node'a
`node-4ce9921e-0db6-479e-9bdc-2c737fc3fece.tpl`, jeśli nie ma to sprawdzany jest plik z typem Node'a `node-page.tpl`,
a na końcu dopiero renderowany jest ogólny plik `node.tpl`. Dzięki takiemu zabiegowi definiujemy domyśly widok dla
wszystkich typów danego rodzaju podstrony, a dla poszczególnych typów czy nawet poszczególnych podstron możemy stworzyć
indywidualne wyglądy, zdefiniowane w danym Szablonie, nie modyfikując w żaden sposób systemu.

<ul>
    <li>
        <b>homepage</b>
        <ul>
            <li><code>index.tpl</code> - wywołanie: <code>@backend/homepage/index.tpl</code></li>
        </ul>
    </li>
    <li>
        <b>node</b>    
        <ul>
            <li><code>node-{id}.tpl</code> - wywołanie: <code>@cms/node/node-{id}.tpl</code></li>
            <li><code>node-{type}.tpl</code> - wywołanie: <code>@cms/node/node-{type}.tpl</code></li>
            <li><code>node.tpl</code> - wywołanie: <code>@cms/node/node.tpl</code></li>
        </ul>
    </li>
</ul>

