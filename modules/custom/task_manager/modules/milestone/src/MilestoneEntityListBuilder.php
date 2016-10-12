<?php

/**
 * @file
 * Contains \Drupal\milestone\MilestoneEntityListBuilder.
 */

namespace Drupal\milestone;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Milestone entities.
 *
 * @ingroup milestone
 */
class MilestoneEntityListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Milestone ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\milestone\Entity\MilestoneEntity */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $entity->label(),
      new Url(
        'entity.milestone.edit_form', array(
          'milestone' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
