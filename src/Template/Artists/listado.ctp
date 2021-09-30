<table class="table">
    <tr>
        <th>Acción</th>
        <th>Id</th>
        <th>Nombre</th>
        <th>Nacimiento</th>
        <th>Es banda</th>
    </tr>
    <tbody id="lista">
    <?php foreach ($artists as $artist):  ?>
         
            <tr artistID="<?= $artist->id?>" id="t-row">
            <td class="text-center">
                <button class="btn btn-danger mr-2 mb-2 mt-2 task-delete "><i class="fa fa-trash-alt text-white"></i></button>
                <button class="btn btn-info mr-2 mb-2 mt-2 task-edit"><i class="fa fa-edit text-white"></i></button>
            </td>
            <td><?= $artist->id?></td>
            <td><?= $artist->nombre?></td>
            <td><?= $artist->nacimiento?></td>
            <?php if($artist->esbanda){ ?>
                <td>es banda</td>
            <?php }else{ ?>
                <td>es solista</td>
            <?php }; ?>
            </tr> 
        <?php endforeach; ?>
            
    </tbody>
</table>