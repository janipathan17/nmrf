<?php

namespace Drupal\crocheteer\Hook\Token\Replacement;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookTokenReplacement;
use Drupal\crocheteer\Hook\Token\HookTokenPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookTokenReplacementPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookTokenReplacement
 * @see \Drupal\crocheteer\Hook\Token\Replacement\HookTokenReplacementPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Token\TokensReplacementEvent $event
 */
final class HookTokenReplacementPluginManager extends HookTokenPluginManager {

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
      HookTokenReplacement::class,
      'crocheteer_token_replacement'
    );
  }

}
