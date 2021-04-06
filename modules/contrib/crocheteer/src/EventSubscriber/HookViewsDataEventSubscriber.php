<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Views\ViewsDataEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookViewsDataEventSubscriber.
 *
 * Hook Event Subscriber class for the Views Data Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Views\Data\HookViewsDataPluginManager $pluginManager
 */
final class HookViewsDataEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::VIEWS_DATA => 'onViewsData',
    ];
  }

  /**
   * On Views Data Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Views\ViewsDataEvent $event
   *   The Views Data Event.
   */
  public function onViewsData(ViewsDataEvent $event) : void {
    $this->handleHooks($event);
  }

}
