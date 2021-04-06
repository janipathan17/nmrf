<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Views\ViewsDataAlterEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookViewsDataAlterEventSubscriber.
 *
 * Hook Event Subscriber class for the Views Data Alter Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Views\DataAlter\HookViewsDataAlterPluginManager $pluginManager
 */
final class HookViewsDataAlterEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::VIEWS_DATA_ALTER => 'onViewsDataAlter',
    ];
  }

  /**
   * On Views Data Alter Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Views\ViewsDataAlterEvent $event
   *   The Views Data Alter Event.
   */
  public function onViewsDataAlter(ViewsDataAlterEvent $event) : void {
    $this->handleHooks($event);
  }

}
