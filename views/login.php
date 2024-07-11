<?php include_once "../views/layout/header.php"; ?>

<div id="login">
<div class="w-25"> <h1 class="text-center">Login</h1></div>
<form >
    
     <div class="form-group pb-2">
        <input name="login" placeholder="Digite seu login">
    </div>
     <div class="form-group pb-2">
        <input name="password" placeholder="Digite sua senha">
    </div>
     <div class="form-group pb-2">
        <button type="button">Entrar</button>
    </div>
     <div class="form-group pb-2">
        <a href="/cadastro">Criar uma nova conta</a>
    </div>
</form>

</div>
<?php include_once "../views/layout/footer.php"; ?>