<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Views\ViewsPreBuildEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookViewsPreBuildEventSubscriber.
 *
 * Hook Event Subscriber class for the Views Pre-Build Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Views\PreBuild\HookViewsPreBuildPluginManager $pluginManager
 */
final class HookViewsPreBuildEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::VIEWS_PRE_BUILD => 'onViewsPreBuild',
    ];
  }

  /**
   * On Views Pre-Build Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Views\ViewsPreBuildEvent $event
   *   The Views Pre-Build Event.
   */
  public function onViewsPreBuild(ViewsPreBuildEvent $event) : void {
    $this->handleHooks($event);
  }

}
