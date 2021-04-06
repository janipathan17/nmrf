<?php

namespace Drupal\crocheteer\Hook\ThemeSuggestions\Alter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookThemeSuggestionsAlter;
use Drupal\crocheteer\Hook\ThemeSuggestions\HookThemeSuggestionsPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookThemeSuggestionsAlterPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookThemeSuggestionsAlter
 * @see \Drupal\crocheteer\Hook\ThemeSuggestions\Alter\HookThemeSuggestionsAlterPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Theme\ThemeSuggestionsAlterEvent $event
 */
final class HookThemeSuggestionsAlterPluginManager extends HookThemeSuggestionsPluginManager {

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
      HookThemeSuggestionsAlter::class,
      'crocheteer_theme_suggestions_alter'
    );
  }

}
