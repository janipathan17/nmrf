<?php

namespace Drupal\crocheteer\Hook\ThemeSuggestions;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookThemeSuggestionsPluginManager.
 *
 * Base Plugin Manager class for all Hook Theme Suggestions Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Theme\BaseThemeSuggestionsEvent $event
 */
abstract class HookThemeSuggestionsPluginManager extends HookPluginManager {

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [
      'themeHooks' => $this->event->getHook(),
    ];
  }

}
