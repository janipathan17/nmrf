<?php

namespace Drupal\crocheteer\Hook\EntityField;

use Drupal\crocheteer\Hook\HookPluginManager;

/**
 * Class HookEntityFieldPluginManager.
 *
 * Base Plugin Manager class for all Hook Entity Field Plugin classes.
 *
 * @noinspection LongInheritanceChainInspection
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\EventInterface $event
 */
abstract class HookEntityFieldPluginManager extends HookPluginManager {}
