<?php

namespace Drupal\crocheteer\Hook\Form\Alter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookFormAlter;
use Drupal\crocheteer\Hook\Form\HookFormPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookFormAlterPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookFormAlter
 * @see \Drupal\crocheteer\Hook\Form\Alter\HookFormAlterPluginInterface
 * @see plugin_api
 */
final class HookFormAlterPluginManager extends HookFormPluginManager {

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
      HookFormAlter::class,
      'crocheteer_form_alter'
    );
  }

}
