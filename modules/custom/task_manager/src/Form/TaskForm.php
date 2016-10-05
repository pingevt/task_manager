<?php

/**
 * @file
 * Contains \Drupal\task_manager\Form\TaskForm.
 */

namespace Drupal\task_manager\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Task edit forms.
 *
 * @ingroup task_manager
 */
class TaskForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\task_manager\Entity\Task */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Task.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Task.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.task.canonical', ['task' => $entity->id()]);
  }

}
