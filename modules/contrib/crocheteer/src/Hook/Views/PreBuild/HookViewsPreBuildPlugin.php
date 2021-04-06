<?php

namespace Drupal\crocheteer\Hook\Views\PreBuild;

use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookViewsPreBuildPlugin.
 *
 * Hook Views Pre-Build Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Views\ViewsPreBuildEvent $event
 */
abstract class HookViewsPreBuildPlugin extends HookPlugin {}
