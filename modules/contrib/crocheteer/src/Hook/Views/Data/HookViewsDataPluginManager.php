<?php

namespace Drupal\crocheteer\Hook\Views\Data;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookViewsData;
use Drupal\crocheteer\Hook\Views\HookViewsPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookViewsDataPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookViewsData
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Views\ViewsDataEvent $event
 */
final class HookViewsDataPluginManager extends HookViewsPluginManager {

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
      HookViewsData::class,
      'crocheteer_views_data'
    );
  }

  /**
   * {@inheritdoc}
   *
   * Override the relevancy check, since this specific hook cannot be
   * contextually-restricted.
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

}
