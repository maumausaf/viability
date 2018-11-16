<br/>
<h2>View</h2>
<hr>
<div class="row">
    <table class="table">
  <thead class="thead-inverse">
      <tr class="table-primary">
     
      <th>Name</th>
      <th>Telefone</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td><?php echo $page->title; ?></td>
      <td><?php echo $page->telefone; ?></td>
      <td><?php echo $page->email; ?></td>
    </tr>
    
  </tbody>
</table>

<table class="table">
  <thead class="thead-default">
      <tr class="table-active">
      
      <th>Endereço</th>
      <th>Cidade</th>
      
    </tr>
  </thead>
  <tbody>
      <tr>
     
      <td><?php echo $page->body; ?></td>
      <td><?php echo $page->cidade; ?></td>
      
    </tr>
    
  </tbody>
</table>
    
<table class="table">
  <thead class="thead-default">
      <tr class="table-success">
      
      <th>Informações adicionais</th>
      <th>Vendedor</th>
      
    </tr>
  </thead>
  <tbody>
      <tr>
     
      <td><?php echo $page->informacoes; ?></td>
      <td><?php echo $page->vendedor; ?></td>
      
    </tr>
    
  </tbody>
</table>
    
    <table class="table">
  <thead class="thead-default">
      <tr class="table-danger">
      
      <th>Status</th>
      <th>Observções</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td><?php  if($page->status == 0){
                    echo 'Pendente';
                }else if($page->status == 1){
                    echo 'Aprovada';
                }else if($page->status == 3){
                    echo 'Vendida';
                }else if($page->status == 4){
                    echo 'Não vendida';
                }else{
                    echo 'Recusada';
                }
        ?></td>
      <td><?php echo $page->obs; ?></td>
      
    </tr>
    
  </tbody>
</table>
</div> <!-- .row -->



<hr>

<a href="/pages/<?php echo $page->id; ?>/edit" class="btn btn-primary">Editar</a>
<a href="/pages/<?php echo $page->id; ?>/answer" class="btn btn-success">Responder</a>
<a href="https://www.google.com.br/maps/place/<?php echo $page->body; ?> <?php echo $page->cidade; ?> "  class="btn btn-secondary" target="_blank">Mapa</a>
<a href="/pages/<?php echo $page->id; ?>/retorno" class="btn btn-warning">Contactar ao cliente</a>

<br><br>
