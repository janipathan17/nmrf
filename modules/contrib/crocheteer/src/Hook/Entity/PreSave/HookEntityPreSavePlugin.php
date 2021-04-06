<?php

namespace Drupal\crocheteer\Hook\Entity\PreSave;

use Drupal\hook_event_dispatcher\Event\EventInterface;
use Drupal\crocheteer\Hook\HookPlugin;

/**
 * Class HookEntityPreSavePlugin.
 *
 * Hook Entity Pre-Save Plugin class.
 *
 * @property-read \Drupal\hook_event_dispatcher\Event\Entity\EntityPreSaveEvent $event
 */
abstract class HookEntityPreSavePlugin extends HookPlugin {

  /**
   * Operations constants.
   */
  protected const OPERATION_CREATE = 'create';
  protected const OPERATION_UPDATE = 'update';

  /**
   * The Pre-Save operation being performed.
   *
   * @var string
   */
  protected $operation;

  /**
   * {@inheritdoc}
   */
  public function setup(EventInterface $event) : void {
    parent::setup($event);
    $this->detectOperation();
  }

  /**
   * Detects the current Hook Entity Pre-Save operation enumerable.
   */
  protected function detectOperation() : void {
    if ($this->event->getOriginalEntity() === NULL) {
      $this->operation = static::OPERATION_CREATE;
      return;
    }
    $this->operation = static::OPERATION_UPDATE;
  }

}
