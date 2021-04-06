<?php

namespace Drupal\blaze\Form;

use Drupal\blaze\PluginManager\Lighters\LighterPluginManager;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Settings form for the blaze module.
 *
 * This is currently not used, but may be used in the future.
 */
final class BlazeSettingsForm extends ConfigFormBase {

  /**
   * The plugin manager for the lighters.
   *
   * @var \Drupal\blaze\PluginManager\Lighters\LighterPluginManager
   */
  private $lighterPluginManager;

  /**
   * {@inheritdoc}
   */
  public function __construct(ConfigFactoryInterface $config_factory, LighterPluginManager $lighter_plugin_manager) {
    parent::__construct($config_factory);
    // Gonna need this later!
    /* @noinspection UnusedConstructorDependenciesInspection */
    $this->lighterPluginManager = $lighter_plugin_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    /* @noinspection PhpParamsInspection */
    return new static(
      $container->get('config.factory'),
      $container->get('plugin.manager.blaze.lighters')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() : array {
    return ['blaze.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() : string {
    return 'blaze_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) : array {
    $form = parent::buildForm($form, $form_state);
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) : void {
    parent::submitForm($form, $form_state);
  }

}
