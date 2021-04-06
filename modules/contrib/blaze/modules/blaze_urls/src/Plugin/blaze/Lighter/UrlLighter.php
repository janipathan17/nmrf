<?php

namespace Drupal\blaze_urls\Plugin\blaze\Lighter;

use Drupal\blaze\PluginManager\Lighters\ConfigurableLighterPluginBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormStateInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a class for a lighter specialized in warming cache per URL.
 *
 * @noinspection AnnotationMissingUseInspection
 *
 * @Lighter(
 *   id = "urls",
 *   label = @Translation("URL Lighter"),
 *   description = @Translation("Executes HTTP requests to perform cache warming for configured URLs.")
 * )
 *
 * @package Drupal\blaze_urls\Plugin\blaze\Lighter
 */
class UrlLighter extends ConfigurableLighterPluginBase {

  /**
   * The HTTP client.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  private $httpClient;

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $configFactory, ClientInterface $http_client) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $configFactory);
    $this->httpClient = $http_client;
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
      $container->get('config.factory'),
      $container->get('http_client')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() : array {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state): void {
    // Not much to do here yet.
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state): array {
    $configuration = $this->getConfiguration();
    $form['urls'] = [
      '#type'          => 'textarea',
      '#title'         => t('URLs'),
      '#description'   => t('Enter one URL per line. Wildcards are currently not supported because the maintainer is pretty damn lazy.'),
      '#default_value' => !empty($configuration['urls']) ? $configuration['urls'] : '',
      '#weight'        => -15,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state): void {
    $values = $form_state->getValues();
    $this->configFactory->getEditable($this->getConfigurationKey())
      ->set('urls', $values['urls'])
      ->save();
  }

  /**
   * {@inheritdoc}
   */
  public function light(): void {
    $configuration = $this->getConfiguration();
    if (empty($configuration['urls'])) {
      return;
    }

    $urls = \array_map('trim', \explode("\n", $configuration['urls']));

    $responses = array_map(function ($url) {
      try {
        $host = \Drupal::request()->getSchemeAndHttpHost();
        $url = $host . $url;
        return $this->httpClient->request('GET', $url);
      }
      catch (ClientException $exception) {
        return $exception->getResponse();
      }
      catch (RequestException $exception) {
        return $exception->getResponse();
      }
    }, $urls);
    $responses = array_filter($responses, function ($res) {
      return $res instanceof ResponseInterface;
    });
    $successful = array_filter($responses, function (ResponseInterface $res) {
      return $res->getStatusCode() < 399;
    });
    printf(t("\nSuccessfully warmed caches for @count configured urls!\n", ['@count' => count($successful)]));
  }

}
