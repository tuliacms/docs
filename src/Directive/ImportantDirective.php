<?php

declare(strict_types=1);

namespace Tulia\Docs\Directive;

/**
 * @author Adam Banaszkiewicz
 */
final class ImportantDirective extends AbstractHintDirective
{
    public function __construct()
    {
        parent::__construct('important', 'Important');
    }
}
