<?php

namespace Drupal\crocheteer_example\Plugin\Hook;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\crocheteer\Annotation\HookViewsPostExecute;
use Drupal\crocheteer\Hook\Views\PostExecute\HookViewsPostExecutePlugin;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HookViewsPostExecuteContentPage.
 *
 * Only implement the ContainerFactoryPluginInterface if you need dependency
 * injection mechanisms.
 *
 * @HookViewsPostExecute(
 *   id = "crocheteer_example_views_post_execute_content_page",
 *   title = @Translation("Crocheteer Example Views Post-Execute Content Page"),
 *   viewsIds = {
 *     "content",
 *   },
 *   displays = {
 *     "page_1",
 *   },
 * )
 */
final class HookViewsPostExecuteContentPage extends HookViewsPostExecutePlugin implements ContainerFactoryPluginInterface {

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
   * HookViewsPostExecuteContentPage constructor.
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
    $this->messenger->addStatus('Hooks Example: View ' . $this->event->getView()->getTitle() . ' Post-Executed!');
  }

}
