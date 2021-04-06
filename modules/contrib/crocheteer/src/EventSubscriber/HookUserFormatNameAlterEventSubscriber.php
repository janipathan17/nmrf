<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\User\UserFormatNameAlterEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookUserFormatNameAlterEventSubscriber.
 *
 * Hook Event Subscriber class for the User Format Name Alter Event.
 *
 * @property-read \Drupal\crocheteer\Hook\User\FormatNameAlter\HookUserFormatNameAlterPluginManager $pluginManager
 */
final class HookUserFormatNameAlterEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::USER_FORMAT_NAME_ALTER => 'onUserFormatNameAlter',
    ];
  }

  /**
   * On User Format Name Alter Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\User\UserFormatNameAlterEvent $event
   *   The User Format Name Alter Event.
   */
  public function onUserFormatNameAlter(UserFormatNameAlterEvent $event) : void {
    $this->handleHooks($event);
  }

}
