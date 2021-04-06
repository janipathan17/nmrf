<?php

namespace Drupal\crocheteer\Hook\EntityField\Access;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookEntityFieldAccess;
use Drupal\crocheteer\Hook\EntityField\HookEntityFieldPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookEntityFieldAccessPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookEntityFieldAccess
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EntityField\EntityFieldAccessEvent $event
 */
final class HookEntityFieldAccessPluginManager extends HookEntityFieldPluginManager {

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
      HookEntityFieldAccess::class,
      'crocheteer_entity_field_access'
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [
      'names' => $this->event->getFieldDefinition()->getName(),
    ];
  }

}
