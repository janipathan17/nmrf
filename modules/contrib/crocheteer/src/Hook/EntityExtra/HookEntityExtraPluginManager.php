<?php

namespace Drupal\crocheteer\Hook\EntityExtra;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookEntityExtraPluginManager.
 *
 * Base Plugin Manager class for all Hook Entity Extra Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EventInterface $event
 */
abstract class HookEntityExtraPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

}
