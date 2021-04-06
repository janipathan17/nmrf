<?php

namespace Drupal\crocheteer\Hook\TemplatePreProcess;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookTemplatePreProcessPluginManager.
 *
 * Base Plugin Manager class for all Hook Template Pre-Process Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EventInterface $event
 */
abstract class HookTemplatePreProcessPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

}
