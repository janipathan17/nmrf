<?php

namespace Drupal\crocheteer\Hook\Views\PreBuild;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookViewsPreBuild;
use Drupal\crocheteer\Hook\Views\HookViewsPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookViewsPreBuildPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookViewsPreBuild
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Views\ViewsPreBuildEvent $event
 */
final class HookViewsPreBuildPluginManager extends HookViewsPluginManager {

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
      HookViewsPreBuild::class,
      'crocheteer_views_pre_build'
    );
  }

}
