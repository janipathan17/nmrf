<?php

namespace Drupal\crocheteer\Hook\WidgetForm;

use Drupal\crocheteer\Hook\HookAnnotation;

/**
 * Class HookWidgetFormAnnotation.
 *
 * Base class for all Hook Widget Form Annotation classes.
 */
abstract class HookWidgetFormAnnotation extends HookAnnotation {

  /**
   * Array of relevant Widget IDs.
   *
   * @var string[]
   */
  public $widgetIds;

}
