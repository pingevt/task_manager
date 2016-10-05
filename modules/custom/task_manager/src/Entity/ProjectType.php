<?php

/**
 * @file
 * Contains \Drupal\task_manager\Entity\ProjectType.
 */

namespace Drupal\task_manager\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\task_manager\ProjectTypeInterface;

/**
 * Defines the Project type entity.
 *
 * @ConfigEntityType(
 *   id = "project_type",
 *   label = @Translation("Project type"),
 *   handlers = {
 *     "list_builder" = "Drupal\task_manager\ProjectTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\task_manager\Form\ProjectTypeForm",
 *       "edit" = "Drupal\task_manager\Form\ProjectTypeForm",
 *       "delete" = "Drupal\task_manager\Form\ProjectTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\task_manager\ProjectTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "project_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "project",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/project_type/{project_type}",
 *     "add-form" = "/admin/structure/project_type/add",
 *     "edit-form" = "/admin/structure/project_type/{project_type}/edit",
 *     "delete-form" = "/admin/structure/project_type/{project_type}/delete",
 *     "collection" = "/admin/structure/project_type"
 *   }
 * )
 */
class ProjectType extends ConfigEntityBundleBase implements ProjectTypeInterface {
  /**
   * The Project type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Project type label.
   *
   * @var string
   */
  protected $label;

}
