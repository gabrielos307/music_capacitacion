<?= $this->Html->script(['app.js']) ?>
<div class="container">

<?php echo $this->element('modal', ["accion" => "Agregar", "idmodal"=>"addmodal", "idform"=>"addform", "tipo"=>"add"]);?>
<?php echo $this->element('modal', ["accion" => "Editar", "idmodal"=>"editmodal", "idform"=>"editform","tipo"=>"edit"]);?>

<h1>Artistas</h1>

<button class="btn btn-primary mr-2 mb-2 mt-2 task-add">Agregar</button>
<button id="click" class="btn btn-primary mr-2 mb-2 mt-2">Click we</button>
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Nacimiento</th>
        <th>Es banda</th>
        <th>Acción</th>
    </tr>
    <tbody id="lista">
        
    </tbody>
</table>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function listado(){
            

            $.ajax({
                url:'/artists/listado',
                //method:'POST',
                //type:'JSON',
                //data:listo,
                success:function(response){
                    //console.log(response);
                    //let respuestas = JSON.parse(response);
                    let template = '';
                    $('#lista').html(response);
                    
                },
                error:function(response){
                        //alert("awanta")
                        console.log(response);
                }

            });
        };
    $(function(){  
        
         
        $(document).ready(function(){
            listado();
        });

        

        $(document).on('click', '.task-edit', function(){
            let element = $(this)[0].parentElement.parentElement;
            
            let id = $(element).attr('artistID');

            $('#editform').attr('action', '/artists/edit/'+id)
            $('#editmodal').modal('show');
            $("#editform").on("submit", function(){
                event.preventDefault();
                var postdata = $("#editform").serialize();
                
                //console.log(postdata);
                //alert("espera");
                $.ajax({
                    url:"/artists/edit/"+id,
                    data:postdata,
                    type: "JSON",
                    method:"POST",
                    success:function(response){
                        //alert(response);
                    //window.location.href = '/artists'
                    
                    PNotify.success({
                    title: 'Registro',
                    text: 'Se ha actualizado'
                    }); 
                    //alert("awanta")
                    //window.location.href = '/artists'
                    $('#editmodal').modal('hide');
                    listado();
                    },
                    error:function(response, textStatus,errorThrown){
                        //alert("awanta")
                        console.log(textStatus);
                    }
                })
            });
            
        });
        $(document).on('click', '.task-add', function(){
            $("#addmodal input[type='text']").val("");
            $("#addmodal input[type='checkbox']").prop('checked', false).change();
            
           $('#addmodal').modal('show');
        
                
            $("#addform").on("submit", function(){
                event.preventDefault();
                var postdata = $("#addform").serialize();
                console.log(postdata);
                $.ajax({        
                    url:"/artists/add",
                    data:postdata,
                    type: "JSON",
                    method:"POST",
                    success:function(response){
                        //console.log(response);
                        PNotify.success({
                            title: 'Registro',
                            text: 'Se ha agregado '
                            });
                        
                        $('#addmodal').modal('hide');
                        listado();
                        alert("espera");
                    },
                    error: function (response) {
                        console.log(response);
                        alert('chester');
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
                    event.preventDefault();
                    
                    $.ajax({
                    url: "/artists/delete/"+id,
                    data: postdata,
                    type: "JSON",
                    method: "POST",
                    success: function(response){
                        console.log(response);
                        /*
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )*/
                        PNotify.success({
                            title: 'Registro',
                            text: 'Se ha eliminado '
                            }); 
                        //window.location.href = '/artists'
                       
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