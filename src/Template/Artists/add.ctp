<h1>Añadir artista</h1>

<?php
echo $this->Html->link(
    'Index artists',
    '/index',
    
);
?>
<?php
    echo $this->Form->create('Artists', ['id' => 'form-artists']);
    echo $this->Form->input('nombre');
    echo $this->Form->input('nacimiento');
    echo 'Es banda';
    echo $this->Form->checkbox('es_banda', ['value' => true]);
    echo $this->Form->button(__('Guardar'),['id' => 'cakebtn']);
    echo $this->Form->end();
?>
<script>
    $(function() {
        /*
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
        });*/
        $("#form-artists").on("submit", function(){
            var postdata = $("#form-artists").serialize();
            console.log(postdata);
            alert("hhhh");
            /*/$.ajax({
                method:"POST",
                url:"<?= $this->Url->build(['controller' => 'Artists', 'action' => 'add'])?>",
                data:postdata,
                type: "JSON",
                success:function(response){
                
                window.location.href = '/artists'
                }
            })*/
            
        });
        
    });
</script>