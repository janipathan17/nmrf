<?php

namespace Drupal\crocheteer\Hook\User\Login;

use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookUserLoginPlugin.
 *
 * Hook User Login Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\User\UserLoginEvent $event
 */
abstract class HookUserLoginPlugin extends HookPlugin {}
