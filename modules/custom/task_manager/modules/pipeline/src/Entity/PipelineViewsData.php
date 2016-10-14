<?php

/**
 * @file
 * Contains \Drupal\pipeline\Entity\Pipeline.
 */

namespace Drupal\pipeline\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Pipeline entities.
 */
class PipelineViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['pipeline']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Pipeline'),
      'help' => $this->t('The Pipeline ID.'),
    );

    return $data;
  }

}
