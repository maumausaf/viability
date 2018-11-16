<br>
<h4>Cidades</h4>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome da cidade</th>            
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cidades as $cidade): ?>
        <tr>
            <td><?php echo $cidade->id;?></td>
            <td><?php echo $cidade->nome;?></td>
            <td><?php echo $this->cidades_model->getEstadosById($cidade->Estado);
                        
                ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<hr/>
<a href="/pages" class="btn btn-success">Voltar</a>
<br>
<br>