<?php

namespace Drupal\crocheteer\Hook\Page\Top;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookPageTop;
use Drupal\crocheteer\Hook\Page\HookPagePluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookPageTopPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookPageTop
 * @see \Drupal\crocheteer\Hook\Page\Top\HookPageTopPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Page\PageTopEvent $event
 */
final class HookPageTopPluginManager extends HookPagePluginManager {

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
      HookPageTop::class,
      'crocheteer_page_top'
    );
  }

}
