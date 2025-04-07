<?php

namespace App\adms\Helpers; 

class SlugController {
  /**
   * Converte a controller enviada na URL para o formato da classe
   *
   * @return string
   */

  public static function slugController(string $slugController): string {
    // COnverter para minusculo
    $slugController = strtolower($slugController);

    // Converter o traço para espaço em branco
    $slugController = str_replace("-", " ", $slugController);

    // Converter a primeira letra de cada palavra para maiúsculo
    $slugController = ucwords($slugController);

    // Retirar espaço em branco
    $slugController = str_replace(" ", "", $slugController);

    // Retornar a controller convertido
    return $slugController;
  }
}