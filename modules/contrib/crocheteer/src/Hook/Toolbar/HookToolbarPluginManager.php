<?php

namespace Drupal\crocheteer\Hook\Toolbar;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookToolbarPluginManager.
 *
 * Base Plugin Manager class for all Hook Toolbar Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EventInterface $event
 */
abstract class HookToolbarPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

}
