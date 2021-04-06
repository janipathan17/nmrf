<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Toolbar\ToolbarAlterEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookToolbarAlterEventSubscriber.
 *
 * Hook Event Subscriber class for the Toolbar Alter Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Toolbar\Alter\HookToolbarAlterPluginManager $pluginManager
 */
final class HookToolbarAlterEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::TOOLBAR_ALTER => 'onToolbarAlter',
    ];
  }

  /**
   * On Toolbar Alter Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Toolbar\ToolbarAlterEvent $event
   *   The Toolbar Alter Event.
   */
  public function onToolbarAlter(ToolbarAlterEvent $event) : void {
    $this->handleHooks($event);
  }

}
