<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Path\PathInsertEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookPathInsertEventSubscriber.
 *
 * Hook Event Subscriber class for the Path Insert Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Path\Insert\HookPathInsertPluginManager $pluginManager
 */
final class HookPathInsertEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::PATH_INSERT => 'onPathInsert',
    ];
  }

  /**
   * On Path Insert Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Path\PathInsertEvent $event
   *   The Path Insert Event.
   */
  public function onPathInsert(PathInsertEvent $event) : void {
    $this->handleHooks($event);
  }

}
