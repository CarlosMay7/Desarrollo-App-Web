<?php
namespace Model;

class Tour extends ActiveRecord {
    protected static $tabla = 'tours';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'artista_id'];

    public $id;
    public $nombre;
    public $artista_id;
    public $artista;

 /**
 * Constructor de un nuevo objeto Tour
 * 
 * @param $args array Arreglo con los datos a insertar en la base de datos
 * @return Tour Objeto Tour
 * 
 */
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->artista_id = $args['artista_id'] ?? '';
        
    }
 /**
 * validación de los datos ingresados para crear un nuevo tour
 * 
 *
 * @return self::$alertas array Arreglo con los mensajes de error
 * 
 */
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