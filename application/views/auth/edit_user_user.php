<br/>
<div class="container col-md-4 col-md-offset-4">
<h2>Página do Usuário</h2>

<?php echo validation_errors(); ?>

<form action="/auth/recPassword/<?php echo $stretch;?>" method="post">

    <div class="form-group">
        <label for="title">Nome</label>
        <input type="text" name="name" class="form-control"  value="<?php echo $user->name;?>"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email"  class="form-control" value="<?php echo $user->email;?>"/>
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password"  class="form-control" placeholder="Sua nova senha aqui..."/>
    </div>
    
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="passwordconf"  class="form-control" placeholder="Repita à senha "/>
    </div>
    
    <input type="submit" name="submit" value="Atualizar Usuário" class="btn btn-primary" />

</form>
</div>
<br>