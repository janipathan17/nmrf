<?php

namespace Drupal\crocheteer\Hook\EntityExtra\FieldInfoAlter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookEntityExtraFieldInfoAlter;
use Drupal\crocheteer\Hook\EntityExtra\HookEntityExtraPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookEntityExtraFieldInfoAlterPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookEntityExtraFieldInfoAlter
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EntityExtra\EntityExtraFieldInfoAlterEvent $event
 */
final class HookEntityExtraFieldInfoAlterPluginManager extends HookEntityExtraPluginManager {

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
      HookEntityExtraFieldInfoAlter::class,
      'crocheteer_entity_extra_field_info_alter'
    );
  }

}
