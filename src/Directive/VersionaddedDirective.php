<?php

declare(strict_types=1);

namespace Tulia\Docs\Directive;

/**
 * @author Adam Banaszkiewicz
 */
final class VersionaddedDirective extends AbstractHintDirective
{
    public function __construct()
    {
        parent::__construct('versionadded', 'Added in version');
    }
}
