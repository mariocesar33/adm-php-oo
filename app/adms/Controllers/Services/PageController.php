<?php

namespace App\adms\Controllers\Services;

use App\adms\Helpers\ClearUrl;
use App\adms\Helpers\SlugController;

/**
 * Recebe a URL e manipula
 * 
 * @author Mário César <mcgato33@hotmail.com>
 */
class PageController {

    /** @var string $url Receber a URL do .htaccess */
    private string $url;

    /** @var array $urlArray Recebe a Url convertida para array */
    private array $urlArray;

    /** @var string $urlController Recebe da URL o nome da controller */
    private string $urlController = "";

    /** @var string $urlParametro Recebe da URL o parâmetro */
    private string $urlParametro = "";
    
    /**
     * Recebe a URL do .htaccess
     */
    public function __construct() {
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

            // Verificar se existe a controller na url
            if(isset($this->urlArray[0])) {
                // Chamar a classe helper para converter a controller enviada na URL para o formato da classe
                $this->urlController = SlugController::slugController($this->urlArray[0]);
                // $this->urlController = $this->urlArray[0];
            } else {
                $this->urlController = SlugController::slugController("login");
            }

            // Verificar se existe o parâmetro na url
            if(isset($this->urlArray[1])) {
                $this->urlParametro = $this->urlArray[1];
            } 

        }else{
            $this->urlController = SlugController::slugController("login");
        }
        var_dump($this->urlController);
        var_dump($this->urlParametro);
    }
}