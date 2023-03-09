<?php

namespace brikdigital\narrowcasting\elements\conditions;

use Craft;
use craft\elements\conditions\ElementCondition;

/**
 * Narrowcast condition
 */
class NarrowcastCondition extends ElementCondition
{
    protected function conditionRuleTypes(): array
    {
        return array_merge(parent::conditionRuleTypes(), [
            // ...
        ]);
    }
}
