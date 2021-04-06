<?php

namespace Drupal\crocheteer\Hook\User;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookUserPluginManager.
 *
 * Base Plugin Manager class for all Hook User Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EventInterface $event
 */
abstract class HookUserPluginManager extends HookPluginManager {}
