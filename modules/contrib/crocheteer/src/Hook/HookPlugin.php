<?php

namespace Drupal\crocheteer\Hook;

use Drupal\Component\Plugin\PluginBase;
use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Class HookPlugin.
 *
 * Base class for all Hook Plugin classes.
 */
abstract class HookPlugin extends PluginBase implements HookPluginInterface {

  /**
   * The Event object containing all Hook parameters.
   *
   * @var \Drupal\hook_event_dispatcher\Event\EventInterface
   */
  protected $event;

  /**
   * {@inheritdoc}
   */
  public function setup(EventInterface $event) : void {
    $this->event = $event;
  }

}
