<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Entity\EntityUpdateEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityUpdateEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Update Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Entity\Update\HookEntityUpdatePluginManager $pluginManager
 */
final class HookEntityUpdateEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_UPDATE => 'onEntityUpdate',
    ];
  }

  /**
   * On Entity Update Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Entity\EntityUpdateEvent $event
   *   The Entity Update Event.
   */
  public function onEntityUpdate(EntityUpdateEvent $event) : void {
    $this->handleHooks($event);
  }

}
