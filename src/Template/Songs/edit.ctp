<h1>Editar canción</h1>
<pre>

    <?php 
    foreach ($artists as $key => $a){
    $options[$key+1] = [$a->id =>  $a->nombre];
     }?>
</pre>
<?php
    echo $this->Form->create($song);
    echo $this->Form->input('titulo');
    echo $this->Form->input('album');
    echo $this->Form->input('categoria');
    echo $this->Form->control('artista_id', ['options' => $options]);
    echo $this->Form->button(__('Guardar cancion'));
    echo $this->Form->end();

?>