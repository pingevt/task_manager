<?php

/**
 * @file
 * Contains \Drupal\task_manager\ProjectListBuilder.
 */

namespace Drupal\task_manager;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Project entities.
 *
 * @ingroup task_manager
 */
class ProjectListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Project ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\task_manager\Entity\Project */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $entity->label(),
      new Url(
        'entity.project.edit_form', array(
          'project' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
