<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Entity\EntityCreateEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityCreateEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Create Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Entity\Create\HookEntityCreatePluginManager $pluginManager
 */
final class HookEntityCreateEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_CREATE => 'onEntityCreate',
    ];
  }

  /**
   * On Entity Create Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Entity\EntityCreateEvent $event
   *   The Entity Create Event.
   */
  public function onEntityCreate(EntityCreateEvent $event) : void {
    $this->handleHooks($event);
  }

}
