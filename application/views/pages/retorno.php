<br/>
<h2>Retorno ao cliente</h2>

<?php echo validation_errors(); ?>

<form action="/pages/<?php echo $page->id; ?>/retorno" method="post">

    <div class="row">
        
    <div class="form-group col-md-6 ">
        <label for="title">Nome</label>
        <input type="text" name="title" class="form-control"  value="<?php echo $page->title;?>" readonly="readonly"/>
    </div>
    <div class="form-group col-md-3 ">
        <label for="title">Telefone</label>
        <input type="text" name="telefone"  class="form-control"  value="<?php echo $page->telefone;?>" readonly="readonly"/>
    </div>
    <div class="form-group col-md-3 ">
        <label for="email">Email</label>
        <input type="text" name="email"  class="form-control"  value="<?php echo $page->email;?>" readonly="readonly"/>
    </div>  
    <div class="form-group col-md-8">
        <label for="text">Endereço</label>
        <input type="text" name="body" class="form-control"  value="<?php echo $page->body;?>" readonly="readonly"></textarea>
    </div>    
        
    <div class="form-group col-md-4">
        <label for="text">Cidade</label>
        <input type="text" name="cidade" class="form-control"  value="<?php echo $page->cidade;?>" readonly="readonly"></textarea>
    </div>        
        
    
    <div class="form-group col-md-12">
        <label for="text">Observações</label>
        <input type="text" name="obs" class="form-control"  value="<?php echo $page->obs ; ?>" readonly="readonly">
    </div>    
        
    <div class="form-group col-md-12">
        <label for="text">Resultado do contato</label>
        <input type="text" name="retorno" class="form-control" placeholder="Infome o resultado do conto com o cliente cliente">
    </div>     
        
    <div class="form-group col-md-4">
        <label for="title">Conclusão do Contato</label>
        <select class="custom-select" type="text" name="status">
            <label for="answer">Condição</label>
            <option value="" selected>Seleciona a conclusão</option>
            <option value="3">Vendida</option>
            <option value="4">Não vendida</option>
        </select>      
    </div>       
    </div>
    <hr>
    
    <input type="submit" name="submit" value="Finalizar contato" class="btn btn-primary" />
    <a href="/pages/pagination1" class="btn btn-danger">Voltar</a>
    
</form>
<br>