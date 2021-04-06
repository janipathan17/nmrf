<?php

namespace Drupal\crocheteer\Hook\User\Login;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookUserLogin;
use Drupal\crocheteer\Hook\User\HookUserPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookUserLoginPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookUserLogin
 * @see \Drupal\crocheteer\Hook\User\Login\HookUserLoginPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\User\UserLoginEvent $event
 */
final class HookUserLoginPluginManager extends HookUserPluginManager {

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
      HookUserLogin::class,
      'crocheteer_user_login'
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
