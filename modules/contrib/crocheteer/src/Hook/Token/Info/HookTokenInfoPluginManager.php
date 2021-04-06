<?php

namespace Drupal\crocheteer\Hook\Token\Info;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookTokenInfo;
use Drupal\crocheteer\Hook\Token\HookTokenPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookTokenInfoPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookTokenInfo
 * @see \Drupal\crocheteer\Hook\Token\Info\HookTokenInfoPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Token\TokensInfoEvent $event
 */
final class HookTokenInfoPluginManager extends HookTokenPluginManager {

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
      HookTokenInfo::class,
      'crocheteer_token_info'
    );
  }

}
