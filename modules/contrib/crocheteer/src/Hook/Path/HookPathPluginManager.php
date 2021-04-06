<?php

namespace Drupal\crocheteer\Hook\Path;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookPathPluginManager.
 *
 * Base Plugin Manager class for all Hook Path Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Path\BasePathEvent $event
 */
abstract class HookPathPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

}
