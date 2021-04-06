<?php

namespace Drupal\crocheteer\Hook\Views;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookViewsPluginManager.
 *
 * Base Plugin Manager class for all Hook Views Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Views\BaseViewsEvent $event
 */
abstract class HookViewsPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [
      'viewsIds' => $this->event->getView()->id(),
      'displays' => $this->event->getView()->current_display,
    ];
  }

}
