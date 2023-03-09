<?php

namespace brikdigital\narrowcasting\controllers;

use Craft;
use craft\web\Controller;
use yii\web\Response;

/**
 * Narrowcast controller
 */
class NarrowcastController extends Controller
{
    public $defaultAction = 'index';
    protected array|int|bool $allowAnonymous = self::ALLOW_ANONYMOUS_NEVER;

    /**
     * narrowcasting/narrowcast action
     */
    public function actionIndex(): Response
    {
        // ...
    }
}
