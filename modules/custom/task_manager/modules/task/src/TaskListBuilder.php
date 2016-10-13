<?php

/**
 * @file
 * Contains \Drupal\task\TaskListBuilder.
 */

namespace Drupal\task;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Task entities.
 *
 * @ingroup task
 */
class TaskListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Task ID');
    $header['name'] = $this->t('Name');
    $header['project'] = $this->t('Project');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    kint($entity);
    /* @var $entity \Drupal\task\Entity\Task */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $entity->label(),
      new Url(
        'entity.task.edit_form', array(
          'task' => $entity->id(),
        )
      )
    );

    $row['project'] = '-';
    $project = $entity->project_id->entity;
    if (!is_null($project )) {
      $row['project'] = $this->l(
        $project->label(),
        new Url(
          'entity.task.edit_form', array(
            'task' => $project->id(),
          )
        )
      );
    }

    return $row + parent::buildRow($entity);
  }

}
