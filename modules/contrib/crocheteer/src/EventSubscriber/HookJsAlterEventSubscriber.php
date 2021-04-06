<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Theme\JsAlterEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookJsAlterEventSubscriber.
 *
 * Hook Event Subscriber class for the Js Alter Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Js\Alter\HookJsAlterPluginManager $pluginManager
 */
final class HookJsAlterEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::JS_ALTER => 'onJsAlter',
    ];
  }

  /**
   * On Js Alter Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Theme\JsAlterEvent $event
   *   The Js Alter Event.
   */
  public function onJsAlter(JsAlterEvent $event) : void {
    $this->handleHooks($event);
  }

}
