<?php
namespace App\Controller;


class ArtistsController extends AppController{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    public function index(){
        
        $artists = $this->Artists->find('all');
        $this->set(compact('artists'));
        //$this->set(compact('artist'));
    }
    public function view($id = null){
        $artists = $this->Artists->get($id);
        $this->set('artists', $artists);
        $query = $artists->find()->contain(['Songs']);
        $this->set('songs', $songs);
    }
    public function add(){
        //if($this->request->is('ajax')){
            
            $artists  = $this->Artists->newEntity();
            $artists = $this->Artists->patchEntity($artists, $this->request->getData());
            //dump($artists);
            if($this->Artists->save($artists)){
                $this->Flash->success(__('Se ha guardado el artista'));
                echo json_encode(array(
                    "status" => 1,
                    "message" => "Se ha creado un artista"

                ));
                exit;
                //return $this->redirect(['action' => 'index']);
            }
            /*$this->Flash->error(__('No se pudo agregar el artista'));
            //echo json_encode(array(
                "status" => 0,
                "message" => "Fallo la creación"
            ));
            */
        //}
        $this->set('artists', $artists);
    }
    public function edit($id = null){
        $artists = $this->Artists->get($id);
        if($this->request->is(['post', 'put'])){
            $this->Artists->patchEntity($artists, $this->request->getData());
            if($this->Artists->save($artists)){
                echo json_encode(array(
                    "status" => 1,
                    "message" => "Se ha actualizado un artista"

                ));
                exit;
            }
            $this->Flash->error(__('Tu artista no se pudo actualizar'));
            echo json_encode(array(
                "status" => 0,
                "message" => "Fallo la creación"
            ));
        }
        $this->set('artists', $artists);
    }
    public function delete($id)
    {
        //$this->request->allowMethod(['post', 'delete']);

        $artists = $this->Artists->get($id);
        if ($this->Artists->delete($artists)) {
            echo json_encode(array(
                "status" => 1,
                "message" => "Se ha eliminado un artista"

            ));
            exit;
        }
        echo json_encode(array(
            "status" => 0,
            "message" => "Fallo eliminar"
        ));
    }
    

}