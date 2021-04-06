<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\EntityField\EntityFieldAccessEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityFieldAccessEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Field Access Event.
 *
 * @property-read \Drupal\crocheteer\Hook\EntityField\Access\HookEntityFieldAccessPluginManager $pluginManager
 */
final class HookEntityFieldAccessEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_FIELD_ACCESS => 'onEntityFieldAccess',
    ];
  }

  /**
   * On Entity Field Access Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\EntityField\EntityFieldAccessEvent $event
   *   The Entity Field Access Event.
   */
  public function onEntityFieldAccess(EntityFieldAccessEvent $event) : void {
    $this->handleHooks($event);
  }

}
