<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\EntityType\EntityBaseFieldInfoEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityBaseFieldInfoEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Base Field Info Event.
 *
 * @property-read \Drupal\crocheteer\Hook\EntityType\BaseFieldInfo\HookEntityBaseFieldInfoPluginManager $pluginManager
 */
final class HookEntityBaseFieldInfoEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_BASE_FIELD_INFO => 'onEntityBaseFieldInfo',
    ];
  }

  /**
   * On Entity Base Field Info Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\EntityType\EntityBaseFieldInfoEvent $event
   *   The Entity Base Field Info Event.
   */
  public function onEntityBaseFieldInfo(EntityBaseFieldInfoEvent $event) : void {
    $this->handleHooks($event);
  }

}
