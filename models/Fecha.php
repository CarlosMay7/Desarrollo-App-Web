<?php
namespace Model;

class Fecha extends ActiveRecord {
    protected static $tabla = 'fecha';
    protected static $columnasDB = ['id', 'dia', 'mes', 'año'];


    public $id;
    public $dia;
    public $mes;
    public $año;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->dia = $args['dia'] ?? '';
        $this->mes = $args['mes'] ?? '';
        $this->año = $args['año'] ?? '';
    }

    // Mensajes de validación para la creación de un evento
    public function validar() {
        if(!$this->dia) {
            self::$alertas['error'][] = 'El Campo Día es Obligatorio';
        }
        if  ($this->dia < 1 || $this->dia > 31) {
            self::$alertas['error'][] = 'Elige un día válido';
        }
        if(!$this->mes) {
            self::$alertas['error'][] = 'El Campo Mes es Obligatorio';
        }
        if  ($this->mes < 1 || $this->mes > 12) {
            self::$alertas['error'][] = 'Elige un mes válido';
        }
        if(!$this->año) {
            self::$alertas['error'][] = 'El Campo Año es Obligatorio';
        }
        if  ($this->año < 2020 || $this->año > 2030) {
            self::$alertas['error'][] = 'Elige un año válido';
        }

        return self::$alertas;
    }
}