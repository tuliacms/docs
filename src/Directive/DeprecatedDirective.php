<?php

declare(strict_types=1);

namespace Tulia\Docs\Directive;

/**
 * @author Adam Banaszkiewicz
 */
final class DeprecatedDirective extends AbstractHintDirective
{
    public function __construct()
    {
        parent::__construct('deprecated', 'Deprecated');
    }
}
