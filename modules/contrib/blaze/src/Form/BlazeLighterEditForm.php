<?php

namespace Drupal\blaze\Form;

use Drupal\blaze\PluginManager\Lighters\ConfigurableLighterPluginBase;
use Drupal\blaze\PluginManager\Lighters\LighterPluginManager;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Extension\ModuleHandler;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Drupal\Core\Messenger\MessengerInterface;

/**
 * Provides a Lighter Plugin configuration form.
 */
class BlazeLighterEditForm extends ConfigFormBase {

  /**
   * Constant to store the form ID.
   *
   * @var string
   */
  public const FORM_ID = 'blaze.lighters.edit';

  /**
   * Constant to store a unique config key.
   *
   * Key for the "Light On Cache Clear" configuration.
   *
   * @var string
   */
  public const CONFIG_LIGHT_ON_CACHE_CLEAR = 'light_on_cache_clear';

  /**
   * Constant to store a unique config key.
   *
   * Key for the "Light On Cron" configuration.
   *
   * @var string
   */
  public const CONFIG_LIGHT_ON_CRON = 'light_on_cron';

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandler
   */
  protected $moduleHandler;

  /**
   * The available serialization formats.
   *
   * @var array
   */
  protected $formats;

  /**
   * The Lighter plugin manager.
   *
   * @var \Drupal\blaze\PluginManager\Lighters\LighterPluginManager
   */
  protected $lighterPluginManager;

  /**
   * The messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * The lighter tied to this form.
   *
   * @var \Drupal\blaze\PluginManager\Lighters\ConfigurableLighterPluginBase
   */
  protected $lighter;

  /**
   * Constructs a \Drupal\user\RestForm object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\Core\Extension\ModuleHandler $module_handler
   *   The module handler.
   * @param array $formats
   *   The available serialization formats.
   * @param \Drupal\blaze\PluginManager\Lighters\LighterPluginManager $lighterPluginManager
   *   The Lighter plugin manager.
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger service.
   */
  public function __construct(ConfigFactoryInterface $config_factory, ModuleHandler $module_handler, array $formats, LighterPluginManager $lighterPluginManager, MessengerInterface $messenger) {
    parent::__construct($config_factory);
    $this->moduleHandler = $module_handler;
    $this->formats = $formats;
    $this->lighterPluginManager = $lighterPluginManager;
    $this->messenger = $messenger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    /* @noinspection PhpParamsInspection */
    return new static(
      $container->get('config.factory'),
      $container->get('module_handler'),
      $container->getParameter('serializer.formats'),
      $container->get('plugin.manager.blaze.lighters'),
      $container->get('messenger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return self::FORM_ID;
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() : array {
    return [
      'blaze.lighters.settings',
    ];
  }

  /**
   * {@inheritdoc}
   *
   * @param array $form
   *   The form array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   * @param string $lighter_id
   *   A string that identifies the lighter plugin.
   *
   * @return array
   *   The form structure.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
   * @throws \Drupal\Component\Plugin\Exception\PluginException
   *   When no plugin found.
   */
  public function buildForm(array $form, FormStateInterface $form_state, $lighter_id = NULL): array {
    // First we attempt to get the lighter attuned to this form.
    // We use the provided plugin ID in the route.
    /* @var \Drupal\blaze\PluginManager\Lighters\LighterPluginBase|\Drupal\blaze\PluginManager\Lighters\ConfigurableLighterPluginBase $lighter */
    $lighter = $this->lighterPluginManager->createInstance($lighter_id);
    if ($lighter === NULL) {
      throw new NotFoundHttpException();
    }

    // Set it to our class property so we can use it in other functions.
    $this->lighter = $lighter;

    // If the lighter is configurable, we want to inject the custom form.
    if ($this->lighter instanceof ConfigurableLighterPluginBase) {
      $form = $this->lighter->buildConfigurationForm($form, $form_state);
    }

    // Get the current configuration of the lighter.
    $configuration = $this->lighter->getConfiguration();

    // Set the default lighter configurations that we need.
    $form[self::CONFIG_LIGHT_ON_CACHE_CLEAR] = [
      '#type'          => 'checkbox',
      '#title'         => t('Activate after Cache Clear'),
      '#description'   => t('Activate this lighter whenever the site cache is cleared.'),
      '#default_value' => !empty($configuration[self::CONFIG_LIGHT_ON_CACHE_CLEAR]) ? $configuration[self::CONFIG_LIGHT_ON_CACHE_CLEAR] : 0,
      '#weight'        => -50,
    ];
    $form[self::CONFIG_LIGHT_ON_CRON] = [
      '#type'          => 'checkbox',
      '#title'         => t('Activate on Cron'),
      '#description'   => t('Activate this lighter whenever the site cron is executed.'),
      '#default_value' => !empty($configuration[self::CONFIG_LIGHT_ON_CRON]) ? $configuration[self::CONFIG_LIGHT_ON_CRON] : 0,
      '#weight'        => -50,
    ];

    // Return the form with all necessary fields.
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   *
   * @see \Drupal\rest\Routing\ResourceRoutes::alterRoutes()
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    // If the lighter is configurable, run their custom validations.
    if ($this->lighter instanceof ConfigurableLighterPluginBase) {
      $this->lighter->validateConfigurationForm($form, $form_state);
    }

    // Run the default validation handlers.
    parent::validateForm($form, $form_state);
  }


  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    // If the lighter is configurable, run their custom submission handler.
    if ($this->lighter instanceof ConfigurableLighterPluginBase) {
      $this->lighter->submitConfigurationForm($form, $form_state);
    }

    // Save default configurations.
    $values = $form_state->getValues();
    $this->configFactory->getEditable($this->lighter->getConfigurationKey())
      ->set(self::CONFIG_LIGHT_ON_CACHE_CLEAR, $values[self::CONFIG_LIGHT_ON_CACHE_CLEAR])
      ->set(self::CONFIG_LIGHT_ON_CRON, $values[self::CONFIG_LIGHT_ON_CRON])
      ->save();
    $this->lighter->setConfiguration(array_merge($form_state->getValues(), $this->lighter->getConfiguration()));

    // Run the default submission handlers.
    parent::submitForm($form, $form_state);
  }

}
