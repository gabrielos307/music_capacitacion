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
        $this->hasMany('Songs')
            ->setForeignKey('artista_id');
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
    
    public function add($datos = null){
        $artistsTable = TableRegistry::getTableLocator()->get('Artists');
        $artists = $artistsTable->newEntity();
        $artists = $artistsTable->patchEntity($artists, $datos);
        if($artistsTable->save($artists)){
            return true;
        }
        return false;
    }
    public function edit($datos = null, $id = null){
        $artistsTable = TableRegistry::getTableLocator()->get('Artists');  
        $artists = $artistsTable->get($id); 
        $artists = $artistsTable->patchEntity($artists, $datos); 
        if($artistsTable->save($artists)){
            return true;
        }
        return false;
        
    }

    public function deleteArtists( $entity) 
    {
        $artistsTable = TableRegistry::getTableLocator()->get('Artists');  
        if ($artistsTable->delete($entity)) {
            return true;
        }
        return false;
    }
}