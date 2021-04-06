<?php

namespace Drupal\blaze\PluginManager\Lighters;

use Drupal\blaze\PluginManager\Lighters\Annotation\Lighter;
use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Manager for Lighter plugins.
 */
class LighterPluginManager extends DefaultPluginManager {

  /**
   * Constructs a new HookPluginManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    $this->alterInfo(FALSE);
    parent::__construct('Plugin/blaze/Lighter', $namespaces, $module_handler, LighterInterface::class, Lighter::class);
    $this->setCacheBackend($cache_backend, 'lighter_plugins');
  }

  /**
   * Instantiates all the lighter plugins.
   *
   * @param array|null $plugin_ids
   *   The plugin IDs of the lighters we want to obtain.
   *
   * @return \Drupal\blaze\PluginManager\Lighters\LighterPluginBase[]
   *   The plugin instances.
   */
  public function getLighters($plugin_ids = NULL): array {
    if (!$plugin_ids) {
      $definitions = $this->getDefinitions();
      $plugin_ids = array_map(function ($definition) {
        return empty($definition) ? NULL : $definition['id'];
      }, $definitions);
      $plugin_ids = array_filter(array_values($plugin_ids));
    }
    $lighters = array_map(function ($plugin_id) {
      try {
        return $this->createInstance($plugin_id);
      }
      catch (PluginException $exception) {
        return NULL;
      }
    }, $plugin_ids);
    return array_filter($lighters, function ($lighter) {
      return $lighter instanceof LighterPluginBase;
    });
  }


}
