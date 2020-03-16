<?php
/**
 * @file
 * Contains
 */
namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;

class FirstController extends ControllerBase{
  public function content() {
    return array(
      '#type'=>'markup',
      '#markup'=>t('Este es el enlace de menu para la pagina personalizada'),
      console.log("este es un mensaje"),
    );
  }
}
