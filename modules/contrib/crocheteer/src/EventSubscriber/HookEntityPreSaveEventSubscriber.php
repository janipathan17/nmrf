<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Entity\EntityPresaveEvent as EntityPreSaveEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityPreSaveEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity Pre-Save Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Entity\PreSave\HookEntityPreSavePluginManager $pluginManager
 */
final class HookEntityPreSaveEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_PRE_SAVE => 'onEntityPreSave',
    ];
  }

  /**
   * On Entity Pre-Save Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Entity\EntityPresaveEvent $event
   *   The Entity Pre-Save Event.
   */
  public function onEntityPreSave(EntityPreSaveEvent $event) : void {
    $this->handleHooks($event);
  }

}
