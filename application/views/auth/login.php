
<div class="container col-md-4 col-md-offset-4">
        
        <?php echo validation_errors(); ?>
    
        <form class="form-signin" action="/auth/login" method="post">
            <img src="/img/logo.png" width="300" height="180" alt=""  >
            <h2 class="form-signin-heading">Acesso ao sistema</h2>
            <br/>
            <label for="email" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Endereço de Email" required autofocus>
            <br>
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="Lembre-me"> Lembre-me.
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Acessar</button>
            
        </form>
    <br>
        <form action="/auth/esqueceuSenha" method="post">
            <button class="btn " type="submit" name="submit">Esqueceu a senha?</button>
        </form>
</div> <!-- /container --><br><br>
    