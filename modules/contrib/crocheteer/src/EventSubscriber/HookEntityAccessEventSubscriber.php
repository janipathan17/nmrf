<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Entity\EntityAccessEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityAccessEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Access Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Entity\Access\HookEntityAccessPluginManager $pluginManager
 */
final class HookEntityAccessEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_ACCESS => 'onEntityAccess',
    ];
  }

  /**
   * On Entity Access Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Entity\EntityAccessEvent $event
   *   The Entity Access Event.
   */
  public function onEntityAccess(EntityAccessEvent $event) : void {
    $this->handleHooks($event);
  }

}
