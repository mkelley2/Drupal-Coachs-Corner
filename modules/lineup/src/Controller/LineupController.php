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
    $output = '';
    foreach ($nodes as $node){
      print "<pre>";
      print_r($node->title->value);
      print "</pre>";
    }


    return array(
      '#type' => 'markup',
      '#markup' => $this->t('<input type="checkbox">'),
    );
  }
}
