<?php

/**
 * @file
 * Contains \Drupal\pipeline\PipelineAccessControlHandler.
 */

namespace Drupal\pipeline;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Pipeline entity.
 *
 * @see \Drupal\pipeline\Entity\Pipeline.
 */
class PipelineAccessControlHandler extends EntityAccessControlHandler {
  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\pipeline\PipelineInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished pipeline entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published pipeline entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit pipeline entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete pipeline entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add pipeline entities');
  }

}
