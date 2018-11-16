<br>
<h4>Usuários</h4>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>      
            <th>Cidade</th>   
            <th>Tipo</th>
            <th class="text-right">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->id;?></td>
            <td><?php echo $user->name;?></td>
            <td><?php   if($user->cidade != 0){
                            echo $this->cidades_model->getNameCidades($user->cidade);
                        }else{
                            echo 'Todas as cidades';
                        }
                        ?>
            </td>
            <td><?php   if($user->user == 1){
                            echo 'Administrador';
                        }elseif($user->user == 2){
                            echo 'Consutor de Vendas';
                        }elseif($user->user == 3){
                            echo 'Consutor de Viabilidade';
                        }
                        ?>
            </td>
            <td class="text-right">
                <a href="/opcoes/<?php echo $user->id; ?>/editUser" class="btn btn-sm btn-info">editar</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<hr/>
<a href="/pages" class="btn btn-success">Voltar</a>
<br>
<br>