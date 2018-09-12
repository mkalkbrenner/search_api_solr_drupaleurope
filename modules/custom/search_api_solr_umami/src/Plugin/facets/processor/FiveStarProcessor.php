<?php

namespace Drupal\search_api_solr_umami\Plugin\facets\processor;

use Drupal\facets\FacetInterface;
use Drupal\facets\Processor\BuildProcessorInterface;
use Drupal\facets\Processor\ProcessorPluginBase;

/**
 * Provides a processor that transforms the results to show the user's name.
 *
 * @FacetsProcessor(
 *   id = "fivestar",
 *   label = @Translation("Fivestar"),
 *   description = @Translation("Display stars."),
 *   stages = {
 *     "build" = 5
 *   }
 * )
 */
class FiveStarProcessor extends ProcessorPluginBase implements BuildProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function build(FacetInterface $facet, array $results) {
    /** @var \Drupal\facets\Result\ResultInterface $result */
    foreach ($results as $result) {
      $value = $result->getRawValue();
      if (is_numeric($value)) {
        $result->setDisplayValue(str_repeat('⭐', (int) $value));
      }
    }

    return $results;
  }

  /**
   * {@inheritdoc}
   */
  public function supportsFacet(FacetInterface $facet) {
    return TRUE;
  }

}
