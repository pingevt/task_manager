<?php

/**
 * @file
 * Contains \Drupal\pipeline\Form\PipelineTypeForm.
 */

namespace Drupal\pipeline\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class PipelineTypeForm.
 *
 * @package Drupal\pipeline\Form
 */
class PipelineTypeForm extends EntityForm {
  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $pipeline_type = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $pipeline_type->label(),
      '#description' => $this->t("Label for the Pipeline type."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $pipeline_type->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\pipeline\Entity\PipelineType::load',
      ),
      '#disabled' => !$pipeline_type->isNew(),
    );

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $pipeline_type = $this->entity;
    $status = $pipeline_type->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Pipeline type.', [
          '%label' => $pipeline_type->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Pipeline type.', [
          '%label' => $pipeline_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($pipeline_type->urlInfo('collection'));
  }

}
