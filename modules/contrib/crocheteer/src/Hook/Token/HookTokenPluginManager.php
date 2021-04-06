<?php

namespace Drupal\crocheteer\Hook\Token;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookTokenPluginManager.
 *
 * Base Plugin Manager class for all Hook Token Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EventInterface $event
 */
abstract class HookTokenPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

}
