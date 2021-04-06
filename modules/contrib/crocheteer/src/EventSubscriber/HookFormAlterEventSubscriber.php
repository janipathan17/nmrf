<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Form\FormAlterEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookFormAlterEventSubscriber.
 *
 * Hook Event Subscriber class for the Form Alter Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Form\Alter\HookFormAlterPluginManager $pluginManager
 */
final class HookFormAlterEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::FORM_ALTER => 'onFormAlter',
    ];
  }

  /**
   * On Form Alter Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Form\FormAlterEvent $event
   *   The Form Alter Event.
   */
  public function onFormAlter(FormAlterEvent $event) : void {
    $this->handleHooks($event);
  }

}
