<?php

namespace Drupal\crocheteer\Hook\Views\DataAlter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookViewsDataAlter;
use Drupal\crocheteer\Hook\Views\HookViewsPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookViewsDataAlterPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookViewsDataAlter
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Views\ViewsDataAlterEvent $event
 */
final class HookViewsDataAlterPluginManager extends HookViewsPluginManager {

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
      HookViewsDataAlter::class,
      'crocheteer_views_data_alter'
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
