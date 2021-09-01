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
        
        $bandera = $this->Artists->add($this->request->getData());
        if($bandera){//si es true
            $response = $this->response->withType('application/json')
            ->withStringBody(json_encode([
                "status" => 1,
                "message" => "Se ha creado un artista"
            ]));
            
        }
        //$this->Flash->error(__($artists));
            return json_encode(array(
                "status" => 0,
                "message" => "Fallo la creación"
            ));
            
        
    }
    public function edit($id = null){
        //obtengo la funcion edit del controlador y le paso los datos recolectados junto con el id
        $artists = $this->Artists->get($id); //opcional
        $bandera = $this->Artists->edit($this->request->getData(), $id);
        //obtenemos los artistas con el id
        
        if($bandera){//si los actualiza
            //regresa un mensaje
            $this->Flash->success(__('Se ha guardado el artista'));
            $response = $this->response->withType('application/json')
            ->withStringBody(json_encode([
                "status" => 1,
                "message" => "Se ha editado un artista"
            ]));
            //dump($response);
            return $response; 
             

        }
        //si no los actualiza
        //$this->Flash->error(__($artists));
            echo json_encode(array(
                "status" => 0,
                "message" => "Fallo la creación"
            ));
            return $this->redirect(['action' => 'index']);
        //mandamos artists a la vista
            //$this->set('artists', $artists);
    }
    //me atore :P
    public function delete($id)
    {
        //$this->request->allowMethod(['post', 'delete']);

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