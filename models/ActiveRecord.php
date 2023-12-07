<?php
namespace Model;


/**
 * Clase que implementa el patrón de ActiveRecord para operar con una base de datos.
 */
class ActiveRecord {

    /**
     * Instancia de la base de datos.
     *
     * @var mixed
     */
    protected static $db;

    /**
     * Nombre de la tabla
     *
     * @var string
     */
    protected static $tabla = '';

    /**
     * Arreglo que contiene las columnas de la tabla
     *
     * @var array
     */
    protected static $columnasDB = [];

    /**
     * Arreglo de alertas
     *
     * @var array
     */
    protected static $alertas = [];
    
    /**
     * Define la conexión a la Base de Datos
     *
     * @param mixed $database Instancia de la base de datos.
     * 
     * @return void
     */
    public static function setDB($database) {
        self::$db = $database;
    }

    /**
     * Setea un tipo de Alerta
     *
     * @param string $tipo Puede ser de éxito o de error
     * 
     * @param string $mensaje Mensaje que contendrá la alerta
     * 
     * @return void
     */
    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    /**
     * Devuelve las alertas
     *
     * @return Array
     */
    public static function getAlertas() {
        return static::$alertas;
    }

    /**
     * Devuelve las alertas de las validaciones que no fueron superadas.
     *
     * @return Array
     */
    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    /**
     * Consulta SQL para crear un objeto en Memoria (Active Record)
     *
     * @param string $query Consulta a ejecutar
     * 
     * @return Array
     */
    public static function consultarSQL($query) {
        $resultado = self::$db->query($query);

        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        $resultado->free();

        return $array;
    }

    /**
     * Crea el objeto en memoria que es igual al de la BD
     *
     * @param string $registro Registro a convertir en objeto.
     * 
     * @return Object
     */
    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    /**
     * Identifica y une los atributos de la BD
     *
     * @return Array
     */
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    /**
     * Sanitiza los datos antes de guardarlos en la BD
     *
     * @return Array
     */
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    /**
     * Sincroniza la Base de Datos con Objetos en memoria
     *
     * @param Array $args Datos del modelo
     * 
     * @return void
     */
    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }

    /**
     * Guarda el objeto como un registro en la base de datos
     *
     * @return mixed
     */
    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    /**
     * Obtiene todos los registros del modelo
     *
     * @param string $orden Tipo de orden que tendrán los registros
     * 
     * @return void
     */
    public static function all($orden = "DESC") {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id $orden";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    /**
     * Busca un registro por su ID
     *
     * @param mixed $id ID del registro
     * 
     * @return Array
     */
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    /**
     * Obtiene un límite de registros.
     *
     * @param int $limite
     * @return Array
     */
    public static function get($limite) {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT $limite " ;
        $resultado = self::consultarSQL($query);
        return $resultado ;
    }

    /**
     * Pagina todos los registros de una tabla.
     *
     * @param int $porPagina Límite de registros por página.
     * 
     * @param int $offset Indica el corrimiento de filas en el que inicia la página actual
     * 
     * @return Array
     */
    public static function paginar($porPagina, $offset){
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT $porPagina OFFSET $offset " ;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    
    /**
     * Encuentra los registros donde un valor específico se encuentre en la columna proporcionada.
     *
     * @param string $columna Columna donde se buscará el valor
     * 
     * @param string $valor Valor a buscar en la columna
     * 
     * @return Array
     */
    public static function where($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE $columna = '$valor'";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    /**
     * Obtiene todos los registros de la tabla ordenados por una columna y un orden específico.
     *
     * @param string $columna La columna por la cual se ordenarán los registros.
     * @param string $orden   El orden de clasificación (ASC para ascendente, DESC para descendente).
     * @return array|null 
     */
    public static function ordenar($columna, $orden){
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY $columna $orden";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    /**
     * Obtener registros de la tabla ordenados por una columna y un orden específico con un límite de resultados.
     *
     * @param string $columna La columna por la cual se ordenarán los registros.
     * @param string $orden   El orden de clasificación (ASC para ascendente, DESC para descendente).
     * @param int    $limite  El número máximo de registros a recuperar.
     * @return array|null     
     */
    public static function ordenarLimite($columna, $orden, $limite){
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY $columna $orden LIMIT $limite";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    /**
     * Obtener registros de la tabla que cumplen con condiciones especificadas en un array.
     *
     * @param array $array Un array asociativo donde las claves representan columnas y los valores son los criterios de búsqueda.
     * @return array|null   
     */
    public static function whereArray($array = []) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE ";
        foreach($array as $key => $value){
            if($key === array_key_last($array)){
                $query.= " $key = '$value'";
            } else {
                $query.= " $key = '$value' AND ";
            }
        }
        $resultado = self::consultarSQL($query);
        return $resultado;
    }


    /**
     * Obtiene el total de registros en la tabla o el total de registros que cumplen con una condición específica.
     *
     * @param string $columna La columna por la cual se aplicará la condición.
     * @param mixed  $valor   El valor que debe coincidir en la columna (opcional).
     * @return int          
     */
    public static function total($columna = "", $valor = ""){
        $query = "SELECT COUNT(*) FROM " . static::$tabla;

        if($columna){
            $query .= " WHERE $columna = $valor ";
        }
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();

        return array_shift($total);

    }

    /**
     * Obtener el total de registros en la tabla que cumplen con condiciones especificadas en un array.
     *
     * @param array $array Un array asociativo donde las claves representan columnas y los valores son los criterios de búsqueda.
     * @return int 
     */
    public static function totalArray($array = []){
        $query = "SELECT COUNT(*) FROM " . static::$tabla . " WHERE ";
        foreach($array as $key => $value){
            if($key === array_key_last($array)){
                $query.= " $key = '$value'";
            } else {
                $query.= " $key = '$value' AND ";
            }
        }
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();

        return array_shift($total);

    }

    /**
     * Crea un registro en la base de datos
     *
     * @return bool
     */
    public function crear() {
        $atributos = $this->sanitizarAtributos();

        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        return [
           'resultado' =>  $resultado,
           'id' => self::$db->insert_id
        ];
    }

    /**
     * Método para actualizar un registro en la base de datos.
     *
     * @return bool
     */
    public function actualizar() {
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        $resultado = self::$db->query($query);
        return $resultado;
    }

    /**
     * Método para eliminar un registro por su ID en la base de datos.
     *
     * @return bool
     */
    public function eliminar() {
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}