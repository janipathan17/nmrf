<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\User\UserLoginEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookUserLoginEventSubscriber.
 *
 * Hook Event Subscriber class for the User Login Event.
 *
 * @property-read \Drupal\crocheteer\Hook\User\Login\HookUserLoginPluginManager $pluginManager
 */
final class HookUserLoginEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::USER_LOGIN => 'onUserLogin',
    ];
  }

  /**
   * On User Login Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\User\UserLoginEvent $event
   *   The User Login Event.
   */
  public function onUserLogin(UserLoginEvent $event) : void {
    $this->handleHooks($event);
  }

}
