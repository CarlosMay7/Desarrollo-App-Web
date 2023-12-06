<?php
namespace Model;

class ConciertosDeTour extends ActiveRecord {
    protected static $tabla = 'conciertosdetour';
    protected static $columnasDB = ['tour_id', 'concierto_id'];

    public $tour_id;
    public $tour;
    public $concierto_id;
    public $concierto;

 /**
 * Constructor de un nuevo objeto ConciertosDeTour para agregar conciertos a un tour
 * 
 * @param $args array Arreglo con los datos a insertar en la base de datos
 * @return ConciertosDeTour Objeto ConciertosDeTour
 * 
 */


    public function __construct($args = [])
    {
        $this->tour_id = $args['tour_id'] ?? null;
        $this->concierto_id = $args['concierto_id'] ?? null;
    }

     /**
 * validación de los datos ingresados para agregar conciertos a un tour
 * 
 *
 * @return self::$alertas array Arreglo con los mensajes de error
 * 
 */

    public function validar() {
        if(!$this->tour_id) {
            self::$alertas['error'][] = 'El Campo Tour es Obligatorio';
        }
        if(!$this->concierto_id) {
            self::$alertas['error'][] = 'El Campo Concierto es Obligatorio';
        }
        

        return self::$alertas;
    }

}

