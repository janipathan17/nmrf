<?php

namespace Drupal\crocheteer\Hook\Entity\Update;

use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookEntityUpdatePlugin.
 *
 * Hook Entity Update Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Entity\EntityUpdateEvent $event
 */
abstract class HookEntityUpdatePlugin extends HookPlugin {}
