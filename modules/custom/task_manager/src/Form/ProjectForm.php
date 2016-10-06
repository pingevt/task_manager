<?php

/**
 * @file
 * Contains \Drupal\task_manager\Form\ProjectForm.
 */

namespace Drupal\task_manager\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Project edit forms.
 *
 * @ingroup task_manager
 */
class ProjectForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\task_manager\Entity\Project */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    // Node author information for administrators.
    $form['author'] = array(
      '#type' => 'details',
      '#title' => t('Authoring information'),
      '#group' => 'advanced',
      '#attributes' => array(
        'class' => array('node-form-author'),
      ),
      '#attached' => array(
        'library' => array('node/drupal.node'),
      ),
      '#weight' => 90,
      '#optional' => TRUE,
    );

    if (isset($form['user_id'])) {
      $form['user_id']['#group'] = 'author';
    }

    if (isset($form['created'])) {
      $form['created']['#group'] = 'author';
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;

    // Set new Revision.
    $entity->setNewRevision();

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Project.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Project.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.project.canonical', ['project' => $entity->id()]);
  }

}
