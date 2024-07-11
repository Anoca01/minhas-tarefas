<?php include_once "../views/layout/header.php"; ?>

<div id="login">
<div class="w-25"> <h1 class="text-center">Cadastrar Tarefas</h1></div>
<form action="/cadastro" method="POST">
    <div class="form-group pb-2">
        <input id="id_usuario" name="id_usuario" placeholder="Digite seu id_usuario">
    </div>
    <div class="form-group pb-2">
        <input name="titulo" placeholder="Digite seu titulo">
    </div>
    <div class="form-group pb-2">
        <input name="descricao" placeholder="Digite sua Descrição">
    </div>
     <div class="form-group pb-2">
        <button type="submmit">Cadastrar</button>
    </div>
     <div class="form-group pb-2">
        <a href="/login">Entrar com uma tarefa existente</a>
    </div>
</form>
</div>
<?php include_once "../views/layout/footer.php"; ?>