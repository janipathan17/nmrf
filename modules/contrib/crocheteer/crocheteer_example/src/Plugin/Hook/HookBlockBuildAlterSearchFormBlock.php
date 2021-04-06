<?php

namespace Drupal\crocheteer_example\Plugin\Hook;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\crocheteer\Annotation\HookBlockBuildAlter;
use Drupal\crocheteer\Hook\Block\BuildAlter\HookBlockBuildAlterPlugin;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HookBlockBuildAlterSearchFormBlock.
 *
 * Only implement the ContainerFactoryPluginInterface if you need dependency
 * injection mechanisms.
 *
 * @HookBlockBuildAlter(
 *   id = "crocheteer_example_block_build_alter_search_form_block",
 *   title = @Translation("Crocheteer Example Block Build Alter Search Form Block"),
 *   baseIds = {
 *     "search_form_block",
 *   },
 * )
 */
final class HookBlockBuildAlterSearchFormBlock extends HookBlockBuildAlterPlugin implements ContainerFactoryPluginInterface {

  /**
   * The injected Drupal Messenger dependency.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  private $messenger;

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
      $container->get('messenger')
    );
  }

  /**
   * HookBlockBuildAlterSearchFormBlock constructor.
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
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The Drupal Messenger.
   */
  public function __construct(array $configuration, $pluginId, $pluginDefinition, MessengerInterface $messenger) {
    parent::__construct($configuration, $pluginId, $pluginDefinition);
    $this->messenger = $messenger;
  }

  /**
   * {@inheritdoc}
   */
  public function hook() : void {
    $this->messenger->addStatus('Hooks Example: Search Form Block Build Altered!');
  }

}
