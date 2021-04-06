<?php

namespace Drupal\crocheteer\Hook\ThemeSuggestions;

use Drupal\crocheteer\Hook\HookAnnotation;

/**
 * Class HookThemeSuggestionsAnnotation.
 *
 * Base class for all Hook Theme Suggestions Annotation classes.
 */
abstract class HookThemeSuggestionsAnnotation extends HookAnnotation {

  /**
   * Array of relevant Theme hooks.
   *
   * @var string[]
   */
  public $themeHooks;

}
