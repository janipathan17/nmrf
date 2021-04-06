<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Entity\EntityLoadEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityLoadEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Load Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Entity\Load\HookEntityLoadPluginManager $pluginManager
 */
final class HookEntityLoadEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_LOAD => 'onEntityLoad',
    ];
  }

  /**
   * On Entity Load Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Entity\EntityLoadEvent $event
   *   The Entity Load Event.
   */
  public function onEntityLoad(EntityLoadEvent $event) : void {
    $this->handleHooks($event);
  }

}
