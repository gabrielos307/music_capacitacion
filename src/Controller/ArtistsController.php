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
        //if($this->request->is('ajax')){
            /*
            $artists  = $this->Artists->newEntity();
            $artists = $this->Artists->patchEntity($artists, $this->request->getData());
            //dump($artists);
            if($this->Artists->save($artists)){
                $this->Flash->success(__('Se ha guardado el artista'));
                echo json_encode(array(
                    "status" => 1,
                    "message" => "Se ha creado un artista"

                ));
                //dump($artists);
                return $this->redirect(['action' => 'index']);
            }
            //dump($artists);
            //$this->Flash->error(__('No se pudo agregar el artista'));
            $this->Flash->error(__($artists));
            echo json_encode(array(
                "status" => 0,
                "message" => "Fallo la creación"
            ));
            
        //}
        */
        //método add del modelo, y le pasamos los datos hacia la funcion modelo
        //y lo guarda en bandera dependiendo de un true o false
        
        //$artists = $this->Artists->get($id); //opcional
        $bandera = $this->Artists->add($this->request->getData());
        if($bandera){//si es true
            //los guarda
           // $this->Flash->success(__('Se ha guardado el artista'));
           //notify()->success('Data has been saved successfully!');
            echo json_encode(array(
                "status" => 1,
                "message" => "Se ha creado un artista"

            ));
            exit;
        }
        $this->Flash->error(__($artists));
            echo json_encode(array(
                "status" => 0,
                "message" => "Fallo la creación"
            ));
            exit;
        //manda artists a la vista
        //$this->set('artists', $artists);
        
    }
    public function edit($id = null){
        //obtengo la funcion edit del controlador y le paso los datos recolectados junto con el id
        $artists = $this->Artists->get($id); //opcional
        $bandera = $this->Artists->edit($this->request->getData(), $id);
        //obtenemos los artistas con el id
        
        if($bandera){//si los actualiza
            //regresa un mensaje
            //$this->Flash->success(__('Se ha guardado el artista'));
            echo json_encode(array(
                "status" => 1,
                "message" => "Se ha creado un artista"

            ));
            exit;   

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