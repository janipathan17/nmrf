<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Theme\ThemeSuggestionsAlterEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookThemeSuggestionsAlterEventSubscriber.
 *
 * Hook Event Subscriber class for the Theme Suggestions Alter Event.
 *
 * @property-read \Drupal\crocheteer\Hook\ThemeSuggestions\Alter\HookThemeSuggestionsAlterPluginManager $pluginManager
 */
final class HookThemeSuggestionsAlterEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::THEME_SUGGESTIONS_ALTER => 'onThemeSuggestionsAlter',
    ];
  }

  /**
   * On Theme Suggestions Alter Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Theme\ThemeSuggestionsAlterEvent $event
   *   The Theme Suggestions Alter Event.
   */
  public function onThemeSuggestionsAlter(ThemeSuggestionsAlterEvent $event) : void {
    $this->handleHooks($event);
  }

}
