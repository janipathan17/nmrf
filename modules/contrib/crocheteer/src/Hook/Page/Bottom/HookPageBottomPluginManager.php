<?php

namespace Drupal\crocheteer\Hook\Page\Bottom;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookPageBottom;
use Drupal\crocheteer\Hook\Page\HookPagePluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookPageBottomPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookPageBottom
 * @see \Drupal\crocheteer\Hook\Page\Bottom\HookPageBottomPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Page\PageBottomEvent $event
 */
final class HookPageBottomPluginManager extends HookPagePluginManager {

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
      HookPageBottom::class,
      'crocheteer_page_bottom'
    );
  }

}
