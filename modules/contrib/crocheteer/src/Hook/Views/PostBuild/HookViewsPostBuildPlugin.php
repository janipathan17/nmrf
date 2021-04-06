<?php

namespace Drupal\crocheteer\Hook\Views\PostBuild;

use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookViewsPostBuildPlugin.
 *
 * Hook Views Post-Build Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Views\ViewsPostBuildEvent $event
 */
abstract class HookViewsPostBuildPlugin extends HookPlugin {}
