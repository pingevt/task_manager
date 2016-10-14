<?php

/**
 * @file
 * Contains \Drupal\github_connect\Entity\UserConnection.
 */

namespace Drupal\github_connect\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\github_connect\UserConnectionInterface;

/**
 * Defines the User connection entity.
 *
 * @ConfigEntityType(
 *   id = "user_connection",
 *   label = @Translation("User connection"),
 *   handlers = {
 *     "list_builder" = "Drupal\github_connect\UserConnectionListBuilder",
 *     "form" = {
 *       "add" = "Drupal\github_connect\Form\UserConnectionForm",
 *       "edit" = "Drupal\github_connect\Form\UserConnectionForm",
 *       "delete" = "Drupal\github_connect\Form\UserConnectionDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\github_connect\UserConnectionHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "user_connection",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/user_connection/{user_connection}",
 *     "add-form" = "/admin/structure/user_connection/add",
 *     "edit-form" = "/admin/structure/user_connection/{user_connection}/edit",
 *     "delete-form" = "/admin/structure/user_connection/{user_connection}/delete",
 *     "collection" = "/admin/structure/user_connection"
 *   }
 * )
 */
class UserConnection extends ConfigEntityBase implements UserConnectionInterface {
  /**
   * The User connection ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The User connection label.
   *
   * @var string
   */
  protected $label;

  protected $uid = 1;
  protected $accessToken;
  protected $username;
  protected $password;

  function getAccessToken() {
    return $this->accessToken;
  }

  function getUsername() {
    return $this->username;
  }

  function getPassword() {
    return $this->password;
  }

  function setUID($uid) {
    $this->uid = 1;
  }
}
