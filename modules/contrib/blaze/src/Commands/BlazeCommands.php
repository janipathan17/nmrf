<?php

namespace Drupal\blaze\Commands;

use Consolidation\AnnotatedCommand\CommandData;
use Consolidation\AnnotatedCommand\CommandError;
use Consolidation\OutputFormatters\StructuredData\RowsOfFields;
use Drupal\blaze\PluginManager\Lighters\LighterPluginBase;
use Drupal\blaze\PluginManager\Lighters\LighterPluginManager;
use Drush\Commands\DrushCommands;
use Drush\Utils\StringUtils;

/**
 * Drush commands for the Blaze module.
 */
class BlazeCommands extends DrushCommands {

  /**
   * The Lighter plugin manager.
   *
   * @var \Drupal\blaze\PluginManager\Lighters\LighterPluginManager
   */
  private $lighterPluginManager;

  /**
   * LighterCommands constructor.
   *
   * @param \Drupal\blaze\PluginManager\Lighters\LighterPluginManager $lighter_plugin_manager
   *   The lighter manager.
   */
  public function __construct(LighterPluginManager $lighter_plugin_manager) {
    parent::__construct();
    $this->lighterPluginManager = $lighter_plugin_manager;
  }

  /**
   * Defines action undertaken by the 'light' command.
   *
   * Provides a command to "light" any lighters, performing any cache warming
   * operations needed.
   *
   * @param array $lighterIds
   *   List of plugin IDs, separated by commas, of the lighters to light. See
   *   the lighter:list command to find all the available lighters on the site.
   * @param array $options
   *   An associative array of options whose values come from cli, aliases,
   *   config, etc.
   *
   * @option list
   *   If supplied, the command will simply list all declared lighters.
   *
   * @command blaze:light
   * @aliases blazel
   *
   * @validate-lighter lighterIds
   *
   * @throws \Exception
   *
   * @return mixed|NULL
   *  Returns an output if needed, returns void otherwise.
   */
  public function light(array $lighterIds, array $options = ['list' => FALSE]) {
    // If the list option is provided, simply list all defined lighters.
    if ($options['list']) {
      $rows = array_map(function (LighterPluginBase $lighter) {
        $definition = $lighter->getPluginDefinition();
        return [
          'id' => $lighter->getPluginId(),
          'label' => $definition['label'],
          'description' => $definition['description'],
        ];
      }, $this->lighterPluginManager->getLighters());
      return new RowsOfFields($rows);
    }

    // Get a unique array of all provided lighter IDs.
    $lighterIds = array_unique(StringUtils::csvToArray($lighterIds));

    // Get the lighters from the manager.
    $lighters = $this->lighterPluginManager->getLighters($lighterIds);

    // Perform all custom lighting operations defined in each lighter.
    foreach ($lighters as $lighter) {
      $lighter->light();
    }

    return NULL;
  }

  /**
   * Validate that queue permission exists.
   *
   * Annotation value should be the name of the argument/option containing the name.
   *
   * @hook validate @validate-lighter
   *
   * @param \Consolidation\AnnotatedCommand\CommandData $commandData
   *   Data from the command call that we want to validate.
   *
   * @return \Consolidation\AnnotatedCommand\CommandError|NULL
   *   Return a command error if found, NULL otherwise.
   */
  public function validateLighterNames(CommandData $commandData) : ?CommandError {
    $argName = $commandData->annotationData()->get('validate-lighter', null);
    $lighterIds = $commandData->input()->getArgument($argName);
    $lighterIds = StringUtils::csvToArray($lighterIds);
    $definitions = $this->lighterPluginManager->getDefinitions();
    $validLighterIds = array_keys($definitions);
    $missing = array_diff($lighterIds, $validLighterIds);
    if (!empty($missing)) {
      $message = dt('Lighter plugin(s) not found: @names.', ['@names' => implode(', ', $missing)]);
      return new CommandError($message);
    }
    return NULL;
  }

}
