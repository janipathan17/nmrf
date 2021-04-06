<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Entity\EntityDeleteEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityDeleteEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Delete Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Entity\Delete\HookEntityDeletePluginManager $pluginManager
 */
final class HookEntityDeleteEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_DELETE => 'onEntityDelete',
    ];
  }

  /**
   * On Entity Delete Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Entity\EntityDeleteEvent $event
   *   The Entity Delete Event.
   */
  public function onEntityDelete(EntityDeleteEvent $event) : void {
    $this->handleHooks($event);
  }

}
