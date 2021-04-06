<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Entity\EntityPredeleteEvent as EntityPreDeleteEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityPreDeleteEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Pre-Delete Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Entity\PreDelete\HookEntityPreDeletePluginManager $pluginManager
 */
final class HookEntityPreDeleteEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_PRE_DELETE => 'onEntityPreDelete',
    ];
  }

  /**
   * On Entity Pre-Delete Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Entity\EntityPredeleteEvent $event
   *   The Entity Pre-Delete Event.
   */
  public function onEntityPreDelete(EntityPreDeleteEvent $event) : void {
    $this->handleHooks($event);
  }

}
