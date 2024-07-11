<?php

use Dotenv\Dotenv;
use MinhasTarefas\Controller\TarefasController;
use MinhasTarefas\Model\Tarefas;
use MinhasTarefas\Service\SqlService;
use MinhasTarefas\Service\EmailService;

require_once "../vendor/autoload.php";

$dotenv = Dotenv::createImmutable("../");
$dotenv->safeLoad();

$metodo = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'];
$rota = explode('/', $path);

if(($path == null || $path == "/login") && $metodo == "GET"){
    include_once "../views/login.php";
    exit;
}

if($path == "/cadastro" && $metodo == "GET"){
    include_once "../views/cadastro.php";
    exit;
}

if($path == "/cadastro" && $metodo == "POST"){
    $sql = new SqlService();
    $emailService = new EmailService();
    $tarefas = new Tarefas($sql->dbConnection());
    $tarefasController = new TarefasController($sql, $emailService, $tarefas);
    $tarefasController->cadastrarTarefas($_POST);
    include_once "../views/login.php";
    exit;
}

echo '<body style="display:flex; justify-itens:center"><h1>Página não encontrada!</h1></body>';
