<?php

namespace Drupal\crocheteer\Hook\Path\Update;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookPathUpdate;
use Drupal\crocheteer\Hook\Path\HookPathPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookPathUpdatePluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookPathUpdate
 * @see \Drupal\crocheteer\Hook\Path\Update\HookPathUpdatePluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Path\PathUpdateEvent $event
 */
final class HookPathUpdatePluginManager extends HookPathPluginManager {

  /**
   * {@inheritdoc}
   */
  public function __construct(
    Traversable $namespaces,
    CacheBackendInterface $cacheBackend,
    ModuleHandlerInterface $moduleHandler,
    LoggerChannelFactoryInterface $loggerChannelFactory
  ) {
    parent::__construct(
      $namespaces,
      $cacheBackend,
      $moduleHandler,
      $loggerChannelFactory,
      HookPluginInterface::class,
      HookPathUpdate::class,
      'crocheteer_path_update'
    );
  }

}
