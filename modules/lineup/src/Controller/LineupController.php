<?php
/**
 * @file
 * Contains \Drupal\lineup\Controller\LineupController.
 */
namespace Drupal\lineup\Controller;

use Drupal\Core\Controller\ControllerBase;

class LineupController extends ControllerBase {
  public function lineup() {

    $nids = \Drupal::entityQuery('node')->condition('type','player')->execute();
    $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);
    $output = '<form>';
    foreach ($nodes as $node){
      $output .= '<input type="checkbox">' . $node->title->value . '<br>';
    }
    $output .= '<input type="submit"></form>';

    return array(
      '#type' => 'markup',
      '#markup' => $this->t($output),
    );
  }
}
