<?php

declare(strict_types=1);

namespace Tulia\Docs\Directive;

use Doctrine\RST\Directives\SubDirective;
use Doctrine\RST\Nodes\Node;
use Doctrine\RST\Parser;

/**
 * @author Adam Banaszkiewicz
 */
abstract class AbstractHintDirective extends SubDirective
{
    private string $name;
    private string $text;

    public function __construct(string $name, string $text)
    {
        $this->name = $name;
        $this->text = $text;
    }

    final public function processSub(
        Parser $parser,
        ?Node $document,
        string $variable,
        string $data,
        array $options
    ): ?Node {
        if (null === $document) {
            throw new \RuntimeException('Directive cannot have empty content.');
        }

        $wrapperDiv = $parser->renderTemplate(
            'directives/hint.html.twig',
            [
                'name' => $this->name,
                'text' => $data ?? $this->text,
                'class' => $options['class'] ?? null,
            ]
        );

        return $parser->getNodeFactory()->createWrapperNode($document, $wrapperDiv, '</div>');
    }

    final public function getName(): string
    {
        return $this->name;
    }
}
