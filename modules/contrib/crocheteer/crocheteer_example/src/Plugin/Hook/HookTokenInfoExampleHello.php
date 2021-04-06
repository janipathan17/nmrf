<?php

namespace Drupal\crocheteer_example\Plugin\Hook;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\hook_event_dispatcher\Value\Token;
use Drupal\hook_event_dispatcher\Value\TokenType;
use Drupal\crocheteer\Annotation\HookTokenInfo;
use Drupal\crocheteer\Hook\Token\Info\HookTokenInfoPlugin;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HookTokenInfoExampleHello.
 *
 * Only implement the ContainerFactoryPluginInterface if you need dependency
 * injection mechanisms.
 *
 * @HookTokenInfo(
 *   id = "crocheteer_example_token_info_example_hello",
 *   title = @Translation("Crocheteer Example Token Info Example Hello"),
 * )
 */
final class HookTokenInfoExampleHello extends HookTokenInfoPlugin implements ContainerFactoryPluginInterface {

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
   * HookTokenInfoExampleHello constructor.
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
   * If you have the Token module enabled, you can see this Token being
   * registered on the module's help page.
   *
   * @see /admin/help/token
   */
  public function hook() : void {
    $tokenType = TokenType::create('crocheteer_example', t('Crocheteer Example'))->setDescription('Tokens related to the Crocheteer Example module.');
    $this->event->addTokenType($tokenType);
    $token = Token::create('crocheteer_example', 'hello', t('Hello'))->setDescription('Hello string dummy text.');
    $this->event->addToken($token);
    $this->messenger->addStatus('Hooks Example: Token for Crocheteer Example Hello registered!');
  }

}
