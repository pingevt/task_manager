<?php

/**
 * @file
 * Contains \Drupal\milestone\MilestoneEntityAccessControlHandler.
 */

namespace Drupal\milestone;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Milestone entity.
 *
 * @see \Drupal\milestone\Entity\MilestoneEntity.
 */
class MilestoneEntityAccessControlHandler extends EntityAccessControlHandler {
  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\milestone\MilestoneEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished milestone entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published milestone entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit milestone entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete milestone entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add milestone entities');
  }

}
