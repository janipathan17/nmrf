<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Page\PageBottomEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookPageBottomEventSubscriber.
 *
 * Hook Event Subscriber class for the Page Bottom Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Page\Bottom\HookPageBottomPluginManager $pluginManager
 */
final class HookPageBottomEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::PAGE_BOTTOM => 'onPageBottom',
    ];
  }

  /**
   * On Page Bottom Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Page\PageBottomEvent $event
   *   The Page Bottom Event.
   */
  public function onPageBottom(PageBottomEvent $event) : void {
    $this->handleHooks($event);
  }

}
