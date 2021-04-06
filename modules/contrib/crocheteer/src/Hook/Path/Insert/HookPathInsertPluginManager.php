<?php

namespace Drupal\crocheteer\Hook\Path\Insert;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookPathInsert;
use Drupal\crocheteer\Hook\Path\HookPathPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookPathInsertPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookPathInsert
 * @see \Drupal\crocheteer\Hook\Path\Insert\HookPathInsertPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Path\PathInsertEvent $event
 */
final class HookPathInsertPluginManager extends HookPathPluginManager {

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
      HookPathInsert::class,
      'crocheteer_path_insert'
    );
  }

}
