<?php

namespace Drupal\constituent\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface for defining Constituent entities.
 *
 * @ingroup constituent
 */
interface ConstituentEntityInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Constituent name.
   *
   * @return string
   *   Name of the Constituent.
   */
  public function getName();

  /**
   * Sets the Constituent name.
   *
   * @param string $name
   *   The Constituent name.
   *
   * @return \Drupal\constituent\Entity\ConstituentEntityInterface
   *   The called Constituent entity.
   */
  public function setName($name);

  /**
   * Gets the Constituent creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Constituent.
   */
  public function getCreatedTime();

  /**
   * Sets the Constituent creation timestamp.
   *
   * @param int $timestamp
   *   The Constituent creation timestamp.
   *
   * @return \Drupal\constituent\Entity\ConstituentEntityInterface
   *   The called Constituent entity.
   */
  public function setCreatedTime($timestamp);

}
