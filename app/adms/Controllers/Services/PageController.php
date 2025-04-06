<?php

namespace App\adms\Controllers\Services;

/**
 * @author: Mário César <mcgato33@hotmail.com>
*/
class PageController {
  /** @var string $url Recebe a URL do .htaccess */
  private string $url;

  /**
   * Recebe a URL e manipula
   */
  public function __construct() {
    echo "Carregar página.<br><br>";

    // Verificar se vem valor na variável url enviada pelo .htaccess
    if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
      // Se sim, atribui o valor a variável url
      $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

      echo "Acesar o endereço: " .$this->url . "<br><br>";
    } else {
      echo "Acesar a página principal.<br><br>";
    }
  }    
}