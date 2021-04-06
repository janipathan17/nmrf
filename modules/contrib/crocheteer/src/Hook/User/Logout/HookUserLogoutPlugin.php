<?php

namespace Drupal\crocheteer\Hook\User\Logout;

use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookUserLogoutPlugin.
 *
 * Hook User Logout Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\User\UserLogoutEvent $event
 */
abstract class HookUserLogoutPlugin extends HookPlugin {}
