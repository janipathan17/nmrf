<?php

namespace Drupal\blaze\PluginManager\Lighters;

use Drupal\Component\Plugin\ConfigurableInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Plugin\PluginFormInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Base class for Lighter plugins that implement configuration forms.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @see \Drupal\blaze\PluginManager\Lighters\Annotation\Lighter
 * @see \Drupal\blaze\PluginManager\Lighters\LighterPluginManager
 * @see \Drupal\blaze\PluginManager\Lighters\LighterInterface
 *
 * @see plugin_api
 */
abstract class ConfigurableLighterPluginBase extends LighterPluginBase implements ConfigurableInterface, PluginFormInterface {

  /**
   * Configuration factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $configFactory) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->configFactory = $configFactory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    /* @noinspection PhpParamsInspection */
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  abstract public function defaultConfiguration(): array;

  /**
   * Get the unique configuration key of this plugin instance.
   *
   * @return string
   */
  public function getConfigurationKey(): string {
    return "blaze.lighter.{$this->getId()}";
  }

  /**
   * Get plugin configuration stored in the site config.
   *
   * @return array
   *   Array of stored configuration, or an empty array otherwise.
   */
  public function getStoredConfiguration(): array {
    try {
      return $this->configFactory->get($this->getConfigurationKey())->getRawData();
    }
    catch (\Exception $e) {
      return [];
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getConfiguration(): array {
    return ['id' => $this->getPluginId()] + $this->configuration + $this->getStoredConfiguration() + $this->defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function setConfiguration(array $configuration): void {
    $this->configuration = array_merge($configuration, $this->defaultConfiguration());
  }
}
