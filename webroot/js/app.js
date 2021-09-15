function actualiza(id){
    $.ajax({
        url:'/artists/actualiza',
        success:function(response){
            let template = '';
            $('.content-form').html(response);
            if (id==null) {
                $('.form').attr('action', '/artists/addEdit');
            }else{
                $('.form').attr('action', '/artists/addEdit/'+id);
            }
            
            
        },
        error:function(response){
            console.log(response);
        }
    });
};
function listado(){
    $.ajax({
        url:'/artists/listado',
        success:function(response){
            let template = '';
            $('#listado').html(response);
        },
        error:function(response){
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
        
        //$('.form').attr('action', '/artists/addEdit/'+id);
        actualiza(id);
        $('#editmodal').modal('show');
        $(".boton-submit").on("click", function(){
            //event.preventDefault();
            console.log("jijijijijiji")
            var postdata = $("#editform").serialize();
            $.ajax({
                url:"/artists/addEdit/"+id,
                data:postdata,
                type: "JSON",
                method:"POST",
                success:function(response){
                    PNotify.success({
                    title: 'Registro',
                    text: 'Se ha actualizado'
                    }); 
                    $('#editmodal').modal('hide');
                    listado();
                },
                error:function(response, textStatus,errorThrown){
                    console.log(textStatus);
                }
            })
        });
        
    });
    $(document).on('click', '.task-add', function(){
        $("#addmodal input[type='text']").val("");
        $("#addmodal input[type='checkbox']").prop('checked', false).change();
        
    $('#addmodal').modal('show');
        actualiza(null);
            
        $(".boton-submit").on("click", function(){
            //event.preventDefault();
            
            var postdata = $("#addform").serialize();
            $.ajax({        
                url:"/artists/addEdit",
                data:postdata,
                type: "JSON",
                method:"POST",
                success:function(response){
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
                        PNotify.success({
                            title: 'Registro',
                            text: 'Se ha eliminado '
                            }); 
                    listado();
                    },
                    error:function(response){
                        console.log(postdata);
                    }
                })    
            }
        })
    });
});