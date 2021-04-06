<?php

namespace Drupal\crocheteer_example\Plugin\Hook;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\crocheteer\Annotation\HookEntityFieldAccess;
use Drupal\crocheteer\Hook\EntityField\Access\HookEntityFieldAccessPlugin;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HookEntityFieldAccessTitle.
 *
 * Only implement the ContainerFactoryPluginInterface if you need dependency
 * injection mechanisms.
 *
 * @HookEntityFieldAccess(
 *   id = "crocheteer_example_entity_field_access_title",
 *   title = @Translation("Crocheteer Example Entity Field Access Title"),
 *   names = {
 *     "title",
 *   },
 * )
 */
final class HookEntityFieldAccessTitle extends HookEntityFieldAccessPlugin implements ContainerFactoryPluginInterface {

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
   * HookEntityFieldAccessTitle constructor.
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
    $this->messenger->addStatus('Hooks Example: Entity Field ' . $this->event->getFieldDefinition()->getName() . ' Accessed!');
  }

}
