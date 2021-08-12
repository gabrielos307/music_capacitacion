<div class="modal fade" id="<?php echo $idmodal?>" tabindex="-1" role="dialog" aria-labelledby="registro" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $accion ?></h5>
      </div>
      <div class="modal-body">
      <?php
        echo $this->Form->create('Artists', ['id'=>$idform]);
      ?>
      <input type="hidden" name="_csrfToken" value="a2a0207059246de186eede97167db56f7c3f14cfea76300eae98f39149cde8a9dadd209e2a808dca93f1c19817499e42f7cd1014225035625419bc090de64e03">
      <?php
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