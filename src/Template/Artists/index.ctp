<?= $this->Html->script(['app.js']) ?>
<div class="container">

<?php echo $this->element('modal', ["accion" => "Agregar", "idmodal"=>"addmodal", "idform"=>"addform"]);?>
<?php echo $this->element('modal', ["accion" => "Editar", "idmodal"=>"editmodal", "idform"=>"editform"]);?>

<h1>Artistas</h1>
<?php echo $this->Html->link(
    'Añadir artista',
    '#',
    ['class' => 'button', 'id'=>'add-artista']);?>
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Nacimiento</th>
        <th>Es banda</th>
        <th>Acción</th>
    </tr>
    <tbody id="lista">
    <?php foreach ($artists as $artist): ?>
        <tr artistID="<?=$artist->id ?>" id="t-row">
            <td><?=$artist->id ?></td>
            <td artistNombre="<?=$artist->nombre ?>">
                <?=$this->Html->link($artist->nombre,
                ['controller' => 'Artists', 'action' => 'view', $artist->id]) ?>
            </td>
            <td artistNaci="<?=$artist->nacimiento ?>">
                <?=$artist->nacimiento?>
            </td>
            <td artistBanda="<?=$artist->es_banda ?>"> 
                <?php if ($artist->es_banda === true):?>
                    Es banda
                <?php elseif($artist->es_banda === false):?>
                     Es solista
                <?php endif; ?>
            </td>
            <td>
            <button class="btn btn-danger mr-2 mb-2 mt-2 task-delete">
                Delete
            <?php /*$this->Form
                ->postLink('', 
                ['controller'=> 'Artists','action' => 'delete', $artist->id],
                ['class' => 'fa fa-trash-alt text-white '],
                ['confirm' => '¿Estás segur@?']
                )*/?></button>
                <?php /*echo $this->Html->link(
                'Editar',
                '#',
                ['class' => 'button']
                
            );
              
            //echo $this->Form->hidden('id',['value'=>$artist->id]);
            */?>
              <!--<input type="hidden" id="id" name="id" value="<?php //artist->id ?>">
        -->
        <button class="btn btn-info mr-2 mb-2 mt-2 task-edit">Editar</button>
            </td>
        
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    
    $(function(){
        $('#add-artista').on('click', function(){
            $("#addmodal input").val("");
            $("#addmodal input[type='checkbox']").prop('checked', false).change();
            
           $('#addmodal').modal('show');
        
                
            $("#addform").on("submit", function(){
                var postdata = $("#addform").serialize();
                console.log(postdata);
                alert("Espera");
                
                $.ajax({        
                    url:"/artists/add",
                    data:postdata,
                    type: "JSON",
                    method:"POST",
                    success:function(response){
                        alert("Se ha agregado");
                        
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se ha actualizado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    },
                    
                    error:function(response){
                        alert(":(");
                    }
                })
            });
        });

        $(document).on('click', '.task-edit', function(){
            let element = $(this)[0].parentElement.parentElement;
            
            let id = $(element).attr('artistID');

            
            $('#editmodal').modal('show');
            $("#editform").on("submit", function(){
                var postdata = $("#editform").serialize();
                
                console.log(postdata);

                $.ajax({
                    url:"/artists/edit/"+id,
                    data:postdata,
                    type: "JSON",
                    method:"POST",
                    success:function(response){
                        //alert(response);
                    //window.location.href = '/artists'
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se ha actualizado exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    },
                    error:function(response){
                        alert("awanta")
                        console.log(response);
                    }
                })
            });
            
        });

        $(document).on('click', '.task-delete', function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('artistID');
            console.log(id);
            var postdata = $("#addform").serialize();
            console.log(postdata);
            Swal.fire({
                title: 'Estas seguro?',
                text: "No podrás recuperarlo",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    $.ajax({
                    url: "/artists/delete/"+id,
                    data: postdata,
                    type: "JSON",
                    method: "POST",
                    success: function(response){
                        console.log(response);
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        window.location.href = '/artists'
                        
                    },
                    error:function(response){
                        
                        console.log(postdata);
                        
                    }
                })
                    
                }
                })
            
            
        });
    });


</script>