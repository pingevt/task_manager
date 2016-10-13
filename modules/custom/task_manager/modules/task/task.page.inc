<?php

/**
 * @file
 * Contains task.page.inc.
 *
 * Page callback for Task entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Task templates.
 *
 * Default template: task.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_task(array &$variables) {
  // Fetch Task Entity Object.
  $task = $variables['elements']['#task'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}

/**
* Prepares variables for a custom entity type creation list templates.
*
* Default template: task-content-add-list.html.twig.
*
* @param array $variables
*   An associative array containing:
*   - content: An array of task-types.
*
* @see block_content_add_page()
*/
function template_preprocess_task_content_add_list(&$variables) {
  $variables['types'] = array();
  $query = \Drupal::request()->query->all();
  foreach ($variables['content'] as $type) {
    $variables['types'][$type->id()] = array(
      'link' => Link::fromTextAndUrl($type->label(), new Url('entity.task.add_form', array(
        'task_type' => $type->id()
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

