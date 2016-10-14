<?php

/**
 * @file
 * Contains \Drupal\pipeline\Entity\PipelineType.
 */

namespace Drupal\pipeline\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\pipeline\PipelineTypeInterface;

/**
 * Defines the Pipeline type entity.
 *
 * @ConfigEntityType(
 *   id = "pipeline_type",
 *   label = @Translation("Pipeline type"),
 *   handlers = {
 *     "list_builder" = "Drupal\pipeline\PipelineTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\pipeline\Form\PipelineTypeForm",
 *       "edit" = "Drupal\pipeline\Form\PipelineTypeForm",
 *       "delete" = "Drupal\pipeline\Form\PipelineTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\pipeline\PipelineTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "pipeline_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "pipeline",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/pipeline_type/{pipeline_type}",
 *     "add-form" = "/admin/structure/pipeline_type/add",
 *     "edit-form" = "/admin/structure/pipeline_type/{pipeline_type}/edit",
 *     "delete-form" = "/admin/structure/pipeline_type/{pipeline_type}/delete",
 *     "collection" = "/admin/structure/pipeline_type"
 *   }
 * )
 */
class PipelineType extends ConfigEntityBundleBase implements PipelineTypeInterface {
  /**
   * The Pipeline type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Pipeline type label.
   *
   * @var string
   */
  protected $label;

}
