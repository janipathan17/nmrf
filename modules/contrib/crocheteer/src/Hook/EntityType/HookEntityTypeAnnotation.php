<?php

namespace Drupal\crocheteer\Hook\EntityType;

use Drupal\crocheteer\Hook\HookAnnotation;

/**
 * Class HookEntityTypeAnnotation.
 *
 * Base class for all Hook Entity Type Annotation classes.
 */
abstract class HookEntityTypeAnnotation extends HookAnnotation {

  /**
   * Array of relevant Entity Type IDs.
   *
   * @var string[]
   */
  public $entityTypeIds;

}
