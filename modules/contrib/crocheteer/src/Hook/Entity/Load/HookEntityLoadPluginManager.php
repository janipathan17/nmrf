<?php

namespace Drupal\crocheteer\Hook\Entity\Load;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookEntityLoad;
use Drupal\crocheteer\Hook\Entity\HookEntityPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookEntityLoadPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookEntityLoad
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Entity\EntityLoadEvent $event
 */
final class HookEntityLoadPluginManager extends HookEntityPluginManager {

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
      HookEntityLoad::class,
      'crocheteer_entity_load'
    );
  }

  /**
   * Override method since the Entity Load Event contains an array of entities.
   *
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

  /**
   * Override method since the Entity Load Event contains an array of entities.
   *
   * Does a first hard check on the loaded Entity Type ID. Then returns true as
   * soon as one of the loaded Entities fits the relevancy requirements.
   *
   * {@inheritdoc}
   */
  protected function isRelevantDefinition(array $definition, array $properties) : bool {
    if (in_array($this->event->getEntityTypeId(), $definition['entityTypeIds'], TRUE) === FALSE) {
      return FALSE;
    }
    /* @var \Drupal\Core\Entity\EntityInterface $entity */
    foreach ($this->event->getEntities() as $entity) {
      $isRelevant = parent::isRelevantDefinition($definition, [
        'bundles' => $entity->bundle(),
      ]);
      if ($isRelevant === TRUE) {
        return TRUE;
      }
    }
    return FALSE;
  }

}
