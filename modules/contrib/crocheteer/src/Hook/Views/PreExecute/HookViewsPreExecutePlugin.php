<?php

namespace Drupal\crocheteer\Hook\Views\PreExecute;

use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookViewsPreExecutePlugin.
 *
 * Hook Views Pre-Execute Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Views\ViewsPreExecuteEvent $event
 */
abstract class HookViewsPreExecutePlugin extends HookPlugin {}
