<?php

namespace Drupal\crocheteer\Hook\Views\PostExecute;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookViewsPostExecute;
use Drupal\crocheteer\Hook\Views\HookViewsPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookViewsPostExecutePluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookViewsPostExecute
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Views\ViewsPostExecuteEvent $event
 */
final class HookViewsPostExecutePluginManager extends HookViewsPluginManager {

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
      HookViewsPostExecute::class,
      'crocheteer_views_post_execute'
    );
  }

}
