<?php

namespace App\adms\Helpers;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Gerar log
 * 
 * @author Cesar <cesar@celke.com.br>
 *  - DEBUG (100): Informação de depuração.
 *  - INFO (200): Eventos interessantes. Por exemplo: um usuário realizou o login ou logs de SQL.
 *  - NOTICE (250): Eventos normais, mas significantes.
 *  - WARNING (300): Ocorrências excepcionais, mas que não são erros. Por exemplo: Uso de APIs descontinuadas, uso inadequado de uma API. Em geral coisas que não estão erradas mas precisam de atenção.
 *  - ERROR (400): Erros de tempo de execução que não requerem ação imediata, mas que devem ser logados e monitorados.
 *  - CRITICAL (500): Condições criticas. Por exemplo: Um componente da aplicação não está disponível, uma exceção não esperada ocorreu.
 *  - ALERT (550): Uma ação imediata deve ser tomada. Exemplo: O sistema caiu, o banco de dados está indisponível , etc. Deve disparar um alerta para o responsável tomar providencia o mais rápido possível.
 *  - EMERGENCY (600): Emergência: O sistema está inutilizável.
 */
class GenerateLog {
  /**
   * Método estático pode ser chamado diretamente na classe, sem a necessidade de criar uma instância (objeto) da classe.  
   * Salvar log no arquivos de log
   *
   * @return void
   */
  public static function generateLog(string $level, string $message, array|null $content) : void {

    // Criar o logger
    $log = new Logger('name');

    // Obter a data atual no formato "ddmmyyyy"
    $nameFileLog = date('dmY') . ".log";
    
    // Criar o caminho dos logs
    $directory = 'logs';
    $filePath = $directory . '/' . $nameFileLog;

    // Verifica se o diretório 'logs/' existe, senão cria
    if (!is_dir($directory)) {
      mkdir($directory, 0777, true); // cria o diretório com permissão recursiva
    }

    // Agora sim podes abrir/criar o arquivo (isso nem precisa mais já que o StreamHandler faz isso, mas vamos manter por segurança)
    if (!file_exists($filePath)) {
      $fileOpen = fopen($filePath, 'w');
      if ($fileOpen) {
        fclose($fileOpen);
      }
    }

    // Push o handler com nível DEBUG (vai aceitar logs de todos os níveis acima)
    $log->pushHandler(new StreamHandler($filePath, Level::Debug));

    // Chama o método correto dinamicamente (error, info, etc.)
    if (method_exists($log, $level)) {
      $log->$level($message, $content);
    } else {
      // Se o nível for inválido, gravar como error
      $log->error("Nível de log inválido: {$level}", ['mensagem original' => $message, 'dados' => $content]);
    }
  }
}
