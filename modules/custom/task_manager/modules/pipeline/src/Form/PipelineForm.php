<?php

/**
 * @file
 * Contains \Drupal\pipeline\Form\PipelineForm.
 */

namespace Drupal\pipeline\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Pipeline edit forms.
 *
 * @ingroup pipeline
 */
class PipelineForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\pipeline\Entity\Pipeline */
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
        drupal_set_message($this->t('Created the %label Pipeline.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Pipeline.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.pipeline.canonical', ['pipeline' => $entity->id()]);
  }

}
