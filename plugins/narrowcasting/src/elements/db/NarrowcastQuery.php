<?php

namespace brikdigital\narrowcasting\elements\db;

use Craft;
use craft\elements\db\ElementQuery;

/**
 * Narrowcast query
 */
class NarrowcastQuery extends ElementQuery
{
    protected function beforePrepare(): bool
    {
        // todo: join the `narrowcasts` table
        // $this->joinElementTable('narrowcasts');

        // todo: apply any custom query params
        // ...

        return parent::beforePrepare();
    }
}
