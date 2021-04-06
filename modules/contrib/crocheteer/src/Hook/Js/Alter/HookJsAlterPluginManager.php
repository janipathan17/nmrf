<?php

namespace Drupal\crocheteer\Hook\Js\Alter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookJsAlter;
use Drupal\crocheteer\Hook\Js\HookJsPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookJsAlterPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookJsAlter
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 */
final class HookJsAlterPluginManager extends HookJsPluginManager {

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
      HookJsAlter::class,
      'crocheteer_js_alter'
    );
  }

}
