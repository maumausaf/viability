<br/>
<h2>Respondendo Viabilidade</h2>
<hr>
<?php echo validation_errors(); ?>

<form action="/pages/<?php echo $page->id; ?>/answer" method="post">
    <div class="row">
    
    <div class="form-group col-md-8">
        <label for="text">Endereço</label>
        <input name="body" class="form-control" placeholder="Rua, nº e Bairro "value="<?php echo $page->body;?>">
    </div>
        
    <div class="form-group col-md-4">
        <label for="text">Cidade</label>
        <input name="cidade" class="form-control" value="<?php echo $page->cidade;?>" readonly="readonly">
    </div> 
        
    <div class="form-group col-md-12">
        <label for="text">Informações adicionais</label>
        <input type="text" name="informacoes" class="form-control" value="<?php echo $page->informacoes;?>" readonly="readonly" >
    </div>      
    
    <div class="form-group col-md-12">
        <label for="text">Observações</label>
        <textarea name="obs" class="form-control" placeholder="Preencha as observações"><?php echo $page->obs;?></textarea>
    </div>   
        
    <div class="form-group col-md-4">
        <label for="title">Condição</label>
        <select class="custom-select" type="text" name="status">
            <label for="answer">Condição</label>
            <option value="" selected>Condição da viabilidade</option>
            <option value="1">Aprovada</option>
            <option value="2">Negada</option>
            <option value="0">Manter Pendente</option>
        </select>      
    </div>   
        
        
    </div>
    <hr>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Responder
    </button>
    
    <br>
    <br>

    <!-- Modal Answer-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <p>Deseja responder está viabilidade?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
            <button type="submit" name="submit" value="Atualizar viabilidade" class="btn btn-primary">Sim, Responder!</button>
          </div>
        </div>
      </div>
    </div>
    
    
    
</form>

