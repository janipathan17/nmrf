<?php

namespace Drupal\crocheteer\Hook\EntityField;

use Drupal\crocheteer\Hook\HookAnnotation;

/**
 * Class HookEntityFieldAnnotation.
 *
 * Base class for all Hook Entity Field Annotation classes.
 */
abstract class HookEntityFieldAnnotation extends HookAnnotation {

  /**
   * Array of relevant Entity Field machine names.
   *
   * @var string[]
   */
  public $names;

}
