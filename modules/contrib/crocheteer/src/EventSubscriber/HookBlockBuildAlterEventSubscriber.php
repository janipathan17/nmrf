<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Block\BlockBuildAlterEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookBlockBuildAlterEventSubscriber.
 *
 * Hook Event Subscriber class for the Block Build Alter Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Block\BuildAlter\HookBlockBuildAlterPluginManager $pluginManager
 */
final class HookBlockBuildAlterEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::BLOCK_BUILD_ALTER => 'onBlockBuildAlter',
    ];
  }

  /**
   * On Block Build Alter Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Block\BlockBuildAlterEvent $event
   *   The Block Build Alter Event.
   */
  public function onBlockBuildAlter(BlockBuildAlterEvent $event) : void {
    $this->handleHooks($event);
  }

}
