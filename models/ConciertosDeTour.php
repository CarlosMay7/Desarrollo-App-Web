<?php
namespace Model;

class ConciertosDeTour extends ActiveRecord {
    protected static $tabla = 'conciertosdetour';
    protected static $columnasDB = ['tour_id', 'concierto_id'];

    public $tour_id;
    public $tour;
    public $concierto_id;
    public $concierto;



    public function __construct($args = [])
    {
        $this->tour_id = $args['tour_id'] ?? null;
        $this->concierto_id = $args['concierto_id'] ?? null;
    }


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

