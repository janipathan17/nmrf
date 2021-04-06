<?php

namespace Drupal\crocheteer\Hook;

use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Interface HookPluginInterface.
 *
 * Interface for all Hook Plugin classes.
 */
interface HookPluginInterface {

  /**
   * Sets up the Hook Plugin properties.
   *
   * An Event object containing all Hook parameters must be provided.
   *
   * @param \Drupal\hook_event_dispatcher\Event\EventInterface $event
   *   The Event object containing all Hook parameters.
   */
  public function setup(EventInterface $event) : void;

  /**
   * Execute all Hook Plugin operations.
   *
   * This should call other protected or private methods contained in the class.
   * Ideally you want as little conditional statements as possible here.
   */
  public function hook() : void;

}
