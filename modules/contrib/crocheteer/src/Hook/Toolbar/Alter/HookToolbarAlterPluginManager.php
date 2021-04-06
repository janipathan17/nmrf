<?php

namespace Drupal\crocheteer\Hook\Toolbar\Alter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookToolbarAlter;
use Drupal\crocheteer\Hook\Toolbar\HookToolbarPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookToolbarAlterPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookToolbarAlter
 * @see \Drupal\crocheteer\Hook\Toolbar\Alter\HookToolbarAlterPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Toolbar\ToolbarAlterEvent $event
 */
final class HookToolbarAlterPluginManager extends HookToolbarPluginManager {

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
      HookToolbarAlter::class,
      'crocheteer_toolbar_alter'
    );
  }

}
