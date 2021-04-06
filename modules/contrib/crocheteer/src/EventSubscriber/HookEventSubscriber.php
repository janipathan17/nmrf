<?php

namespace Drupal\crocheteer\EventSubscriber;

use Drupal\hook_event_dispatcher\Event\EventInterface;
use Drupal\crocheteer\Hook\HookPluginManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class HookEventSubscriber.
 *
 * Base class for all Hook Event Subscriber classes.
 */
abstract class HookEventSubscriber implements EventSubscriberInterface {

  /**
   * The Hook Entity Presave Plugin Manager.
   *
   * @var \Drupal\crocheteer\Hook\HookPluginManagerInterface
   */
  protected $pluginManager;

  /**
   * HookEventSubscriber constructor.
   *
   * @param \Drupal\crocheteer\Hook\HookPluginManagerInterface $pluginManager
   *   The Hook Plugin Manager.
   */
  public function __construct(HookPluginManagerInterface $pluginManager) {
    $this->pluginManager = $pluginManager;
  }

  /**
   * Handles all Hooks relevant to the current Event and context.
   *
   * @param \Drupal\hook_event_dispatcher\Event\EventInterface $event
   *   The Event object.
   */
  protected function handleHooks(EventInterface $event) : void {
    $this->pluginManager->setup($event);
    $this->pluginManager->executeHooks();
  }

}
