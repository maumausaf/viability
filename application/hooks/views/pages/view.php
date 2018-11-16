<br/>
<h2>View</h2>

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
<a href="/pages" class="btn btn-danger">Voltar</a>
<a href="/pages/<?php echo $page->id; ?>/edit" class="btn btn-primary">Editar</a>
<a href="/pages/<?php echo $page->id; ?>/answer" class="btn btn-success">Responder</a>
<br><br>
