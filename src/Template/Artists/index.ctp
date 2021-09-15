<?= $this->Html->script(['app.js']) ?>
<div class="container">

<?php echo $this->element('modal', ["accion" => "Agregar", "idmodal"=>"addmodal", "idform"=>"addform"]);?>
<?php echo $this->element('modal', ["accion" => "Editar", "idmodal"=>"editmodal", "idform"=>"editform"]);?>

<h1>Artistas</h1>

<button class="btn btn-primary mr-2 mb-2 mt-2 task-add">Agregar</button>
<button id="click" class="btn btn-primary mr-2 mb-2 mt-2">Click we</button>
<div id="listado">

</div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
