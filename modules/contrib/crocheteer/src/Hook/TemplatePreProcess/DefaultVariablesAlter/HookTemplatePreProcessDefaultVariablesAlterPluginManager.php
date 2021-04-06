<?php

namespace Drupal\crocheteer\Hook\TemplatePreProcess\DefaultVariablesAlter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookTemplatePreProcessDefaultVariablesAlter;
use Drupal\crocheteer\Hook\TemplatePreProcess\HookTemplatePreProcessPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookTemplatePreProcessDefaultVariablesAlterPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookTemplatePreProcessDefaultVariablesAlter
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Theme\TemplatePreProcessDefaultVariablesAlterEvent $event
 */
final class HookTemplatePreProcessDefaultVariablesAlterPluginManager extends HookTemplatePreProcessPluginManager {

  /**
   * {@inheritdoc}
   */
  public function __construct(
    Traversable $namespaces,
    CacheBackendInterface $cacheBackend,
    ModuleHandlerInterface $moduleHandler,
    LoggerChannelFactoryInterface $loggerChannelFactory
  ) {
    parent::__construct(
      $namespaces,
      $cacheBackend,
      $moduleHandler,
      $loggerChannelFactory,
      HookPluginInterface::class,
      HookTemplatePreProcessDefaultVariablesAlter::class,
      'crocheteer_template_pre_process_default_variables_alter'
    );
  }

}
