<div class="container">
<h1>Songs</h1>
<p><?= $this->Html->link('Añadir canción', ['controller' => 'Songs', 'action' => 'addEdit'])?></p>
<pre>
    <?php
    foreach ($songs as $s):
        print_r($s->Artists);
        endforeach;
        
    ?>
    
</pre>

<table>
    <tr>
        
        <th>Acción</th>
        
        <th>Titulo</th>
        <th>Album</th>
        <th>Categoria</th>
        <th>Artista</th>
        
    </tr>

    
    <?php foreach ($artists_songs as $song): ?>
    <tr>
        <td>
            <button class="btn btn-danger mr-2 mb-2 mt-2">
            <?= $this->Form
            ->postLink('', 
            ['controller'=> 'Songs','action' => 'delete', $song->id],
            ['class' => 'fa fa-trash-alt text-white'],
            ['confirm' => '¿Estás segur@?']
            )?></button>
            <button class="btn btn-info">
            <?= $this->Html->link('', 
            ['controller' => 'Songs', 'action' => 'addEdit', $song->id],
            ['class' => 'fa fa-edit text-white '])?>
            </button></td>
        <td class="p-2"><?= $this->Html->link($song->titulo,
            ['controller' => 'Songs', 'action' => 'view', $song->id]) ?></td>
        <td class="p-2"><?= $song->album ?></td>
        <td class="p-2"><?= $song->categoria ?></td>
        <td class="p-2"><?= $song->artista_nombre?></td>

    </tr>
    <?php endforeach; ?>
</table>
</div>

<!---<?//= //$this->Fa->link('facebook', __('Proceed'), ['controller' => 'pages', 'display', 'next']) ?>-->