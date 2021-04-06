<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\EntityExtra\EntityExtraFieldInfoAlterEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityExtraFieldInfoAlterEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Extra Field Info Event.
 *
 * @property-read \Drupal\crocheteer\Hook\EntityExtra\FieldInfoAlter\HookEntityExtraFieldInfoAlterPluginManager $pluginManager
 */
final class HookEntityExtraFieldInfoAlterEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_EXTRA_FIELD_INFO_ALTER => 'onEntityExtraFieldInfoAlter',
    ];
  }

  /**
   * On Entity Field FieldInfoAlter Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\EntityExtra\EntityExtraFieldInfoAlterEvent $event
   *   The Entity Field FieldInfoAlter Event.
   */
  public function onEntityExtraFieldInfoAlter(EntityExtraFieldInfoAlterEvent $event) : void {
    $this->handleHooks($event);
  }

}
