<?php

namespace Drupal\crocheteer_example\Plugin\Hook;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\crocheteer\Annotation\HookUserLogout;
use Drupal\crocheteer\Hook\User\Logout\HookUserLogoutPlugin;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HookUserLogoutAuthenticatedUser.
 *
 * Only implement the ContainerFactoryPluginInterface if you need dependency
 * injection mechanisms.
 *
 * @HookUserLogout(
 *   id = "crocheteer_example_user_logout_authenticated_user",
 *   title = @Translation("Crocheteer Example User Logout Authenticated User"),
 *   roles = {
 *     "authenticated",
 *   },
 * )
 */
final class HookUserLogoutAuthenticatedUser extends HookUserLogoutPlugin implements ContainerFactoryPluginInterface {

  /**
   * The injected Drupal Logger Channel dependency.
   *
   * @var \Drupal\Core\Logger\LoggerChannelInterface
   */
  private $loggerChannel;

  /**
   * {@inheritdoc}
   *
   * Only add this static create method to your Plugin if you need dependency
   * injection mechanisms.
   */
  public static function create(ContainerInterface $container, array $configuration, $pluginId, $pluginDefinition) : HookPluginInterface {
    return new static(
      $configuration,
      $pluginId,
      $pluginDefinition,
      $container->get('logger.factory')
    );
  }

  /**
   * HookUserLogoutAuthenticatedUser constructor.
   *
   * Only add this constructor method to your Plugin if you need dependency
   * injection mechanisms.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $pluginId
   *   The plugin_id for the plugin instance.
   * @param mixed $pluginDefinition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $loggerChannelFactory
   *   The Drupal Logger Channel Factory.
   */
  public function __construct(array $configuration, $pluginId, $pluginDefinition, LoggerChannelFactoryInterface $loggerChannelFactory) {
    parent::__construct($configuration, $pluginId, $pluginDefinition);
    $this->loggerChannel = $loggerChannelFactory->get($this->pluginDefinition['id']);
  }

  /**
   * {@inheritdoc}
   */
  public function hook() : void {
    $this->loggerChannel->info('Hooks Example: Authenticated User ID ' . $this->event->getAccount()->id() . ' Logged Out!');
  }

}
