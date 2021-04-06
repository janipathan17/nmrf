<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Views\ViewsPostBuildEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookViewsPostBuildEventSubscriber.
 *
 * Hook Event Subscriber class for the Views Post-Build Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Views\PostBuild\HookViewsPostBuildPluginManager $pluginManager
 */
final class HookViewsPostBuildEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::VIEWS_POST_BUILD => 'onViewsPostBuild',
    ];
  }

  /**
   * On Views Post-Build Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Views\ViewsPostBuildEvent $event
   *   The Views Post-Build Event.
   */
  public function onViewsPostBuild(ViewsPostBuildEvent $event) : void {
    $this->handleHooks($event);
  }

}
