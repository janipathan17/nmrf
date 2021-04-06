<?php

namespace Drupal\crocheteer\Hook\EntityType\BaseFieldInfo;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookEntityBaseFieldInfo;
use Drupal\crocheteer\Hook\EntityType\HookEntityTypePluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookEntityBaseFieldInfoPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookEntityBaseFieldInfo
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EntityType\EntityBaseFieldInfoEvent $event
 */
final class HookEntityBaseFieldInfoPluginManager extends HookEntityTypePluginManager {

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
      HookEntityBaseFieldInfo::class,
      'crocheteer_entity_base_field_info'
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [
      'entityTypeIds' => $this->event->getEntityType()->id(),
    ];
  }

}
