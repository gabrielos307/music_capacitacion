
<?php
       
       //echo $this->Form->create('Artists', ['id'=>$idform,]);
       echo $this->Form->create('Artists', ['class'=>'form']);
     
   ?>
   
   <?php
     echo $this->Form->input('nombre');
     echo $this->Form->input('nacimiento');
     echo 'Es banda';
     echo $this->Form->checkbox('es_banda', ['value' => true]);
     ?>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       <button type="button" class="btn btn-primary boton-submit">Guardar</button>
     </div>
     <?php 
     echo $this->Form->end();
     ?>