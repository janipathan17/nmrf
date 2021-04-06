# Crocheteer, a Plugin-based approach to Drupal Hooks

- [Introduction](#introduction)
- [Purpose](#purpose)
- [Structure](#structure)
- [How To Use](#how-to-use)
- [Examples](#examples)
- [Requirements](#requirements)

## Introduction

Welcome to the new Drupal 8 hooks! This new approach might feel a bit intimidating at first, but in time you'll feel its advantages. Promised.

## Purpose

This module is dedicated to implementing the Drupal 8 Event Subscriber system instead of the default hook system. It also provides base Hook Plugins and Annotations for you to extend, so there's even less code to be written to get the job done.

## Structure

We're using on a combination of two methodologies:

* [Annotation-based Plugins](https://www.drupal.org/docs/8/api/plugin-api/annotations-based-plugins) (5min read), covered by the Core's [Plugin API](https://www.drupal.org/docs/8/api/plugin-api) (20min read)
* [Event Dispatchers and Subscribers](https://www.drupal.org/docs/8/creating-custom-modules/event-systems-overview-how-to-subscribe-to-and-dispatch-events) (15min read), covered by the [Hook Event Dispatcher](https://www.drupal.org/project/hook_event_dispatcher) contrib module (1min read)

That's right, we're going to do a lot less hooks implementations in a *.module* file from now on.

## How To Use

This module primarily does two things:

* It registers Event Subscribers that match Events dispatched by the Hook Event Dispatcher contrib module
* It defines Services, Plugin Managers, Plugins and Annotations required for Plugin discovery in other modules

In the end, what you only need to do is the following:

* In your custom module, add a new class in the `src/Plugin/Hook` directory (directory names must match, including capital letters)
* Try to adapt the following convention when naming your new class: `Hook` `Type` `Action` `EntityType` `EntityBundle`, e.g. `HookEntityPresaveNodeArticle`
* Here is some base *dummy* code your new class should contain (a real example will be included in the [Examples](#examples) section):

```php
<?php

namespace Drupal\your_custom_module\Plugin\Hook;

use Drupal\Core\Annotation\Translation;
use Drupal\crocheteer\Annotation\RelevantHookAnnotation;
use Drupal\crocheteer\Hook\Type\Action\RelevantHookPlugin;

/**
 * Class HookTypeActionNodeArticle.
 *
 * @RelevantHookAnnotation(
 *   id = "your_custom_module_type_action_node_article",
 *   title = @Translation("Your Custom Module Type Action Node Article"),
 *   ... (other relevant, contextual properties)
 * )
 */
final class HookTypeActionNodeArticle extends RelevantHookPlugin {

  /**
   * {@inheritdoc}
   */
  public function hook() : void {
    // Do your hook stuff here!
  }

}
```

This piece of code does four things:

* Registers a new class `HookTypeActionNodeArticle`
* Uses the `@RelevantHookAnnotation` statement, and assign values to its public properties
* Extends the `RelevantHookPlugin` class, transforming your class into a Plugin too!
* Implements the `hook()` method, where all your hook manipulations reside

Some things to remember:

* Annotation properties are declared in the corresponding Annotation class, e.g. `\Drupal\crocheteer\Annotation\RelevantHookAnnotation`
* Plugin methods and utility properties are declared in the extended Plugin class, e.g. `\Drupal\crocheteer\Hook\Type\Action\RelevantHookPlugin`
* Try to split your `hook()` method logic into private methods as much as possible, for better code readability and quality
* All Hook properties/parameters can be retrieved via the referenced `$this->event` Event object
* If you need dependency injection mechanisms in your Plugin, you must implement the `ContainerFactoryPluginInterface` interface, which requires the following adjustments to your class:
  * Implement the `public static function create()` method
  * Override the `public function __construct()` method to add new dependencies (parameters)

## Examples

See example submodule [Crocheteer - Example](./crocheteer_example/README.md)

## Requirements

PHP minimal version required: **7.2**
