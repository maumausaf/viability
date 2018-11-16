<br/>
<div class="container col-md-4 col-md-offset-4">

<h2>Cadastro de usuário</h2>
<hr>
<?php echo validation_errors(); ?>

<form action="/opcoes/register" method="post">

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name"  class="form-control" placeholder="Seu nome aqui..."/>
    </div>
    
    <div class="form-group">
        <label for="user">Usuário</label>
        <select class="custom-select" type="text" name="user">
            <label for="user">Usuário</label>
            <option selected>Selecione o tipo do usuário</option>
            <option value="1">Administrador</option>
            <option value="2">Consutor de Vendas</option>
            <option value="3">Consutor de Viabilidade</option>
        </select>      
    </div>    
    
    <div class="form-group">
        <label for="cidade">Cidade</label>
        <select class="custom-select" type="text" name="cidade">
            <label for="cidade">Cidade</label>
            <option selected>Selecione a cidade</option>
            <?php foreach ($cidades as $cidade): ?>
            <option value="<?php echo $cidade->id ; ?>"><?php echo $cidade->nome ; ?></option>
            <?php endforeach;?>
            <option value="0">Todas as cidades</option>
        </select>      
    </div>     

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email"  class="form-control" placeholder="Seu email aqui..."/>
    </div>
    
    <div class="form-group">
        <label for="email">Confirme seu email</label>
        <input type="email" name="emailconf"  class="form-control" placeholder="Repita o email "/>
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password"  class="form-control" placeholder="Sua senha aqui..."/>
    </div>
    
    <div class="form-group">
        <label for="password">Confirme sua Senha</label>
        <input type="password" name="passwordconf"  class="form-control" placeholder="Repita à senha "/>
    </div>
    <hr>
    <input type="submit" name="submit" value="Cadastrar" class="btn btn-primary" />

</form>

</div>
<br>