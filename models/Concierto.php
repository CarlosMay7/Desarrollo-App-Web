<?php
namespace Model;

class Concierto extends ActiveRecord {
    protected static $tabla = 'conciertos';
    protected static $columnasDB = ['id', 'ciudad', 'recinto', 'fecha_id', 'descripcion', 'url_compra', "artista_id", 'sold_out'];

    public $id;
    public $ciudad;
    public $recinto;
    public $fecha_id;
    public $artista_id;
    public $artista;
    public $descripcion;
    public $url_compra;
    public $sold_out;

  /**
 * Constructor de un nuevo objeto concierto
 * 
 * @param $args array Arreglo con los datos a insertar en la base de datos
 * @return Concierto Objeto Concierto
 * 
 */

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->ciudad = $args['ciudad'] ?? '';
        $this->recinto = $args['recinto'] ?? '';
        $this->fecha_id = $args['fecha_id'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->artista_id = $args['artista_id'] ?? '';
        $this->url_compra = $args['url_compra'] ?? '';
        $this->sold_out = $args['sold_out'] ?? '0';
    }

 /**
 * validación de los datos ingresados para crear un nuevo concierto
 * 
 *
 * @return self::$alertas array Arreglo con los mensajes de error
 * 
 */

    public function validar() {
        if(!$this->ciudad) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        if(!$this->recinto) {
            self::$alertas['error'][] = 'El Campo Recinto es Obligatorio';
        }
        if(!$this->fecha_id  || !filter_var($this->fecha_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige el Día del Concierto';
        }
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'Escribe la descripción Concierto';
        }
        if(!$this->url_compra) {
            self::$alertas['error'][] = 'El Campo URL de compra es Obligatorio';
        }
        if(!$this->artista_id || !filter_var($this->artista_id, FILTER_VALIDATE_INT) ) {
            self::$alertas['error'][] = 'Selecciona el artista headliner del Concierto';
        }

        return self::$alertas;
    }
}