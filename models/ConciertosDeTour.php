<?php
namespace Model;

class Concierto extends ActiveRecord {
    protected static $tabla = 'conciertosDeTour';
    protected static $columnasDB = ['id_tour', 'id_concierto'];

    public $id_tour;
    public $tour;
    public $id_concierto;
    public $concierto;



    public function __construct($args = [])
    {
        $this->id_tour = $args['id_tour'] ?? null;
        $this->id_concierto = $args['id_concierto'] ?? null;
    }


    public function validar() {
        if(!$this->id_tour) {
            self::$alertas['error'][] = 'El Campo Tour es Obligatorio';
        }
        if(!$this->id_concierto) {
            self::$alertas['error'][] = 'El Campo Concierto es Obligatorio';
        }
        

        return self::$alertas;
    }

}

