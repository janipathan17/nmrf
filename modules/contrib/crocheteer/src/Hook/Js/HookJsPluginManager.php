<?php

namespace Drupal\crocheteer\Hook\Js;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookJsPluginManager.
 *
 * Base Plugin Manager class for all Hook Js Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EventInterface $event
 */
abstract class HookJsPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

}
