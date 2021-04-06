<?php

namespace Drupal\crocheteer\Hook\WidgetForm\Alter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\crocheteer\Annotation\HookWidgetFormAlter;
use Drupal\crocheteer\Hook\WidgetForm\HookWidgetFormPluginManager;
use Drupal\crocheteer\Hook\HookPluginInterface;
use Traversable;

/**
 * Class HookWidgetFormAlterPluginManager.
 *
 * @see \Drupal\crocheteer\Annotation\HookWidgetFormAlter
 * @see \Drupal\crocheteer\Hook\HookPluginInterface
 * @see plugin_api
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Form\WidgetFormAlterEvent $event
 */
final class HookWidgetFormAlterPluginManager extends HookWidgetFormPluginManager {

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
      HookWidgetFormAlter::class,
      'crocheteer_widget_form_alter'
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getRelevancyProperties() : array {
    /* @var \Drupal\Core\Field\FieldItemList $items */
    $items = $this->event->getContext()['items'];
    return [
      'widgetIds' => $items->getName(),
    ];
  }

}
