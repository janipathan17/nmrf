<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Token\TokensReplacementEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookTokenReplacementEventSubscriber.
 *
 * Hook Event Subscriber class for the Token Replacement Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Token\Replacement\HookTokenReplacementPluginManager $pluginManager
 */
final class HookTokenReplacementEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::TOKEN_REPLACEMENT => 'onTokenReplacement',
    ];
  }

  /**
   * On Token Replacement Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Token\TokensReplacementEvent $event
   *   The Token Replacement Event.
   */
  public function onTokenReplacement(TokensReplacementEvent $event) : void {
    $this->handleHooks($event);
  }

}
