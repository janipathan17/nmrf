<?php

namespace Drupal\crocheteer\Hook\Entity\Delete;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookEntityDelete;
use Drupal\crocheteer\Hook\Entity\HookEntityPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookEntityDeletePluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookEntityDelete
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 */
final class HookEntityDeletePluginManager extends HookEntityPluginManager {

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
      HookEntityDelete::class,
      'crocheteer_entity_delete'
    );
  }

}
