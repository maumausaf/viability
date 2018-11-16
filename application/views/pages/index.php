<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>   
            <th>Data</th>
            <th>Status</th>
            <th class="text-right">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if($pages != null){?>
        <?php foreach ($pages as $page): ?>
        <tr>
            <td><?php echo $page->id;?></td>
            <td><?php echo $page->title;?></td>
            <td><?php echo date('d/m/Y',strtotime($page->updated));?></td>    
            <td><?php   if($page->status == 0){
                            echo 'Pendente';
                        }elseif($page->status == 1){
                            echo 'Aprovada';
                        }elseif($page->status == 3){
                            echo 'Vendida';
                        }elseif($page->status == 4){
                            echo 'Não Vendida';
                        }else{
                            echo 'Negada';
                        }
                ;?></td>
            <td class="text-right">
                <a href="/pages/view/<?php echo $page->id; ?>" class="btn btn-sm btn-danger">visualizar</a>
                           
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <?php if($pagination){
    echo $pagination ;}?>
</nav>
<?php }else{echo 'Não possui viabilidades.';} ?>
<br>
