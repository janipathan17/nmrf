<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Theme\ThemeEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookThemeEventSubscriber.
 *
 * Hook Event Subscriber class for the Theme Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Theme\HookThemePluginManager $pluginManager
 */
final class HookThemeEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::THEME => 'onTheme',
    ];
  }

  /**
   * On Theme Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Theme\ThemeEvent $event
   *   The Theme Event.
   */
  public function onTheme(ThemeEvent $event) : void {
    $this->handleHooks($event);
  }

}
