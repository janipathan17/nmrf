<?php

namespace Drupal\crocheteer\Hook;

use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\hook_event_dispatcher\Event\EventInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Traversable;

/**
 * Class HookPluginManager.
 *
 * Base class for all Hook Plugin Manager classes.
 */
abstract class HookPluginManager extends DefaultPluginManager implements HookPluginManagerInterface, ContainerInjectionInterface {

  /**
   * Array of relevant Hook Plugin IDs.
   *
   * @var string[]
   */
  private $hookPlugins;

  /**
   * The Drupal Logger Channel.
   *
   * @var \Drupal\Core\Logger\LoggerChannelInterface
   */
  protected $loggerChannel;

  /**
   * The Event object containing all Hook parameters.
   *
   * @var \Drupal\hook_event_dispatcher\Event\EventInterface
   */
  protected $event;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) : HookPluginManagerInterface {
    /* @noinspection PhpParamsInspection */
    return new static(
      $container->get('container.namespaces'),
      $container->get('cache.discovery'),
      $container->get('module_handler'),
      $container->get('logger.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function __construct(
    Traversable $namespaces,
    CacheBackendInterface $cacheBackend,
    ModuleHandlerInterface $moduleHandler,
    LoggerChannelFactoryInterface $loggerChannelFactory,
    ?string $pluginInterface = NULL,
    ?string $pluginDefinitionAnnotationName = NULL,
    $pluginBaseId = 'crocheteer',
    array $additionalAnnotationNamespaces = []
  ) {
    parent::__construct(
      'Plugin/Hook',
      $namespaces,
      $moduleHandler,
      $pluginInterface,
      $pluginDefinitionAnnotationName,
      $additionalAnnotationNamespaces
    );
    $this->alterInfo($pluginBaseId . '_info');
    $this->setCacheBackend($cacheBackend, $pluginBaseId . '_plugins');
    $this->loggerChannel = $loggerChannelFactory->get($pluginBaseId);
  }

  /**
   * {@inheritdoc}
   */
  public function setup(EventInterface $event) : void {
    $this->event = $event;
    $this->definitions = $this->getDefinitions();
    $this->retrieveHookPlugins();
  }

  /**
   * {@inheritdoc}
   */
  public function executeHooks() : void {
    foreach ($this->hookPlugins as $hookPlugin) {
      try {
        /* @var \Drupal\crocheteer\Hook\HookPluginInterface $hook */
        $hook = $this->createInstance($hookPlugin);
        $hook->setup($this->event);
        $hook->hook();
      }
      catch (PluginException $exception) {
        $error = $exception->getMessage() . 'Backtrace:<br><br><pre>' . $exception->getTraceAsString() . '</pre>';
        $this->loggerChannel->error($error);
      }
    }
  }

  /**
   * Determines whether a Plugin definition is relevant or not.
   *
   * This is done by ensuring that specified definition properties match the
   * current "object" being processed by the Hook Plugin Manager.
   *
   * @param array $definition
   *   The Plugin definition to be evaluated.
   * @param array $properties
   *   Keyed array of Plugin definition properties to be evaluated with their
   *   respective provided values.
   *
   * @return bool
   *   Whether the Plugin definition is relevant or not.
   */
  protected function isRelevantDefinition(array $definition, array $properties) : bool {
    $isRelevant = TRUE;
    foreach ($properties as $property => $value) {
      if (!empty($definition[$property])) {
        if (!is_array($value)) {
          $value = [$value];
        }
        $isRelevant = !empty(array_intersect($value, $definition[$property]));
      }
      if ($isRelevant === FALSE) {
        break;
      }
    }
    return $isRelevant;
  }

  /**
   * Retrieves Hook Plugin Definition IDs relevant to the current context.
   */
  private function retrieveHookPlugins() : void {
    $this->hookPlugins = [];
    foreach ($this->definitions as $id => $definition) {
      $properties = $this->getRelevancyProperties();
      $isRelevant = $this->isRelevantDefinition($definition, $properties);
      if ($isRelevant) {
        $this->hookPlugins[] = $id;
      }
    }
  }

  /**
   * Retrieves a keyed array of Plugin definition properties.
   *
   * These properties are to be evaluated against their respective provided
   * values.
   *
   * @return array
   *   Keyed array of Plugin definition properties to be evaluated with their
   *   respective provided values.
   */
  abstract protected function getRelevancyProperties() : array;

}
