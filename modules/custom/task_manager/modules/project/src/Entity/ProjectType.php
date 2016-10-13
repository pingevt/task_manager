<?php

/**
 * @file
 * Contains \Drupal\project\Entity\ProjectType.
 */

namespace Drupal\project\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\project\ProjectTypeInterface;

/**
 * Defines the Project type entity.
 *
 * @ConfigEntityType(
 *   id = "project_type",
 *   label = @Translation("Project type"),
 *   handlers = {
 *     "list_builder" = "Drupal\project\ProjectTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\project\Form\ProjectTypeForm",
 *       "edit" = "Drupal\project\Form\ProjectTypeForm",
 *       "delete" = "Drupal\project\Form\ProjectTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\project\ProjectTypeHtmlRouteProvider",
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
