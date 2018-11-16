
<div class="container col-md-4 col-md-offset-4">
        
        <?php echo validation_errors(); ?>
    
        <form class="form-signin" action="/auth/esqueceuSenha" method="post">
            <img src="/img/logo.png" width="300" height="180" alt=""  >
            <h2 class="form-signin-heading">Recuperação de senha</h2>
            <br/>
            <label for="email" class="sr-only">Digite o email</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Digite o Email cadastrado" required autofocus>
            <br>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Enviar</button>
            
        </form>
    <br>
       
</div> <!-- /container --><br><br>
    