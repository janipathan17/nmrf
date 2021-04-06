<?php

namespace Drupal\crocheteer\Hook;

use Drupal\Component\Annotation\Plugin;

/**
 * Class HookAnnotation.
 *
 * Base class for all Hook Annotation classes.
 */
abstract class HookAnnotation extends Plugin {

  /**
   * The Hook Plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The Hook Plugin title.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $title;

}
