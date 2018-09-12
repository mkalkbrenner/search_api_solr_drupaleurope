<?php

namespace Drupal\search_api_solr_umami\Plugin\facets\processor;

use Drupal\facets\FacetInterface;
use Drupal\facets\Processor\BuildProcessorInterface;
use Drupal\facets\Processor\ProcessorPluginBase;

/**
 * Provides a processor that transforms the results to show the user's name.
 *
 * @FacetsProcessor(
 *   id = "votedbymyself",
 *   label = @Translation("Voted by myself"),
 *   description = @Translation("Display text."),
 *   stages = {
 *     "build" = 5
 *   }
 * )
 */
class VotedByMyselfProcessor extends ProcessorPluginBase implements BuildProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function build(FacetInterface $facet, array $results) {
    /** @var \Drupal\facets\Result\ResultInterface $result */
    foreach ($results as $result) {
      $result->setDisplayValue($this->t('limit results'));
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
