<?php

namespace Drupal\crocheteer\Hook\Cron;

use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookCronPlugin.
 *
 * Hook Cron Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Cron\CronEvent $event
 */
abstract class HookCronPlugin extends HookPlugin {}
