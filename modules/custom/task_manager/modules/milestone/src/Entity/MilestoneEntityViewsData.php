<?php

/**
 * @file
 * Contains \Drupal\milestone\Entity\MilestoneEntity.
 */

namespace Drupal\milestone\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Milestone entities.
 */
class MilestoneEntityViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['milestone']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Milestone'),
      'help' => $this->t('The Milestone ID.'),
    );

    return $data;
  }

}
