<?php

namespace Drupal\crocheteer\Hook\Path\Delete;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookPathDelete;
use Drupal\crocheteer\Hook\Path\HookPathPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookPathDeletePluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookPathDelete
 * @see \Drupal\crocheteer\Hook\Path\Delete\HookPathDeletePluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Path\PathDeleteEvent $event
 */
final class HookPathDeletePluginManager extends HookPathPluginManager {

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
      HookPathDelete::class,
      'crocheteer_path_delete'
    );
  }

}
