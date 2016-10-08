<?php

/**
 * @file
 * Contains Drupal\task_manager\Controller\TaskManagerController.
 */

namespace Drupal\task_manager\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\task_manager\Entity\Project;
use Drupal\task_manager\Entity\Task;

/**
 * Class ProjectAddController.
 *
 * @package Drupal\task_manager\Controller
 */
class TaskManagerController extends ControllerBase {

  protected $taskStorage;
  protected $projectStorage;

  public function __construct() {
    $this->taskStorage = \Drupal::getContainer()->get('entity.manager')->getStorage('task');
    $this->projectStorage = \Drupal::getContainer()->get('entity.manager')->getStorage('project');
  }

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function listByProject() {
    $build = array(
      '#attached' => array(
        'library' => array('jquery.ui.droppable'),
      ),
    );
    $ids = $this->taskStorage->getQuery()
      ->condition('status', 1)
      ->execute();

    $tasks =  Task::loadMultiple($ids);

    $ids = $this->projectStorage->getQuery()
      ->condition('status', 1)
      ->execute();

    $projects =  Project::loadMultiple($ids);
//kint($projects);

    $project_vb = $this->entityTypeManager()->getViewBuilder('project');
    foreach ($projects as $project) {
      $build['projects'][] = $project_vb->view($project, 'droppable_list');
    }





    return $build;
  }
}
