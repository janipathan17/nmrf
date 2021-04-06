<?php

namespace Drupal\crocheteer\Hook\Entity\PreDelete;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookEntityPreDelete;
use Drupal\crocheteer\Hook\Entity\HookEntityPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookEntityPreDeletePluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookEntityPreDelete
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 */
final class HookEntityPreDeletePluginManager extends HookEntityPluginManager {

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
      HookEntityPreDelete::class,
      'crocheteer_entity_pre_delete'
    );
  }

}
