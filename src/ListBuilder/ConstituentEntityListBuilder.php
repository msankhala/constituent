<?php

namespace Drupal\constituent\ListBuilder;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Constituent entities.
 *
 * @ingroup constituent
 */
class ConstituentEntityListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header = [];
    $header['id'] = $this->t('Constituent ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row = [];
    /** @var \Drupal\constituent\Entity\ConstituentEntity $entity */
    $row['id'] = $entity->toLink($entity->id());
    $row['name'] = Link::createFromRoute(
      $entity->get('firstname')->value . ' ' . $entity->get('lastname')->value,
      'entity.constituent.edit_form',
      ['constituent' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
