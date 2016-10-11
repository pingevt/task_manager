<?php

/**
 * @file
 * Contains \Drupal\task_manager\Entity\TaskType.
 */

namespace Drupal\task_manager\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\task_manager\TaskTypeInterface;

/**
 * Defines the Task type entity.
 *
 * @ConfigEntityType(
 *   id = "task_type",
 *   label = @Translation("Task type"),
 *   handlers = {
 *     "list_builder" = "Drupal\task_manager\TaskTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\task_manager\Form\TaskTypeForm",
 *       "edit" = "Drupal\task_manager\Form\TaskTypeForm",
 *       "delete" = "Drupal\task_manager\Form\TaskTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\task_manager\TaskTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "task_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "task",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/task_type/{task_type}",
 *     "add-form" = "/admin/structure/task_type/add",
 *     "edit-form" = "/admin/structure/task_type/{task_type}/edit",
 *     "delete-form" = "/admin/structure/task_type/{task_type}/delete",
 *     "collection" = "/admin/structure/task_type"
 *   }
 * )
 */
class TaskType extends ConfigEntityBundleBase implements TaskTypeInterface {
  /**
   * The Task type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Task type label.
   *
   * @var string
   */
  protected $label;

}
