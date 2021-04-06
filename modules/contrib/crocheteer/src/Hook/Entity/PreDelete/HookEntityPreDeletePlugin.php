<?php

namespace Drupal\crocheteer\Hook\Entity\PreDelete;

use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookEntityPreDeletePlugin.
 *
 * Hook Entity Pre-Delete Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Entity\EntityPredeleteEvent $event
 */
abstract class HookEntityPreDeletePlugin extends HookPlugin {}
