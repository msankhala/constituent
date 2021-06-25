<?php

namespace Drupal\constituent\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use CommerceGuys\Addressing\AddressFormat\FieldOverride;

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
 *       "settings" = "Drupal\constituent\Form\ConstituentEntitySettingsForm",
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
 *     "label" = "firstname",
 *     "langcode" = "langcode",
 *   },
 *   links = {
 *     "canonical" = "/admin/constituents/constituent/{constituent}",
 *     "add-form" = "/admin/constituents/constituent/add",
 *     "edit-form" = "/admin/constituents/constituent/{constituent}/edit",
 *     "delete-form" = "/admin/constituents/constituent/{constituent}/delete",
 *     "collection" = "/admin/constituents",
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

    $fields['title'] = BaseFieldDefinition::create('list_string')
      ->setLabel(t('Title'))
      ->setDescription(t('The title of the Constituent.'))
      ->setSettings([
        'allowed_values' => [
          'Mr.' => 'Mr.',
          'Ms.' => 'Ms.',
          'Mrs.' => 'Mrs.',
          'Miss' => 'Miss',
          'Dr.' => 'Dr.',
        ],
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'options_select',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(FALSE);

    $fields['firstname'] = BaseFieldDefinition::create('string')
      ->setLabel(t('First Name'))
      ->setDescription(t('The first name of the Constituent.'))
      ->setSettings([
        'max_length' => 150,
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
      ->setRequired(FALSE);

    $fields['middlename'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Middle Name'))
      ->setDescription(t('The middle name of the Constituent.'))
      ->setSettings([
        'max_length' => 150,
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
      ->setRequired(FALSE);

    $fields['lastname'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Last Name'))
      ->setDescription(t('The last name of the Constituent.'))
      ->setSettings([
        'max_length' => 150,
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
      ->setRequired(FALSE);

    $fields['username'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Username'))
      ->setDescription(t('The username of the Constituent.'))
      ->setSettings([
        'max_length' => 150,
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
      ->setRequired(FALSE);

    $fields['gender'] = BaseFieldDefinition::create('list_string')
      ->setLabel(t('Gender'))
      ->setDescription(t('The gender of the Constituent.'))
      ->setSettings([
        'allowed_values' => [
          'Male' => 'Male',
          'Female' => 'Female',
          'I prefer not to say' => 'I prefer not to say',
          'Other' => 'Other',
        ],
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'options_select',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(FALSE);

    $fields['marital_status'] = BaseFieldDefinition::create('list_string')
      ->setLabel(t('Marital Status'))
      ->setDescription(t('The marital status of the Constituent.'))
      ->setSettings([
        'allowed_values' => [
          'Single' => 'Single',
          'Married' => 'Married',
          'Divorced' => 'Divorced',
          'Widowed' => 'Widowed',
        ],
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'options_select',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(FALSE);

    $fields['address'] = BaseFieldDefinition::create('address')
      ->setLabel(t('Address'))
      ->setDescription(t('The Constituent address.'))
      ->setCardinality(1)
      ->setRequired(FALSE)
      ->setSetting('field_overrides', [
        'givenName' => ['override' => FieldOverride::HIDDEN],
        'additionalName' => ['override' => FieldOverride::HIDDEN],
        'familyName' => ['override' => FieldOverride::HIDDEN],
        'organization' => ['override' => FieldOverride::HIDDEN],
      ])
      ->setDisplayOptions('form', [
        'type' => 'address_default',
        'weight' => 4,
      ])
      ->setDisplayConfigurable('view', TRUE)
      ->setDisplayConfigurable('form', TRUE);

    $fields['email'] = BaseFieldDefinition::create('email')
      ->setLabel(t('Email'))
      ->setDescription(t('The Constituent email address.'))
      ->setDefaultValue('')
      // ->addConstraint('ContactEmailUnique')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string_basic',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'email_default',
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
