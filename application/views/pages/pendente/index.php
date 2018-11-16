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
            <td><?php echo date('d/m/Y',strtotime($page->created));?></td>    
            <td><?php   if($page->status == 0){
                            echo 'Pendente';
                        }elseif($page->status == 1){
                            echo 'Aprovada';
                        }else{
                            echo 'Negada';
                        }
                ;?></td>
            <td class="text-right">
                <a href="/pages/view/<?php echo $page->id; ?>" class="btn btn-sm btn-default">ver</a>
                <a href="/pages/<?php echo $page->id; ?>/edit" class="btn btn-sm btn-info">editar</a>
                <a href="/pages/<?php echo $page->id; ?>/answer" class="btn btn-sm btn-success">responder</a>               
            </td>
        </tr>
        <?php endforeach;?>
        <?php }else{echo 'Não possui viabilidades pendentes.';} ?>
    </tbody>
</table>
