<?php

namespace Drupal\crocheteer\Hook\Views\PostExecute;

use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookViewsPostExecutePlugin.
 *
 * Hook Views Post Execute Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Views\ViewsPostExecuteEvent $event
 */
abstract class HookViewsPostExecutePlugin extends HookPlugin {}
