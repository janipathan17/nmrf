<?php

namespace Drupal\crocheteer_example\Plugin\Hook;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\crocheteer\Annotation\HookTokenReplacement;
use Drupal\crocheteer\Hook\Token\Replacement\HookTokenReplacementPlugin;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HookTokenReplacementExampleHello.
 *
 * Only implement the ContainerFactoryPluginInterface if you need dependency
 * injection mechanisms.
 *
 * @HookTokenReplacement(
 *   id = "crocheteer_example_token_replacement_example_hello",
 *   title = @Translation("Crocheteer Example Token Replacement Example Hello"),
 * )
 */
final class HookTokenReplacementExampleHello extends HookTokenReplacementPlugin implements ContainerFactoryPluginInterface {

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
   * HookTokenReplacementExampleHello constructor.
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
   *
   * If you have the Pathauto module enabled, you can use this Token in the
   * module's patterns configuration page.
   *
   * @see /admin/config/search/path/patterns
   */
  public function hook() : void {
    if ($this->event->forToken('crocheteer_example', 'hello')) {
      $this->event->setReplacementValue('crocheteer_example', 'hello', 'hello');
      $this->messenger->addStatus('Hooks Example: Token Replacement for Crocheteer Example Hello executed!');
    }
  }

}
