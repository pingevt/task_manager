<?php

/**
 * @file
 * Contains \Drupal\task\Entity\TaskType.
 */

namespace Drupal\task\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\task\TaskTypeInterface;

/**
 * Defines the Task type entity.
 *
 * @ConfigEntityType(
 *   id = "task_type",
 *   label = @Translation("Task type"),
 *   handlers = {
 *     "list_builder" = "Drupal\task\TaskTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\task\Form\TaskTypeForm",
 *       "edit" = "Drupal\task\Form\TaskTypeForm",
 *       "delete" = "Drupal\task\Form\TaskTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\task\TaskTypeHtmlRouteProvider",
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
