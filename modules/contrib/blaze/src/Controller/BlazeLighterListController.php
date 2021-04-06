<?php

namespace Drupal\blaze\Controller;

use Drupal\blaze\PluginManager\Lighters\LighterPluginManager;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Messenger\MessengerInterface;

/**
 * Provides a controller that lists all Lighter plugins.
 */
class BlazeLighterListController implements ContainerInjectionInterface {
  use StringTranslationTrait;

  /**
   * Resource plugin manager.
   *
   * @var \Drupal\rest\Plugin\Type\ResourcePluginManager
   */
  protected $lighterPluginManager;

  /**
   * The URL generator to use.
   *
   * @var \Symfony\Component\Routing\Generator\UrlGeneratorInterface
   */
  protected $urlGenerator;

  /**
   * The messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * Constructs a RestUIController object.
   *
   * @param \Drupal\blaze\PluginManager\Lighters\LighterPluginManager $lighterPluginManager
   *   The Lighter plugin manager.
   * @param \Symfony\Component\Routing\Generator\UrlGeneratorInterface $url_generator
   *   The URL generator.
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger service.
   */
  public function __construct(LighterPluginManager $lighterPluginManager, UrlGeneratorInterface $url_generator, MessengerInterface $messenger) {
    $this->lighterPluginManager = $lighterPluginManager;
    $this->urlGenerator = $url_generator;
    $this->messenger = $messenger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    /* @noinspection PhpParamsInspection */
    return new static(
      $container->get('plugin.manager.blaze.lighters'),
      $container->get('url_generator'),
      $container->get('messenger')
    );
  }

  /**
   * Returns an administrative overview of all lighter plugins.
   *
   * @return array
   *   A HTML-formatted string with the administrative page content.
   */
  public function list(): array {
    // Get all lighters from the manager.
    $lighters = $this->lighterPluginManager->getLighters();

    // Sort the list of lighters by label.
    uasort($lighters, function ($resource_a, $resource_b) {
      return strcmp($resource_a['label'], $resource_b['label']);
    });

    // Heading.
    $list['list_title'] = [
      '#markup' => '<h2>' . $this->t('Lighters') . '</h2>',
    ];
    $list['list_help'] = [
      '#markup' => '<p>' . $this->t('Here you can view all loaded Lighters.<br>Lighters are configurable plugins that can be ran via drush. Their goal is to perform cache warming operations for your website. Each lighter can implement its own custom way to perform cache warming operations.') . '</p>',
    ];
    $list['lighters']['heading']['#markup'] = '<h2>' . $this->t('List') . '</h2>';

    // List of lighters formatted in a table.
    $list['lighters']['#type'] = 'container';
    $list['lighters']['table'] = [
      '#theme' => 'table',
      '#header' => [
        'name' => [
          'data' => $this->t('Lighter Name'),
        ],
        'description' => [
          'data' => $this->t('Description'),
        ],
        'operations' => [
          'data' => $this->t('Operations'),
        ],
      ],
      '#rows' => [],
    ];
    foreach ($lighters as $lighter) {
      $id = $lighter->getId();
      $list['lighters']['table']['#rows'][$id] = [
        'data' => [
          'name' => $lighter->getLabel(),
          'description' => $lighter->getDescription(),
          'operations' => [],
        ],
      ];

      $list['lighters']['table']['#rows'][$id]['data']['operations']['data'] = [
        '#type' => 'operations',
        '#links' => [
          'configure' => [
            'title' => $this->t('Configure'),
            'url' => Url::fromRoute('blaze.lighters.edit', ['lighter_id' => $id]),

          ],
          'permissions' => [
            'title' => $this->t('Permissions'),
            'url' => Url::fromRoute('user.admin_permissions', [], ['fragment' => 'module-blaze']),
          ],
        ],
      ];
    }


    $list['lighters']['table']['#empty'] = $this->t('There are no lighter plugins.');
    $list['#title'] = $this->t('Blaze - Lighters');
    return $list;
  }

}
