<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\User\UserLogoutEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookUserLogoutEventSubscriber.
 *
 * Hook Event Subscriber class for the User Logout Event.
 *
 * @property-read \Drupal\crocheteer\Hook\User\Logout\HookUserLogoutPluginManager $pluginManager
 */
final class HookUserLogoutEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::USER_LOGOUT => 'onUserLogout',
    ];
  }

  /**
   * On User Logout Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\User\UserLogoutEvent $event
   *   The User Logout Event.
   */
  public function onUserLogout(UserLogoutEvent $event) : void {
    $this->handleHooks($event);
  }

}
