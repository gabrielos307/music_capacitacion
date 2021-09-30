<?php
namespace App\Controller;
use Cake\Http\ServerRequest;
use Cake\Http\Response;
use Cake\Event\Event;   

class ArtistsController extends AppController{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    public function index(){
        $artists = $this->Artists->index();
    }
    public function listado(){
       
        $artists = $this->Artists->index();
        $this->viewBuilder()->setLayout('ajax');
        $this->set(compact('artists'));
        
       
    }

    public function actualiza($id = null){
        $this->viewBuilder()->setLayout('ajax');
        if(empty($id)){
            $artists = $this->Artists->newEntity();
            $this->set(compact('artists'));
        }else{
            $artists = $this->Artists->get($id);
            $this->set(compact('artists'));
        }
        
    }

    public function view($id = null){
        $artists = $this->Artists->get($id);
        $this->set('artists', $artists);
        $query = $artists->find()->contain(['Songs']);
        $this->set('songs', $songs);
    }
  
    
    public function addEdit($id = null){
        $this->viewBuilder()->setLayout('ajax');
        if(empty($id)){  
            $artists = $this->Artists->newEntity();
            $this->set(compact('artists'));   
            $bandera = $this->Artists->add($this->request->getData());
            dump($this->request->getData());
            if($bandera){//si es true
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
            exit;
        }else{
            $artists = $this->Artists->get($id);
            #$this->set(compact('artists'));
            $bandera = $this->Artists->edit($this->request->getData(), $id);
            dump($this->request->getData());
            if($bandera){
                
                
                echo json_encode(array(
                    "status" => 1,
                    "message" => "Se ha editado un artista"

                ));
                exit;
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "Fallo la edición"
            ));
            exit;
        }
       
    }
    public function delete($id)
    {
        $this->viewBuilder()->setLayout('ajax');
        $artists = $this->Artists->get($id);
        $result = $this->Artists->deleteArtists($artists,['atomic' => false]);
        if ($result) {
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
        exit;
    }
    

}