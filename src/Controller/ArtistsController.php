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
        $artistsArray = [];
        $template = '';
        foreach ($artists as $key) {
            $template = '';
            $template .= '   
            <tr artistID="'.$key["id"].'" id="t-row">
            <td class="text-center">
            <button class="btn btn-danger mr-2 mb-2 mt-2 task-delete "><i class="fa fa-trash-alt text-white"></i></button>
            <button class="btn btn-info mr-2 mb-2 mt-2 task-edit"><i class="fa fa-edit text-white"></i></button>
            </td>
            <td>'.$key["id"].'</td>
            <td>'.$key["nombre"].'</td>
            <td>'.$key["nacimiento"].'</td>';
            if($key["es_banda"]){
                $template.='<td>es banda</td>';
            }else{
                $template.='<td>es solista</td>';
            };
        $template .='<\tr>';
            echo $template;
        }
        
        exit;
       
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
        $artists = $this->Artists->get($id);
        $bandera = $this->Artists->edit($this->request->getData(), $id);
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
    public function delete($id)
    {
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