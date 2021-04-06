<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Entity\EntityInsertEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityInsertEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Insert Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Entity\Insert\HookEntityInsertPluginManager $pluginManager
 */
final class HookEntityInsertEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_INSERT => 'onEntityInsert',
    ];
  }

  /**
   * On Entity Insert Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Entity\EntityInsertEvent $event
   *   The Entity Insert Event.
   */
  public function onEntityInsert(EntityInsertEvent $event) : void {
    $this->handleHooks($event);
  }

}
