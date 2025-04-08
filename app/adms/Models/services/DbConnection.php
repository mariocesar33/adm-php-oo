<?php

namespace App\adms\Models\services;

use App\adms\Helpers\GenerateLog;
use PDO;
use PDOException;

/**
 * Conexão com o banco de dados
 *
 * @author Mário César <mcgato33@hotmail.com>
 */
abstract class DbConnection {
  
  /** @var object $connect Recebe a conexão com o banco de dados */
  private object $connect;

  /**
   * Realiza a conexão com o banco de dados.
   * Não realizando o conexão corretamente, para o processamento da página e apresenta a mensagem de erro, com o e-mail de contato do administrador
   * @return object retorna a conexão com o banco de dados
   */
  public function getConnection(): object {
    try {
      $dbname = "adms";
      // Conexao com a porta
      $this->connect = new PDO("mysql:host=localhost;port=3306;dbname=" . $dbname, "root", "");

      // Conexao sem a porta
      $this->connect = new PDO("mysql:host=localhost;dbname=" . $dbname, "root", "");
      
      echo "Conexão com banco de dados realizado com sucesso!<br>";
      return $this->connect;
    } catch (PDOException $err) {
      // Chamar o método para salvar o log
      GenerateLog::generateLog("alert", "Conexão com banco de dados não realizado.", ['error' => $err->getMessage()]);
            
      die("Erro 001: Por favor tente novamente. Caso o problema persista, entre em contato o administrador mcgato33@hotmail.com");
    }
  }

}