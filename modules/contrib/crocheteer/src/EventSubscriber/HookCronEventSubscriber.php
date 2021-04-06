<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\Cron\CronEvent;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class HookCronEventSubscriber.
 *
 * Hook Event Subscriber class for the Cron Event.
 *
 * @property-read \Drupal\crocheteer\Hook\Cron\HookCronPluginManager $pluginManager
 */
final class HookCronEventSubscriber extends HookEventSubscriber {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() : array {
    return [
      HookEventDispatcherInterface::CRON => 'onCron',
    ];
  }

  /**
   * On Cron Event.
   *
   * @param \Drupal\hook_event_dispatcher\Event\Cron\CronEvent $event
   *   The Cron Event.
   */
  public function onCron(CronEvent $event) : void {
    $this->handleHooks($event);
  }

}
