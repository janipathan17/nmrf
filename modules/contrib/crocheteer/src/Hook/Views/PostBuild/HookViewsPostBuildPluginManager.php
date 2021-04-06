<?php

namespace Drupal\crocheteer\Hook\Views\PostBuild;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookViewsPostBuild;
use Drupal\crocheteer\Hook\Views\HookViewsPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookViewsPostBuildPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookViewsPostBuild
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Views\ViewsPostBuildEvent $event
 */
final class HookViewsPostBuildPluginManager extends HookViewsPluginManager {

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
      HookViewsPostBuild::class,
      'crocheteer_views_post_build'
    );
  }

}
