<?php

namespace Drupal\crocheteer\Hook\User\Logout;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookUserLogout;
use Drupal\crocheteer\Hook\User\HookUserPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookUserLogoutPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookUserLogout
 * @see \Drupal\crocheteer\Hook\User\Logout\HookUserLogoutPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\User\UserLogoutEvent $event
 */
final class HookUserLogoutPluginManager extends HookUserPluginManager {

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
      HookUserLogout::class,
      'crocheteer_user_logout'
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
