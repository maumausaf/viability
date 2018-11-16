<br/>
<h2>Editando Viabilidade</h2>

<?php echo validation_errors(); ?>

<form action="/pages/<?php echo $page->id; ?>/edit" method="post">

    <div class="row">
        
    <div class="form-group col-md-6 ">
        <label for="title">Nome</label>
        <input type="text" name="title" class="form-control" placeholder="Seu título aqui..." value="<?php echo $page->title;?>"/>
    </div>
    <div class="form-group col-md-3 ">
        <label for="title">Telefone</label>
        <input type="text" name="telefone"  class="form-control" placeholder="Seu telefone aqui..." value="<?php echo $page->telefone;?>"/>
    </div>
    <div class="form-group col-md-3 ">
        <label for="email">Email</label>
        <input type="text" name="email"  class="form-control" placeholder="Seu email aqui..." value="<?php echo $page->email;?>"/>
    </div>  
    <div class="form-group col-md-8">
        <label for="text">Endereço</label>
        <input type="text" name="body" class="form-control" placeholder="Sua rua, numero e bairro aqui..." value="<?php echo $page->body;?>"></textarea>
    </div>    
        
    <div class="form-group col-md-4 ">
        <label for="cidade">Cidade</label>
        <select class="custom-select" type="text" name="cidade">
            <label for="cidade">Cidade</label>
            <option value="" selected>Selecione a Cidade</option>
            <?php foreach ($cidades as $cidade): ?>
            <option value="<?php echo $cidade->nome ; ?>"><?php echo $cidade->nome ; ?></option>
            <?php endforeach;?>
        </select>  
    </div>     
        
    <div class="form-group col-md-12">
        <label for="text">Informações adicionais</label>
        <input type="text" name="informacoes" class="form-control" placeholder="Exemplo: Referência do endereço." value="<?php echo $page->informacoes ; ?>">
    </div>       
        
   
    <input type="submit" name="submit" value="Atualizar viabilidade" class="btn btn-primary" />
    
        
    </div>
</form>
<br>