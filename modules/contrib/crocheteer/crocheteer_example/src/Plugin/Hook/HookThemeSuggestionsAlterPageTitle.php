<?php

namespace Drupal\crocheteer_example\Plugin\Hook;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\crocheteer\Annotation\HookThemeSuggestionsAlter;
use Drupal\crocheteer\Hook\ThemeSuggestions\Alter\HookThemeSuggestionsAlterPlugin;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HookThemeSuggestionsAlterPageTitle.
 *
 * Only implement the ContainerFactoryPluginInterface if you need dependency
 * injection mechanisms.
 *
 * @HookThemeSuggestionsAlter(
 *   id = "crocheteer_example_theme_suggestions_alter_page_title",
 *   title = @Translation("Crocheteer Example Theme Suggestions Alter Page Title"),
 *   themeHooks = {
 *     "page_title",
 *   },
 * )
 */
final class HookThemeSuggestionsAlterPageTitle extends HookThemeSuggestionsAlterPlugin implements ContainerFactoryPluginInterface {

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
   * HookThemeSuggestionsAlterPageTitle constructor.
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
    $this->messenger->addStatus('Hooks Example: Theme Suggestions for ' . $this->event->getHook() . ' Altered!');
  }

}
