<br/>
<div class="container col-md-6 col-md-offset-6">
<h2>Nova Viabilidade</h2>
<hr>
<?php echo validation_errors(); ?>
<?php if ($this->session->flashdata('success') == TRUE): ?>
<div><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error') == TRUE): ?>
<div><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>

<form action="/pages/insere" method="post" >
    
    <div class="row">
    
    <div class="form-group col-md-12 ">
        <label for="title">Nome</label>
        <input type="text" name="title"  class="form-control" placeholder="Seu nome aqui..." required/>
    </div>
    <div class="form-group col-md-6">
        <label for="title">Telefone</label>
        <input type="text" name="telefone"  class="form-control" placeholder="Seu telefone aqui..." required/>
    </div>
    <div class="form-group col-md-6 ">
        <label for="email">Email</label>
        <input type="text" name="email"  class="form-control" placeholder="Seu email aqui..." required/>
    </div>    
    <div class="form-group col-md-12">
        <label for="text">Endereço</label>
        <input type="text" name="body" class="form-control" placeholder="Sua rua, numero e bairro aqui..." required></textarea>
    </div>
    
    <div class="form-group col-md-12">
        <label for="text">Informações adicionais</label>
        <textarea type="text" name="informacoes" class="form-control" placeholder="Exemplo: Referência do endereço." required></textarea>
    </div>    
        
    <div class="form-group col-md-6 ">
        <label for="cidade">Cidade</label>
        <select class="custom-select" type="text" name="cidade" required>
            <label for="cidade">Cidade</label>
            <option value="" selected>Selecione a Cidade</option>
            <?php foreach ($cidades as $cidade): ?>
            <option value="<?php echo $cidade->id ; ?>"><?php echo $cidade->nome ; ?></option>
            <?php endforeach;?>
        </select>  
    </div> 
        
    </div>
    <div class="buton "> 
            <hr>
        <input type="submit" name="submit" value="Cadastrar viabilidade" class="btn btn-primary" />
        </div>
    

</form>
</div>

<br>