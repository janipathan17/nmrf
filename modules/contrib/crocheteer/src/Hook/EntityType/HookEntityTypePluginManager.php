<?php

namespace Drupal\crocheteer\Hook\EntityType;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookEntityTypePluginManager.
 *
 * Base Plugin Manager class for all Hook EntityType Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EventInterface $event
 */
abstract class HookEntityTypePluginManager extends HookPluginManager {}
