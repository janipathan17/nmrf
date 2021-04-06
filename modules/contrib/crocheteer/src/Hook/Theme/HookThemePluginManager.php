<?php

namespace Drupal\crocheteer\Hook\Theme;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookTheme;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Drupal\crocheteer\Hook\HookPluginManager;
use Traversable;

/**
 * Class HookThemePluginManager.
 *
 * Base Plugin Manager class for all Hook Theme Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Theme\ThemeEvent $event
 */
final class HookThemePluginManager extends HookPluginManager {

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
      HookTheme::class,
      'crocheteer_theme'
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    return [];
  }

}
