<?php

use App\adms\Controllers\Services\PageController;

// Carregar o Composer
require './vendor/autoload.php';

// Instanciar a dependência de variáveis de ambiente.
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

// Instanciar a classe PageController, responsável em tratar a URL
$url = new PageController();

// Chamar o método loadPage() para carregar a página/controller
$url->loadPage();