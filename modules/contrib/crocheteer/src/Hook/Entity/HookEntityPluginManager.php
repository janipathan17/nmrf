<?php

namespace Drupal\crocheteer\Hook\Entity;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookEntityPluginManager.
 *
 * Base Plugin Manager class for all Hook Entity Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Entity\BaseEntityEvent $event
 */
abstract class HookEntityPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [
      'entityTypeIds' => $this->event->getEntity()->getEntityTypeId(),
      'bundles' => $this->event->getEntity()->bundle(),
    ];
  }

}
