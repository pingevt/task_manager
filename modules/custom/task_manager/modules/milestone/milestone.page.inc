<?php

/**
 * @file
 * Contains milestone.page.inc.
 *
 * Page callback for Milestone entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Milestone templates.
 *
 * Default template: milestone.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_milestone(array &$variables) {
  // Fetch MilestoneEntity Entity Object.
  $milestone = $variables['elements']['#milestone'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}

/**
* Prepares variables for a custom entity type creation list templates.
*
* Default template: milestone-content-add-list.html.twig.
*
* @param array $variables
*   An associative array containing:
*   - content: An array of milestone-types.
*
* @see block_content_add_page()
*/
function template_preprocess_milestone_content_add_list(&$variables) {
  $variables['types'] = array();
  $query = \Drupal::request()->query->all();
  foreach ($variables['content'] as $type) {
    $variables['types'][$type->id()] = array(
      'link' => Link::fromTextAndUrl($type->label(), new Url('entity.milestone.add_form', array(
        'milestone_type' => $type->id()
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
