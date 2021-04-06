<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Path\PathDeleteEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookPathDeleteEventSubscriber.
 *
 * Hook Event Subscriber class for the Path Delete Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Path\Delete\HookPathDeletePluginManager $pluginManager
 */
final class HookPathDeleteEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::PATH_DELETE => 'onPathDelete',
    ];
  }

  /**
   * On Path Delete Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Path\PathDeleteEvent $event
   *   The Path Delete Event.
   */
  public function onPathDelete(PathDeleteEvent $event) : void {
    $this->handleHooks($event);
  }

}
