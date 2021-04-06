<?php

namespace Drupal\crocheteer\Hook\Form;

use Drupal\crocheteer\Hook\HookAnnotation;

/**
 * Class HookFormAnnotation.
 *
 * Base class for all Hook Form Annotation classes.
 */
abstract class HookFormAnnotation extends HookAnnotation {

  /**
   * Array of relevant Form IDs.
   *
   * @var string[]
   */
  public $formIds;

}
