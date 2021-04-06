<?php

namespace Drupal\crocheteer\Hook\Page;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookPagePluginManager.
 *
 * Base Plugin Manager class for all Hook Page Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EventInterface $event
 */
abstract class HookPagePluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

}
