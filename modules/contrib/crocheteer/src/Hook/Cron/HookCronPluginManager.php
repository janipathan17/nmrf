<?php

namespace Drupal\crocheteer\Hook\Cron;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookCron;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Drupal\crocheteer\Hook\HookPluginManager;
use Traversable;

/**
 * Class HookCronPluginManager.
 *
 * Base Plugin Manager class for all Hook Cron Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Cron\CronEvent $event
 */
final class HookCronPluginManager extends HookPluginManager {

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
      HookCron::class,
      'crocheteer_cron'
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

}
