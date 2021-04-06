<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Theme\TemplatePreprocessDefaultVariablesAlterEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookTemplatePreProcessDefaultVariablesAlterEventSubscriber.
 *
 * Hook Event Subscriber class for the Template Pre-Process Default Variables
 * Alter Event.
 *
 * @property-read \Drupal\crocheteer\Hook\TemplatePreProcess\DefaultVariablesAlter\HookTemplatePreProcessDefaultVariablesAlterPluginManager $pluginManager
 */
final class HookTemplatePreProcessDefaultVariablesAlterEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::TEMPLATE_PREPROCESS_DEFAULT_VARIABLES_ALTER => 'onTemplatePreProcessDefaultVariablesAlter',
    ];
  }

  /**
   * On Template Pre-Process Default Variables Alter Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Theme\TemplatePreprocessDefaultVariablesAlterEvent $event
   *   The Template Pre-Process Default Variables Alter Event.
   */
  public function onTemplatePreProcessDefaultVariablesAlter(TemplatePreprocessDefaultVariablesAlterEvent $event) : void {
    $this->handleHooks($event);
  }

}
