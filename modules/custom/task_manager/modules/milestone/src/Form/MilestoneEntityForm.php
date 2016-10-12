<?php

/**
 * @file
 * Contains \Drupal\milestone\Form\MilestoneEntityForm.
 */

namespace Drupal\milestone\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Milestone edit forms.
 *
 * @ingroup milestone
 */
class MilestoneEntityForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\milestone\Entity\MilestoneEntity */
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
        drupal_set_message($this->t('Created the %label Milestone.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Milestone.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.milestone.canonical', ['milestone' => $entity->id()]);
  }

}
