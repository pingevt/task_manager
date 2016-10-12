<?php

/**
 * @file
 * Contains \Drupal\milestone\MilestoneEntityInterface.
 */

namespace Drupal\milestone;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Milestone entities.
 *
 * @ingroup milestone
 */
interface MilestoneEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.
  /**
   * Gets the Milestone type.
   *
   * @return string
   *   The Milestone type.
   */
  public function getType();

  /**
   * Gets the Milestone name.
   *
   * @return string
   *   Name of the Milestone.
   */
  public function getName();

  /**
   * Sets the Milestone name.
   *
   * @param string $name
   *   The Milestone name.
   *
   * @return \Drupal\milestone\MilestoneEntityInterface
   *   The called Milestone entity.
   */
  public function setName($name);

  /**
   * Gets the Milestone creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Milestone.
   */
  public function getCreatedTime();

  /**
   * Sets the Milestone creation timestamp.
   *
   * @param int $timestamp
   *   The Milestone creation timestamp.
   *
   * @return \Drupal\milestone\MilestoneEntityInterface
   *   The called Milestone entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Milestone published status indicator.
   *
   * Unpublished Milestone are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Milestone is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Milestone.
   *
   * @param bool $published
   *   TRUE to set this Milestone to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\milestone\MilestoneEntityInterface
   *   The called Milestone entity.
   */
  public function setPublished($published);

}
