<?php

namespace Drupal\crocheteer\Hook\User;

use Drupal\crocheteer\Hook\HookAnnotation;

/**
 * Class HookUserAnnotation.
 *
 * Base class for all Hook User Annotation classes.
 */
abstract class HookUserAnnotation extends HookAnnotation {

  /**
   * Array of relevant User Roles.
   *
   * @var string[]
   */
  public $roles;

}
