<?php

/**
 * @file
 * Contains project.page.inc.
 *
 * Page callback for Project entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Project templates.
 *
 * Default template: project.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_project(array &$variables) {
  // Fetch Project Entity Object.
  $variables['elements']['#project']->getTasks();
  $project = $variables['elements']['#project'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }

  // Build Tasks lists.
  $task_list = array();
  $task_vb = \Drupal::getContainer()->get('entity_type.manager')->getViewBuilder('task');
  foreach ($project->getTasks() as $task) {
    $task_list[] = $task_vb->view($task, 'list');
  }

  $variables['content']['task_list'] = $task_list;
kint($variables);
}

/**
* Prepares variables for a custom entity type creation list templates.
*
* Default template: project-content-add-list.html.twig.
*
* @param array $variables
*   An associative array containing:
*   - content: An array of project-types.
*
* @see block_content_add_page()
*/
function template_preprocess_project_content_add_list(&$variables) {
  $variables['types'] = array();
  $query = \Drupal::request()->query->all();
  foreach ($variables['content'] as $type) {
    $variables['types'][$type->id()] = array(
      'link' => Link::fromTextAndUrl($type->label(), new Url('entity.project.add_form', array(
        'project_type' => $type->id()
      ), array('query' => $query))),
      'description' => array(
      '#markup' => $type->label(),
      ),
      'title' => $type->label(),
      'localized_options' => array(
      'query' => $query,
      ),
    );
  }
}
