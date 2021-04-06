<?php

namespace Drupal\crocheteer\Hook\Entity\Create;

use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookEntityCreatePlugin.
 *
 * Hook Entity Create Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Entity\EntityCreateEvent $event
 */
abstract class HookEntityCreatePlugin extends HookPlugin {}
