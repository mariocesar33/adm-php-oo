<?php

namespace App\adms\Controllers\users;

use App\adms\Models\Repository\UsersRepository;

class ListUsers {
  public function index() {
    echo "Listar usuários<br>";

    $listUsers = new UsersRepository();
    $listUsers->getAllUsers();
  }
}