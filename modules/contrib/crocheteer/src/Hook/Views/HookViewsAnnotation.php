<?php

namespace Drupal\crocheteer\Hook\Views;

use Drupal\crocheteer\Hook\HookAnnotation;

/**
 * Class HookViewsAnnotation.
 *
 * Base class for all Hook Views Annotation classes.
 */
abstract class HookViewsAnnotation extends HookAnnotation {

  /**
   * Array of relevant Views IDs.
   *
   * @var string[]
   */
  public $viewsIds;

  /**
   * Array of relevant Views displays.
   *
   * @var string[]
   */
  public $displays;

}
