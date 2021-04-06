<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Page\PageTopEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookPageTopEventSubscriber.
 *
 * Hook Event Subscriber class for the Page Top Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Page\Top\HookPageTopPluginManager $pluginManager
 */
final class HookPageTopEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::PAGE_TOP => 'onPageTop',
    ];
  }

  /**
   * On Page Top Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Page\PageTopEvent $event
   *   The Page Top Event.
   */
  public function onPageTop(PageTopEvent $event) : void {
    $this->handleHooks($event);
  }

}
