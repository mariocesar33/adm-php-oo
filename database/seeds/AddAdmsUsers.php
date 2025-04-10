<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class AddAdmsUsers extends AbstractSeed {
    /**
     * https://book.cakephp.org/phinx/0/en/seeding.html
     * 
     * Cadastra os usuários no banco de dados
     */
    public function run(): void {
        // Variável para receber os dados.
        $data = [];

        // Verificar se já existe o usuário no banco de dados.
        $existingRecord = $this-> query(
            'SELECT * FROM adms_users WHERE email=:email', 
            ['email' => 'mcgato33@hotmail.com']
        )->fetch();

        // Se o registro não existir, insira os dados na variável $data.
        // em seguida cadastrar na tabela
        if(!$existingRecord) {
            // Criar o array com os dados do usuários.
            $data[] = [
                'name' => 'Mário César Silva',
                'username' => 'mariocesar',
                'email' => 'mcgato33@hotmail.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }
        
        // Verificar se já existe o usuário no banco de dados.
        $existingRecord = $this-> query(
            'SELECT * FROM adms_users WHERE email=:email', 
            ['email' => 'wayne@cv.com']
        )->fetch();

        // Se o registro não existir, insira os dados na variável $data.
        // em seguida cadastrar na tabela
        if(!$existingRecord) {
            // Criar o array com os dados do usuários.
            $data[] = [
                'name' => 'Marcos Wayne',
                'username' => 'marcoswayne',
                'email' => 'wayne@cv.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        // Verificar se já existe o usuário no banco de dados.
        $existingRecord = $this-> query(
            'SELECT * FROM adms_users WHERE email=:email', 
            ['email' => 'pablo@cv.com']
        )->fetch();

        // Se o registro não existir, insira os dados na variável $data.
        // em seguida cadastrar na tabela
        if(!$existingRecord) {
            // Criar o array com os dados do usuários.
            $data[] = [
                'name' => 'Marco Pablo',
                'username' => 'marcopablo',
                'email' => 'pablo@cv.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        // Indicar em qual tabela deve salvar
        $adms_users = $this->table('adms_users');

        // Inserir os registros na tabela
        $adms_users->insert($data)->saveData();
    }
}
