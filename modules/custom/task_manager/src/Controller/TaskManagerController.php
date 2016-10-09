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
use Symfony\Component\HttpFoundation\JsonResponse;

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
        'library' => array('core/jquery.ui.droppable', 'core/jquery.ui.sortable', 'task_manager/pipeline'),
      ),
    );

    $ids = $this->taskStorage->getQuery()
      ->condition('status', 1)
      ->condition('project_id', NULL, 'IS NULL')
      ->sort('weight')
      ->execute();
    $tasks =  Task::loadMultiple($ids);

    $ids = $this->projectStorage->getQuery()
      ->condition('status', 1)
      ->execute();

    $projects =  Project::loadMultiple($ids);

    $build['board'] = array(
      '#prefix' => '<div class="board"><div class="pane">',
      '#suffix' => '</div></div>',
      'pipelines' => array(
        //'#prefix' => '<div class="task-list">',
        //'#suffix' => '</div>',
        array(
          '#prefix' => '<div class="pipeline droppable" data-project-id="null"><h2>No Project Assigned</h2>',
          '#suffix' => '</div>',
          'tasks' => array(
            '#prefix' => '<ul class="task-list">',
            '#suffix' => '</ul>',
          ),
        ),
      ),
    );

    foreach ($tasks as $task) {
      $build['board']['pipelines'][0]['tasks'][] = array(
        '#prefix' => '<li class="task draggable" data-task-id="' . $task->id() . '">',
        '#suffix' => '</li>',
        '#markup' => $task->getName(),
      );
    }

    foreach ($projects as $project) {
      $pipeline = array(
        '#prefix' => '<div class="pipeline droppable" data-project-id="' . $project->id() . '"><h2>' . $project->getName() . '</h2>',
        '#suffix' => '</div>',
        'tasks' => array(
          '#prefix' => '<ul class="task-list">',
          '#suffix' => '</ul>',
        ),
      );

      $project_tasks = $project->getTasks(TRUE);

      foreach ($project_tasks as $task) {
        $pipeline['tasks'][] = array(
          '#prefix' => '<li class="task draggable" data-task-id="' . $task->id() . '">',
          '#suffix' => '</li>',
          '#markup' => $task->getName(),
        );
      }

      $build['board']['pipelines'][] = $pipeline;
    }

    return $build;
  }

  public function changeTaskProject($task_id, $project_id) {
    $task =  Task::load($task_id);

    $task->project_id = ($project_id != 0)? $project_id : null;
    $task->save();

    return new JsonResponse(array('OK'));
  }

  public function sortProjectTasks($project_id, $tasks) {
    if ($project_id == 'null') $project_id = null;
    $tasks_array = explode(',', $tasks);
    foreach($tasks_array as $weight => $task_id) {
      $task =  Task::load($task_id);
      $task->project_id = $project_id;
      $task->weight = $weight;
      $task->setNewRevision(TRUE);
      $task->save();
    }

    return new JsonResponse(array('OK'));
  }
}
