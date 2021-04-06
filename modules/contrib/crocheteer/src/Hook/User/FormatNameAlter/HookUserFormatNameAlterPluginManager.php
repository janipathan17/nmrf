<?php

namespace Drupal\crocheteer\Hook\User\FormatNameAlter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookUserFormatNameAlter;
use Drupal\crocheteer\Hook\User\HookUserPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookUserFormatNameAlterPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookUserFormatNameAlter
 * @see \Drupal\crocheteer\Hook\User\FormatNameAlter\HookUserFormatNameAlterPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\User\UserFormatNameAlterEvent $event
 */
final class HookUserFormatNameAlterPluginManager extends HookUserPluginManager {

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
      HookUserFormatNameAlter::class,
      'crocheteer_user_format_name_alter'
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [
      'roles' => $this->event->getAccount()->getRoles(),
    ];
  }

}
