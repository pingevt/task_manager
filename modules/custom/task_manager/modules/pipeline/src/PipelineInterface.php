<?php

/**
 * @file
 * Contains \Drupal\pipeline\PipelineInterface.
 */

namespace Drupal\pipeline;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Pipeline entities.
 *
 * @ingroup pipeline
 */
interface PipelineInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.
  /**
   * Gets the Pipeline type.
   *
   * @return string
   *   The Pipeline type.
   */
  public function getType();

  /**
   * Gets the Pipeline name.
   *
   * @return string
   *   Name of the Pipeline.
   */
  public function getName();

  /**
   * Sets the Pipeline name.
   *
   * @param string $name
   *   The Pipeline name.
   *
   * @return \Drupal\pipeline\PipelineInterface
   *   The called Pipeline entity.
   */
  public function setName($name);

  /**
   * Gets the Pipeline creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Pipeline.
   */
  public function getCreatedTime();

  /**
   * Sets the Pipeline creation timestamp.
   *
   * @param int $timestamp
   *   The Pipeline creation timestamp.
   *
   * @return \Drupal\pipeline\PipelineInterface
   *   The called Pipeline entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Pipeline published status indicator.
   *
   * Unpublished Pipeline are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Pipeline is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Pipeline.
   *
   * @param bool $published
   *   TRUE to set this Pipeline to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\pipeline\PipelineInterface
   *   The called Pipeline entity.
   */
  public function setPublished($published);

}
