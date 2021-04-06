<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Token\TokensInfoEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookTokenInfoEventSubscriber.
 *
 * Hook Event Subscriber class for the Token Info Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Token\Info\HookTokenInfoPluginManager $pluginManager
 */
final class HookTokenInfoEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::TOKEN_INFO => 'onTokenInfo',
    ];
  }

  /**
   * On Token Info Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Token\TokensInfoEvent $event
   *   The Token Info Event.
   */
  public function onTokenInfo(TokensInfoEvent $event) : void {
    $this->handleHooks($event);
  }

}
