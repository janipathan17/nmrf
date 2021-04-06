<?php

namespace Drupal\blaze\PluginManager\Lighters;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Plugin\PluginBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Base class for Lighter plugins.
 *
 * @see \Drupal\blaze\PluginManager\Lighters\Annotation\Lighter
 * @see \Drupal\blaze\PluginManager\Lighters\LighterPluginManager
 * @see \Drupal\blaze\PluginManager\Lighters\LighterInterface
 *
 * @see plugin_api
 */
abstract class LighterPluginBase extends PluginBase implements ContainerFactoryPluginInterface, LighterInterface {

  /**
   * Constant for the id property of a Lighter definition.
   *
   * @var string
   */
  public const ID = 'id';

  /**
   * Constant for the label property of a Lighter definition.
   *
   * @var string
   */
  public const LABEL = 'label';

  /**
   * Constant for the description property of a Lighter definition.
   *
   * @var string
   */
  public const DESCRIPTION = 'description';

  /* @noinspection SenselessProxyMethodInspection */
  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    /* @noinspection PhpParamsInspection */
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getId(): string {
    return $this->pluginDefinition[self::ID];
  }

  /**
   * {@inheritdoc}
   */
  public function getLabel(): string {
    return $this->pluginDefinition[self::LABEL];
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription(): string {
    return $this->pluginDefinition[self::DESCRIPTION];
  }

}
