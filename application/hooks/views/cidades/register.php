<br/>
<div class="container col-md-4 col-md-offset-4">

<h2>Cadastro de Cidades</h2>

<?php echo validation_errors(); ?>

<form action="/cidades/insere" method="post">

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name"  class="form-control" placeholder="Nome da Cidade"/>
    </div>
    
    <div class="form-group">
        <label for="estado">Estado</label>
        <select class="custom-select" type="text" name="estado">
            <label for="estado">Estado</label>
            <option selected>Selecione o estado</option>
            <?php foreach ($estados as $estado): ?>
            <option value="<?php echo $estado->codigo ; ?>"><?php echo $estado->descricao ; ?></option>
            <?php endforeach;?>
        </select>      
    </div>    
    

    <input type="submit" name="submit" value="Cadastrar" class="btn btn-primary" />

</form>

</div>
<br>