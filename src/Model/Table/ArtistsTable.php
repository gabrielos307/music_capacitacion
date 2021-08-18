<?php


namespace App\Model\Table;
use Cake\Validation\Validator;
use Cake\ORM\Behavior\TreeBehavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Http\Response;
use Cake\Routing\Router;
use Cake\ORM\Entity;
use Cake\Datasource\EntityInterface;

class ArtistsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        //$this->addBehavior('Tree');
        $this->hasMany('Songs')
            ->setForeignKey('artista_id');
        ///$this->loadComponent('RequestHandler');
            
    }
    public function validationDefault(Validator $validator){
        $validator
            ->notEmpty('nombre')
            ->notEmpty('nacimiento')
            ->notEmpty('es_banda');
        return $validator;
    }
    public function index(){
        $artistsTable = TableRegistry::getTableLocator()->get('Artists');
        $artists = $artistsTable->find('all');
        return $artists;
    }
    /*
    public function add($datos = null){
        //Les paso los datos del controlador
        $artistsTable = TableRegistry::getTableLocator()->get('Artists');

        //Generamos un nuevo registro
        $artists = $artistsTable->newEntity();
        
        $artists = $artistsTable->patchEntity($artists, $datos);//Guardo en artists de acuerdo a los datos
        //dump($artistsTable);
        if($artistsTable->save($artists)){
            //dump($artists);
            return true; //si los guarda, manda un true al controlador
        }
        return false;//sino regresa un false
    }*/
    public function edit($datos = null, $id = null){
        //Les paso los datos del controlador
        $artistsTable = TableRegistry::getTableLocator()->get('Artists');  //Obtengo la tabla artists 
        $artists = $artistsTable->get($id); //obtengo los artistas a traves del id
        $artists = $artistsTable->patchEntity($artists, $datos); //actualizo de acuerdo a los datos
        if($artistsTable->save($artists)){
            return true;//si lo guarda, regresa un true al controlador
        }
        return false;//sino un false
        
    }
    
    //Creo que no se puede eliminar
    public function deleteArtists( $entity, $options = []) 
    {
        //$this->request->allowMethod(['post', 'delete']);
        //dump($entity);
        $artistsTable = TableRegistry::getTableLocator()->get('Artists');  
        if ($artistsTable->delete($entity)) {
            return true;
        }
        return false;
    }
}