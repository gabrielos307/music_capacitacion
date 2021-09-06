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
    
    $(function(){   
        $(document).ready(function(){
            let listo = true;
            console.log(listo);

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
                    // respuestas.forEach(element => {
                        
                    //     $('.id-artists').html(element.id);
                    //     $('.nombre-artists').html(element.nombre);
                    //     $('.naci-artists').html(element.nacimiento);
                        
                    //     if (element.es_banda){
                    //         $('.banda-artists').html('es banda');
                    //     }else{
                    //         $('.banda-artists').html('es banda');
                    //     }
                    // });
                },
                error:function(response){
                        //alert("awanta")
                        console.log(response);
                    }

            });
            listo = false;
        });

        $(document).on('click', '.task-edit', function(){
            let element = $(this)[0].parentElement.parentElement;
            
            let id = $(element).attr('artistID');

            $('#editform').attr('action', '/artists/edit/'+id)
            $('#editmodal').modal('show');
            $("#editform").on("submit", function(){
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
                    alert("awanta")
                    window.location.href = '/artists'
                    },
                    error:function(response, textStatus,errorThrown){
                        //alert("awanta")
                        console.log(errorThrown);
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
                //alert("espera");
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
                        //console.log(textStatus);
                        //alert("holi");
                        /*Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Se ha actualizado exitosamente',
                            showConfirmButton: false,
                            timer: 1500
                            })*/
                        window.location.href = '/artists';
                        //alert("holi x2");
                        
                        
                            
                            
                            
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