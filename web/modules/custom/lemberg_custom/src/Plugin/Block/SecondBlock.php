<?php

namespace Drupal\lemberg_custom\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a first block.
 *
 * @Block(
 *   id = "lemberg_custom_second_block",
 *   admin_label = @Translation("Second block"),
 *   category = @Translation("Custom"),
 * )
 */
class SecondBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $build['content'] = [
      '#markup' => $this->t('It works!'),
    ];
    return $build;
  }

}
