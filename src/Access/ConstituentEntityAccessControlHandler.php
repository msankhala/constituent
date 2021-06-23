<?php

namespace Drupal\constituent;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Constituent entity.
 *
 * @see \Drupal\constituent\Entity\ConstituentEntity.
 */
class ConstituentEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\constituent\Entity\ConstituentEntityInterface $entity */

    switch ($operation) {

      case 'view':

        // if (!$entity->isPublished()) {
        //   return AccessResult::allowedIfHasPermission($account, 'view unpublished constituent entities');
        // }


        return AccessResult::allowedIfHasPermission($account, 'view constituent entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit constituent entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete constituent entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add constituent entities');
  }


}
