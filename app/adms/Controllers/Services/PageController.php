<?php

namespace App\adms\Controllers\Services;

use App\adms\Helpers\ClearUrl;

/**
 * Recebe a URL e manipula
 * 
 * @author Mário César <mcgato33@hotmail.com>
 */
class PageController
{
    /** @var string $url Receber a URL do .htaccess */
    private string $url;

    /** @var array $urlArray */
    private array $urlArray;
    
    /**
     * Recebe a URL do .htaccess
     */
    public function __construct()
    {
        echo "Carregar página.<br><br>";

        // Verificar se vem valor na variável url enviada pelo .htaccess
        if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){

            // Receber o valor da variável url enviada pelo .htaccess
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            echo "Acessar o endereço: " . $this->url . "<br><br>";

            // Chamar a classe helper para limpar a URL
            $this->url = ClearUrl::clearUrl($this->url);
            var_dump($this->url);

            // Converter a string da URL em um array
            $this->urlArray = explode('/', $this->url);
            var_dump($this->urlArray);

        }else{
            echo "Acessar a página principal.<br><br>";
        }
    }
}