<?php

namespace Drupal\crocheteer\Hook\Form;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookFormPluginManager.
 *
 * Base Plugin Manager class for all Hook Form Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Form\BaseFormEvent $event
 */
abstract class HookFormPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [
      'formIds' => $this->event->getFormId()
    ];
  }

}
