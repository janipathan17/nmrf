<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Entity\EntityViewEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookEntityViewEventSubscriber.
 *
 * Hook Event Subscriber class for the Entity View Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Entity\View\HookEntityViewPluginManager $pluginManager
 */
final class HookEntityViewEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::ENTITY_VIEW => 'onEntityView',
    ];
  }

  /**
   * On Entity View Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Entity\EntityViewEvent $event
   *   The Entity View Event.
   */
  public function onEntityView(EntityViewEvent $event) : void {
    $this->handleHooks($event);
  }

}
