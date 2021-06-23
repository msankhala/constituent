<?php

/**
 * @file
 * Contains constituent.page.inc.
 *
 * Page callback for Constituent entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Constituent templates.
 *
 * Default template: constituent.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_constituent(array &$variables) {
  // Fetch ConstituentEntity Entity Object.
  $constituent = $variables['elements']['#constituent'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
