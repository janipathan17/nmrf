<?php

namespace Drupal\crocheteer\Hook\Entity\Insert;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookEntityInsert;
use Drupal\crocheteer\Hook\Entity\HookEntityPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookEntityInsertPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookEntityInsert
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 */
final class HookEntityInsertPluginManager extends HookEntityPluginManager {

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
      HookEntityInsert::class,
      'crocheteer_entity_insert'
    );
  }

}
