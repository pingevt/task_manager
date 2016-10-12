<?php

/**
 * @file
 * Contains \Drupal\milestone\Form\MilestoneEntityTypeForm.
 */

namespace Drupal\milestone\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class MilestoneEntityTypeForm.
 *
 * @package Drupal\milestone\Form
 */
class MilestoneEntityTypeForm extends EntityForm {
  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $milestone_type = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $milestone_type->label(),
      '#description' => $this->t("Label for the Milestone type."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $milestone_type->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\milestone\Entity\MilestoneEntityType::load',
      ),
      '#disabled' => !$milestone_type->isNew(),
    );

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $milestone_type = $this->entity;
    $status = $milestone_type->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Milestone type.', [
          '%label' => $milestone_type->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Milestone type.', [
          '%label' => $milestone_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($milestone_type->urlInfo('collection'));
  }

}
