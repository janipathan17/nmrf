<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\EntityExtra\EntityExtraFieldInfoEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityExtraFieldInfoEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Extra Field Info Event.
 *
 * @property-read \Drupal\crocheteer\Hook\EntityExtra\FieldInfo\HookEntityExtraFieldInfoPluginManager $pluginManager
 */
final class HookEntityExtraFieldInfoEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_EXTRA_FIELD_INFO => 'onEntityExtraFieldInfo',
    ];
  }

  /**
   * On Entity Field FieldInfo Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\EntityExtra\EntityExtraFieldInfoEvent $event
   *   The Entity Field FieldInfo Event.
   */
  public function onEntityExtraFieldInfo(EntityExtraFieldInfoEvent $event) : void {
    $this->handleHooks($event);
  }

}
