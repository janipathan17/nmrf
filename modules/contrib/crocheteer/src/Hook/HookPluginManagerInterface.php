<?php

namespace Drupal\crocheteer\Hook;

use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Interface HookPluginManagerInterface.
 *
 * Interface for all Hook Plugin Manager classes.
 */
interface HookPluginManagerInterface {

  /**
   * Sets up the Hook Plugin Manager.
   *
   * An Event object containing all Hook parameters must be provided.
   *
   * @param \Drupal\hook_event_dispatcher\Event\EventInterface $event
   *   The Event object containing all Hook parameters.
   */
  public function setup(EventInterface $event) : void;

  /**
   * Execute all Hook Plugins relevant to this Hook Plugin Manager.
   */
  public function executeHooks() : void;

}
