<?php

namespace App\Controller;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\Behavior\TreeBehavior;
use Cake\ORM\Query;
use Cake\Error\Debugger;
use Cake\Http\ServerRequest;
use Cake\ORM\TableRegistry;

class SongsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    public function index()
    {
        $songs = $this->Songs->find('all');
        $this->set(compact('songs'));

        $artists_songs = $this->Songs->find()
        ->select(['artista_nombre'=>'Artists.nombre', 
        'Songs.id', 'Songs.titulo',
        'Songs.album',
        'Songs.categoria'
        ])
        ->join([
            'table' => 'Artists',
            'type' => 'INNER',
            'conditions' => ['Songs.artista_id = Artists.id' ],
        ]);
        $this->set('artists_songs', $artists_songs);
    }
    public function view($id = null){
        $songs= $this->Songs->get($id);
        $this->set(compact('songs'));

        $artists = $this->Songs->find()
        ->select(['artista_nombre'=>'Artists.nombre', 'Songs.id'])
        ->join([
            'table' => 'Artists',
            'type' => 'INNER',
            'conditions' => ['Songs.artista_id = Artists.id','Songs.id' => $id ],
        ]);
        $query = $this->Songs->find()->select(['titulo'])->where(['id' => $id]);
        
        $this->set('artists', $artists);
        $this->set(compact('query'));
    }
    public function addEdit($id = null){
        if(empty($id)){
            $song = $this->Songs->newEntity();
            $artists = $this->Songs->Artists->find('all')->select(['Artists.nombre', 'Artists.id']);   
            $this->set(compact('artists'));
            $this->set('song', $song);
            if($this->request->is('post')){
                $song = $this->Songs->patchEntity($song, $this->request->getData());
                $this->request->getData();
                if($this->Songs->save($song)){
                    $this->Flash->success(__('Se ha guardado la cancion'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se pudo agregar la cancion')); 
            }
            $this->set('song', $song);
            
        }else{
            $song = $this->Songs->get($id);
            $this->set('song', $song);
            $artists = $this->Songs->Artists->find('all')->select(['Artists.nombre', 'Artists.id']);   
            $this->set(compact('artists'));
                if($this->request->is(['put'])){
                    $this->Songs->patchEntity($song, $this->request->getData());
                    if($this->Songs->save($song)){
                        $this->Flash->success(__('Tu cancion ha sido actualizada'));
                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('Tu cancion no se pudo actualizar'));
                }
                
        }
    }
    public function delete($id){
        $this->request->allowMethod(['post','delete']);
        $song = $this->Songs->get($id);
        if($this->Songs->delete($song)){
            $this->Flash->success(__('La canción con id: {0} ha sido eliminada', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}