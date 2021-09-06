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
        //if($this->request->getData()){
        $artists = $this->Artists->index();
        $artistsArray = [];
        $template = '';
        foreach ($artists as $key) {
            $template = '';
            $template .= '   
            <tr>
            <td>'.$key["id"].'</td>
            <td>'.$key["nombre"].'</td>
            <td>'.$key["nacimiento"].'</td>';
            if($key["es_banda"]){
                $template.='<td>es banda</td>';
            }else{
                $template.='<td>es solista</td>';
            }
            
            $template .= '<td>
            <button class="btn btn-danger mr-2 mb-2 mt-2 task-delete">Delete</button>
            <button class="btn btn-info mr-2 mb-2 mt-2 task-edit">Editar</button>
            </td>';
        $template .='<\tr>';
            echo $template;
        }
        //$response = $this->response->withType('application/json')
        // ->withStringBody(json_encode([$artists]));
        // return $response;
        //echo json_encode($artistsArray);
        exit;
        //}
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
            
        
    
    public function edit($id = null){
        //obtengo la funcion edit del controlador y le paso los datos recolectados junto con el id
        $artists = $this->Artists->get($id); //opcional
        $bandera = $this->Artists->edit($this->request->getData(), $id);
        //obtenemos los artistas con el id
        
        if($bandera){//si los actualiza
            //regresa un mensaje
            
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