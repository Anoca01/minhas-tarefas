<?php
namespace MinhasTarefas\Service;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host  = $_ENV['MAILTRAP_HOST'];
        $this->mail->Username  = $_ENV['MAILTRAP_USER'];
        $this->mail->Password  = $_ENV['MAILTRAP_PASSWORD'];
        $this->mail->Port = $_ENV['MAILTRAP_PORT'];
        $this->mail->SMTPSecure = $_ENV['MAILTRAP_SECURE'];
        $this->mail->SMTPAuth  = true;
        $this->mail->SMTPSecure = PHPMailer::CHARSET_UTF8;
        $this->mail->isHTML(true);
    }

    public function remetente($email_remetente)
    {
        $this->mail->setFrom($email_remetente);
    }

    public function destinatario($destinatario)
    {
        $this->mail->addAddress($destinatario);
    }
    public function enviarEmailBoasVindas()
    {
        try {
            $this->mail->Subject = 'Bem-Vindo ao sistema';
            $this->mail->Body = "<h1>olá <\h1>Bem vinco ao sistema";
            $this->mail->AltBody = "Olá, Bem vindo ao nosso sistema, estamos felizes em te receber";
            $this->mail->send();
            echo 'A mensagem de boas vindas foi enviada' . PHP_EOL;
        } catch (Exception $e) {
            echo "A mensagem não pode ser enviada. Error: {$this->mail->Errorinfo}";
        }
    }
    public function enviarEmailRecuperarSenha()
    {
        try {
            $this->mail->Subject = 'Bem-Vindo ao sistema';
            $this->mail->Body = "<h1>olá <\h1>, Bem vinco ao sistema";
            $this->mail->AltBody = "Olá, Bem vindo ao nosso sistema, estamos felizes em te receber";
            $this->mail->send();
            echo 'A mensagem de boas vindas foi enviado' . PHP_EOL;
        } catch (Exception $e) {
            echo "A mensagem não pode ser enviada. Error: {$this->mail->Errorinfo}";
        }
    }

    public function enviarNotificacaodeTarefa()
    {
        try {
            $this->mail->Subject = 'Tarefa';
            $this->mail->Body = "<h1>olá <\h1>, Existe uma nova tarefa";
            $this->mail->AltBody = "Olá, Uma nova tarefa foi mandada para vc ";
            $this->mail->send();
            echo 'A mensagem de tarefas foi enviada' . PHP_EOL;
        } catch (Exception $e) {
            echo "A mensagem não pode ser enviada. Error: {$this->mail->Errorinfo}";
        }
    }
}
