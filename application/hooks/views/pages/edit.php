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
    <div class="form-group col-md-4">
        <label for="title">Cidade</label>
        <select class="custom-select" type="text" name="cidade" >
            <label for="user">Usuário</label>
            <option selected>Selecione a sua cidade</option>
            <option value="1">Lagoa Santa - MG</option>
            <option value="2">São Carlos - SP</option>
        </select>      
    </div>       
    
    <input type="submit" name="submit" value="Atualizar viabilidade" class="btn btn-primary" />
    
    </div>
</form>
<br>