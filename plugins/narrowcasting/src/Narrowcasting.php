<?php

namespace brikdigital\narrowcasting;

use Craft;
use brikdigital\narrowcasting\elements\Narrowcast;
use brikdigital\narrowcasting\models\Settings;
use craft\base\Model;
use craft\base\Plugin;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterUrlRulesEvent;
use craft\services\Elements;
use craft\web\UrlManager;
use yii\base\Event;

/**
 * craft-narrowcasting plugin
 *
 * @method static Narrowcasting getInstance()
 * @method Settings getSettings()
 * @author Alyxia Sother <alyxia@riseup.net>
 * @copyright Alyxia Sother
 * @license MIT
 */
class Narrowcasting extends Plugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSection = true;
    public bool $hasCpSettings = true;

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init()
    {
        parent::init();

        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function () {
            $this->attachEventHandlers();
            // ...
        });
    }

    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate('narrowcasting/_settings.twig', [
            'plugin' => $this,
            'settings' => $this->getSettings(),
        ]);
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/4.x/extend/events.html to get started)
        Event::on(Elements::class, Elements::EVENT_REGISTER_ELEMENT_TYPES, function (RegisterComponentTypesEvent $event) {
            $event->types[] = Narrowcast::class;
        });
        Event::on(UrlManager::class, UrlManager::EVENT_REGISTER_CP_URL_RULES, function (RegisterUrlRulesEvent $event) {
            $event->rules['narrowcasting'] = ['template' => 'narrowcasting/narrowcasts/_index.twig'];
            $event->rules['narrowcasting/new'] = 'elements/edit';
            $event->rules['narrowcasting/<elementId:\\d+>'] = 'elements/edit';
        });
    }
}
