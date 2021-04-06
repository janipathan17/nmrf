<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Views\ViewsPreExecuteEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookViewsPreExecuteEventSubscriber.
 *
 * Hook Event Subscriber class for the Views Pre-Execute Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Views\PreExecute\HookViewsPreExecutePluginManager $pluginManager
 */
final class HookViewsPreExecuteEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::VIEWS_PRE_EXECUTE => 'onViewsPreExecute',
    ];
  }

  /**
   * On Views Pre-Execute Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Views\ViewsPreExecuteEvent $event
   *   The Views Pre-Execute Event.
   */
  public function onViewsPreExecute(ViewsPreExecuteEvent $event) : void {
    $this->handleHooks($event);
  }

}
