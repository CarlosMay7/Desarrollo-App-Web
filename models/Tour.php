<?php
namespace Model;

class Tour extends ActiveRecord {
    protected static $tabla = 'tours';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'artista_id'];

    public $id;
    public $nombre;
    public $artista_id;
    public $artista;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->artista_id = $args['artista_id'] ?? '';
        
    }

    public function validar(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(!$this->descripcion){
            self::$alertas['error'][] = 'La descripción es obligatoria';
        }
        if(!$this->artista_id){
            self::$alertas['error'][] = 'El artista es obligatorio';
        }
        return self::$alertas;
    }

    


}