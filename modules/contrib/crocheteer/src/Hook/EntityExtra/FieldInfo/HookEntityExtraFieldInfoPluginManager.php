<?php

namespace Drupal\crocheteer\Hook\EntityExtra\FieldInfo;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookEntityExtraFieldInfo;
use Drupal\crocheteer\Hook\EntityExtra\HookEntityExtraPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookEntityExtraFieldInfoPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookEntityExtraFieldInfo
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EntityExtra\EntityExtraFieldInfoEvent $event
 */
final class HookEntityExtraFieldInfoPluginManager extends HookEntityExtraPluginManager {

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
      HookEntityExtraFieldInfo::class,
      'crocheteer_entity_extra_field_info'
    );
  }

}
