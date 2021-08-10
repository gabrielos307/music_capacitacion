<div class="modal fade" id="<?php echo $idmodal?>" tabindex="-1" role="dialog" aria-labelledby="registro" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $accion ?></h5>
      </div>
      <div class="modal-body">
      <?php
        echo $this->Form->create($artists, ['id'=>$idform]);
        echo $this->Form->input('nombre');
        echo $this->Form->input('nacimiento');
        echo 'Es banda';
        echo $this->Form->checkbox('es_banda', ['value' => true]);
        echo $this->Form->button(__($accion));
        echo $this->Form->end();
        ?>
      
        
      </div>
      
    </div>
  </div>
</div>