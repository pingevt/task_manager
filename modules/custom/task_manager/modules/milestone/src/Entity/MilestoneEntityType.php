<?php

/**
 * @file
 * Contains \Drupal\milestone\Entity\MilestoneEntityType.
 */

namespace Drupal\milestone\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\milestone\MilestoneEntityTypeInterface;

/**
 * Defines the Milestone type entity.
 *
 * @ConfigEntityType(
 *   id = "milestone_type",
 *   label = @Translation("Milestone type"),
 *   handlers = {
 *     "list_builder" = "Drupal\milestone\MilestoneEntityTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\milestone\Form\MilestoneEntityTypeForm",
 *       "edit" = "Drupal\milestone\Form\MilestoneEntityTypeForm",
 *       "delete" = "Drupal\milestone\Form\MilestoneEntityTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\milestone\MilestoneEntityTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "milestone_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "milestone",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/milestone_type/{milestone_type}",
 *     "add-form" = "/admin/structure/milestone_type/add",
 *     "edit-form" = "/admin/structure/milestone_type/{milestone_type}/edit",
 *     "delete-form" = "/admin/structure/milestone_type/{milestone_type}/delete",
 *     "collection" = "/admin/structure/milestone_type"
 *   }
 * )
 */
class MilestoneEntityType extends ConfigEntityBundleBase implements MilestoneEntityTypeInterface {
  /**
   * The Milestone type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Milestone type label.
   *
   * @var string
   */
  protected $label;

}
