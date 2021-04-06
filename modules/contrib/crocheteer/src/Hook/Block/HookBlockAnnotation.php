<?php

namespace Drupal\crocheteer\Hook\Block;

use Drupal\crocheteer\Hook\HookAnnotation;

/**
 * Class HookBlockAnnotation.
 *
 * Base class for all Hook Block Annotation classes.
 */
abstract class HookBlockAnnotation extends HookAnnotation {

  /**
   * Array of relevant Block Base IDs.
   *
   * @var string[]
   */
  public $baseIds;

}
