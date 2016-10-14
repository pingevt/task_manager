<?php

/**
 * @file
 * Contains \Drupal\github_connect\Form\UserConnectionForm.
 */

namespace Drupal\github_connect\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class UserConnectionForm.
 *
 * @package Drupal\github_connect\Form
 */
class UserConnectionForm extends EntityForm {
  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $user_connection = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $user_connection->label(),
      '#description' => $this->t("Label for the User connection."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $user_connection->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\github_connect\Entity\UserConnection::load',
      ),
      '#disabled' => !$user_connection->isNew(),
    );

    $form['accessToken'] = array(
      '#type' => 'textfield',
      '#title' => 'Access Token',
      '#default_value' => $user_connection->getAccessToken(),
      '#required' => TRUE,
    );

    $form['username'] = array(
      '#type' => 'textfield',
      '#title' => 'Username',
      '#default_value' => $user_connection->getUsername(),
      '#required' => TRUE,
    );

    $form['password'] = array(
      '#type' => 'textfield',
      '#title' => 'Password',
      '#default_value' => $user_connection->getPassword(),
      '#required' => TRUE,
    );

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $user_connection = $this->entity;
    $user_connection->setUID(1);
    $status = $user_connection->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label User connection.', [
          '%label' => $user_connection->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label User connection.', [
          '%label' => $user_connection->label(),
        ]));
    }
    $form_state->setRedirectUrl($user_connection->urlInfo('collection'));
  }

}
