<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Form\WidgetFormAlterEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookWidgetFormAlterEventSubscriber.
 *
 * Hook Event Subscriber class for the Widget Form Alter Event.
 *
 * @property-read \Drupal\crocheteer\Hook\WidgetForm\Alter\HookWidgetFormAlterPluginManager $pluginManager
 */
final class HookWidgetFormAlterEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::WIDGET_FORM_ALTER => 'onWidgetFormAlter',
    ];
  }

  /**
   * On Widget Form Alter Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Form\WidgetFormAlterEvent $event
   *   The Widget Form Alter Event.
   */
  public function onWidgetFormAlter(WidgetFormAlterEvent $event) : void {
    $this->handleHooks($event);
  }

}
