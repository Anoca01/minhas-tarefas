<?php
namespace MinhasTarefas\Controller;

use MinhasTarefas\Model\Tarefas;
use MinhasTarefas\Service\SqlService;
use MinhasTarefas\Service\EmailService;

class TarefasController{

    private $sql_service;
    private $email_service;
    private $tarefas;

    public function __construct(SqlService $sql, EmailService $email, Tarefas $tarefas)
    {
        $this->sql_service = $sql;
        $this->email_service = $email;
        $this->tarefas = $tarefas;
    }

    public function cadastrarTarefas(array $request)
    {
        $this->tarefas->id_usuario = $request['id_usuario'];
        $this->tarefas->titulo = $request['titulo'];
        $this->tarefas->descricao = $request['descricao'];
        $this->tarefas->create();
        $this->email_service->destinatario("ana@gmail.com");
        $this->email_service->enviarNotificacaodeTarefa('Bem-Vindo');
    }
}