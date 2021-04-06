TABLE OF CONTENTS
-----------------

* Introduction
* Requirements
* Installation
* Configuration
* Roadmap
* Maintainers


INTRODUCTION
------------

The **Blaze** module provides working grounds to develop your own Cache Warming solutions for your Drupal website, no matter the scale or proportions!

The module currently comes with a sub-module by the name of **Blaze URLs** that allows you to configure a list of URLs to warm the cache for. This cache warming will take place when you call the module's drush command, or you can configure it to run after every cache clear or cron run!

Making use of the [Plugin API](https://www.drupal.org/docs/8/api/plugin-api), you can declare **Lighters**, which are plugins that can handle custom and more dedicated cache warming tasks. The **Blaze URLs** sub-module is already built in this way and can be used as a proper example of how to make your own **Lighters**.

Go [here](https://www.drupal.org/project/issues/blaze) to submit bug reports and feature suggestions.

REQUIREMENTS
------------
 * A need for speed!

INSTALLATION
------------

Install this module as you would normally install a contributed Drupal
module.

CONFIGURATION
-------------

#### Lighters
Only enabling the **Blaze** module won't accomplish much. This is because all of the functionality is ran through `@Lighter` plugins

A list of all Lighters can be seen if you go to `/admin/config/blaze/lighters`.

Each plugin is in charge of its own cache warming mechanisms. The module comes packaged with the **Blaze: URLs** sub-module that shows the best example of how this works.

For example, you can create your own module called **YOUR_SITE: Blaze Entities**, and write some code that handles cache warming for select entities on your site.

When you declare a **Lighter**, you simply have to add code to the `light()` function. All code in here will be executed when the plugin is invoked for cache warming. Using dependency injection, you can obtain what you need to do your operations.

##### Configurable Lighters
When creating a custom `@Lighter` plugin, you can either extend the `LighterPluginBase` class or the `ConfigurableLighterPluginBase`. If you extend the latter, your class will expect to have additional functions that make you define the configuration form for your plugin, as well as the validation and submission handlers.

Once again, a good example of this can be consulted in the **Blaze: URLs** sub-module!

#### Drush

##### Lighters
One of the main uses of this module is to warm your caches as part of the deployment script of your site.

List all the available lighters with the `drush blaze:light --list` command.

Then warm the caches by selecting the lighters to run:

`drush blaze:light urls`

ROADMAP
-------

 * Adding a **Blaze: Entities** sub-module that handles cache warming of site entities using an efficient process (queues).
 * Upgrading the **Blaze: URLs** sub-module to allow handling of wildcards and replacements in the configuration textarea.

MAINTAINERS
-----------

 * [Kyle Serebour (ksere)](https://www.drupal.org/u/ksere)
