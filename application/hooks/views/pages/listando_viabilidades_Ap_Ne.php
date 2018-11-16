
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>  
            <th>Data</th>
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
            <td class="text-right">
                <a href="/pages/view/<?php echo $page->id; ?>" class="btn btn-sm btn-danger">visualizar</a>
                
                
            </td>
        </tr>
        <?php endforeach;?>
        <?php }else{echo 'Não possui viabilidades.';} ?>
    </tbody>
</table>
