<br/>
<div class="container col-md-4 col-md-offset-4">
<h2>Função do usuário</h2>

<?php echo validation_errors(); ?>

<form action="/opcoes/<?php echo $user->id; ?>/editUser" method="post">

    <div class="form-group">
        <label for="title">Nome</label>
        <input type="text" name="name" class="form-control"  value="<?php echo $user->name;?>" readonly="readonly"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email"  class="form-control" value="<?php echo $user->email;?>" readonly="readonly"/>
    </div>
    
    <div class="form-group">
        <label for="user">Usuário</label>
        <select class="custom-select" type="text" name="user">
            <label for="user">Usuário</label>
            <option value="" selected>Selecione a função do usuário</option>
            <option value="1">Administrador</option>
            <option value="2">Consutor de Vendas</option>
            <option value="3">Consutor de Viabilidade</option>
        </select>      
    </div>   
    
    <input type="submit" name="submit" value="Atualizar Usuário" class="btn btn-primary" />

</form>
</div>
<br>