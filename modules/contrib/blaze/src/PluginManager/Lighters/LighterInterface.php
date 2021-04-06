<?php

namespace Drupal\blaze\PluginManager\Lighters;


/**
 * Provides an interface for Lighter plugins.
 *
 * @package Drupal\blaze\Plugin
 */
interface LighterInterface {

  /**
   * Performs lighter operations.
   */
  public function light();

}
