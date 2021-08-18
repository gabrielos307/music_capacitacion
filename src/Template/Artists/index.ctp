<?= $this->Html->script(['app.js']) ?>
<div class="container">

<?php echo $this->element('modal', ["accion" => "Agregar", "idmodal"=>"addmodal", "idform"=>"addform", "tipo"=>"add"]);?>
<?php echo $this->element('modal', ["accion" => "Editar", "idmodal"=>"editmodal", "idform"=>"editform","tipo"=>"edit"]);?>

<h1>Artistas</h1>
<button class="btn btn-primary mr-2 mb-2 mt-2 task-add">Agregar</button>
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
                </button>
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

        $(document).on('click', '.task-edit', function(){
            let element = $(this)[0].parentElement.parentElement;
            
            let id = $(element).attr('artistID');

            $('#editform').attr('action', '/artists/edit/'+id)
            $('#editmodal').modal('show');
            $("#editform").on("submit", function(){
                var postdata = $("#editform").serialize();
                
                console.log(postdata);
                //alert("espera");
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
                        window.location.href = '/artists'
                    },
                    error:function(response){
                        alert("awanta")
                        console.log(response);
                    }
                })
            });
            
        });
        $(document).on('click', '.task-add', function(){
            $("#addmodal input[type='text']").val("");
            $("#addmodal input[type='checkbox']").prop('checked', false).change();
            
           $('#addmodal').modal('show');
        
                
            $("#addform").on("submit", function(){
                var postdata = $("#addform").serialize();
                console.log(postdata);
                alert("0");   
                $.ajax({        
                    url:"/artists/add",
                    data:postdata,
                    type: "JSON",
                    method:"POST",
                    success:function(response, textStatus){
                        
                        console.log(textStatus);
                        alert("holi");
                        //window.location.href = '/artists';
                        //alert("holi x2");
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Se ha actualizado exitosamente',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            window.location.href = '/artists'
                            
                    },
                    error: function (request) {
                        console.log(request);
                        //alert(error);
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