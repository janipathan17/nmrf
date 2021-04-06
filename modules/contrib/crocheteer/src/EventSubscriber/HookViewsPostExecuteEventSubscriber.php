<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Views\ViewsPostExecuteEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookViewsPostExecuteEventSubscriber.
 *
 * Hook Event Subscriber class for the Views Post-Execute Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Views\PostExecute\HookViewsPostExecutePluginManager $pluginManager
 */
final class HookViewsPostExecuteEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::VIEWS_POST_EXECUTE => 'onViewsPostExecute',
    ];
  }

  /**
   * On Views Post-Execute Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Views\ViewsPostExecuteEvent $event
   *   The Views Post-Execute Event.
   */
  public function onViewsPostExecute(ViewsPostExecuteEvent $event) : void {
    $this->handleHooks($event);
  }

}
