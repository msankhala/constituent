<?php

namespace Drupal\constituent\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Constituent entity.
 *
 * @ingroup constituent
 *
 * @ContentEntityType(
 *   id = "constituent",
 *   label = @Translation("Constituent"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\constituent\ListBuilder\ConstituentEntityListBuilder",
 *     "views_data" = "Drupal\constituent\Entity\ConstituentEntityViewsData",
 *     "translation" = "Drupal\constituent\Translation\ConstituentEntityTranslationHandler",
 *
 *     "form" = {
 *       "default" = "Drupal\constituent\Form\ConstituentEntityForm",
 *       "add" = "Drupal\constituent\Form\ConstituentEntityForm",
 *       "edit" = "Drupal\constituent\Form\ConstituentEntityForm",
 *       "delete" = "Drupal\constituent\Form\ConstituentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\constituent\Routing\ConstituentEntityHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\constituent\Access\ConstituentEntityAccessControlHandler",
 *   },
 *   base_table = "constituent",
 *   data_table = "constituent_field_data",
 *   translatable = TRUE,
 *   admin_permission = "administer constituent entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/constituents/constituent/{constituent}",
 *     "add-form" = "/admin/constituents/constituent/add",
 *     "edit-form" = "/admin/constituents/constituent/{constituent}/edit",
 *     "delete-form" = "/admin/constituents/constituent/{constituent}/delete",
 *     "collection" = "/admin/constituents/constituent",
 *   },
 *   field_ui_base_route = "constituent.settings"
 * )
 */
class ConstituentEntity extends ContentEntityBase implements ConstituentEntityInterface {

  use EntityChangedTrait;

  // /**
  //  * {@inheritdoc}
  //  */
  // public function getName() {
  //   return $this->get('name')->value;
  // }

  // /**
  //  * {@inheritdoc}
  //  */
  // public function setName($name) {
  //   $this->set('name', $name);
  //   return $this;
  // }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entityType) {
    $fields = parent::baseFieldDefinitions($entityType);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Constituent entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
