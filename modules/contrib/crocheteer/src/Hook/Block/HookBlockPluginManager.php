<?php

namespace Drupal\crocheteer\Hook\Block;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookBlockPluginManager.
 *
 * Base Plugin Manager class for all Hook Block Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Block\BaseBlockEvent $event
 */
abstract class HookBlockPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [
      'baseIds' => $this->event->getBlock()->getBaseId(),
    ];
  }

}
