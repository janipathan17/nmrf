<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Path\PathUpdateEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookPathUpdateEventSubscriber.
 *
 * Hook Event Subscriber class for the Path Update Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Path\Update\HookPathUpdatePluginManager $pluginManager
 */
final class HookPathUpdateEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::PATH_UPDATE => 'onPathUpdate',
    ];
  }

  /**
   * On Path Update Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Path\PathUpdateEvent $event
   *   The Path Update Event.
   */
  public function onPathUpdate(PathUpdateEvent $event) : void {
    $this->handleHooks($event);
  }

}
