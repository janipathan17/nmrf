<?php

namespace Drupal\crocheteer\Hook\Entity;

use Drupal\crocheteer\Hook\HookAnnotation;

/**
 * Class HookEntityAnnotation.
 *
 * Base class for all Hook Entity Annotation classes.
 */
abstract class HookEntityAnnotation extends HookAnnotation {

  /**
   * Array of relevant Entity Type IDs.
   *
   * @var string[]
   */
  public $entityTypeIds;

  /**
   * Array of relevant bundles.
   *
   * @var string[]
   */
  public $bundles;

}
