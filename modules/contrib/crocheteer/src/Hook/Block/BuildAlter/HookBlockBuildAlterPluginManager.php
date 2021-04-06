<?php

namespace Drupal\crocheteer\Hook\Block\BuildAlter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookBlockBuildAlter;
use Drupal\crocheteer\Hook\Block\HookBlockPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookBlockBuildAlterPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookBlockBuildAlter
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Block\BlockBuildAlterEvent $event
 */
final class HookBlockBuildAlterPluginManager extends HookBlockPluginManager {

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
      HookBlockBuildAlter::class,
      'crocheteer_block_build_alter'
    );
  }

}
