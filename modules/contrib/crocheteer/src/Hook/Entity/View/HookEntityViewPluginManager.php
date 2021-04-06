<?php

namespace Drupal\crocheteer\Hook\Entity\View;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookEntityView;
use Drupal\crocheteer\Hook\Entity\HookEntityPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookEntityViewPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookEntityView
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 */
final class HookEntityViewPluginManager extends HookEntityPluginManager {

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
      HookEntityView::class,
      'crocheteer_entity_view'
    );
  }

}
