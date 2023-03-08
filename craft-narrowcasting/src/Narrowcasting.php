<?php

namespace brikdigital\narrowcasting;

use craft\base\Plugin as CPlugin;
use craft\base\PluginTrait;
use craft\events\RegisterCpNavItemsEvent;
use craft\web\twig\variables\Cp;
use yii\base\Event;

class Narrowcasting extends CPlugin
{

  use PluginTrait;

  public function init()
  {
    parent::init();

    Event::on(
      Cp::class,
      Cp::EVENT_REGISTER_CP_NAV_ITEMS,
      function (RegisterCpNavItemsEvent $event) {
        $event->navItems[] = [
          'url' => 'narrowcasting',
          'label' => 'Narrowcasting',
          'icon' => '@Narrowcasting/icon.svg',
        ];
      }
    );
  }
}
