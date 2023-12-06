<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'confirmado', 'token', 'admin', 'conciertosGuardados'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $password2;
    public $password_actual;
    public $password_nuevo;
    public $confirmado;
    public $token;
    public $admin;
    public $conciertosGuardados;
 /**
 * Constructor de un nuevo objeto Usuario
 * 
 * @param $args array Arreglo con los datos a insertar en la base de datos
 * @return Usuario Objeto Usuario
 * 
 */
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->admin = $args['admin'] ?? '';
    }
    /**
    * validación de los datos ingresados para iniciar sesión
    * 
    *
    * @return self::$alertas array Arreglo con los mensajes de error
    * 
    */
    public function validarLogin() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email del Usuario es Obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        return self::$alertas;

    }
   /**
    * validación de los datos ingresados para crear un nuevo usuario
    * 
    *
    * @return self::$alertas array Arreglo con los mensajes de error
    * 
    */

    public function validar_cuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'La Contraseña No Debe Ir Vacía';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'La Contraseña Debe Contener Al Menos 6 Caracteres';
        }
        if($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Las Contraseñas Son Diferentes';
        }
        return self::$alertas;
    }

   /**
    * validación de los datos ingresados para validar que el email exista en la base de datos
    * 
    *
    * @return self::$alertas array Arreglo con los mensajes de error
    * 
    */
    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }
        return self::$alertas;
    }
   /**
    * validación de los datos ingresados para validar que es la contraseña correcta
    * 
    *
    * @return self::$alertas array Arreglo con los mensajes de error
    * 
    */
    public function validarPassword() {
        if(!$this->password) {
            self::$alertas['error'][] = 'La Contraseña No Debe Ir Vacía';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'La Contraseña Debe Contener Al Menos 6 Caracteres';
        }
        return self::$alertas;
    }
   /**
    * validación de los datos ingresados para cambiar de constraseña
    * 
    *
    * @return self::$alertas array Arreglo con los mensajes de error
    * 
    */
    public function nuevo_password() : array {
        if(!$this->password_actual) {
            self::$alertas['error'][] = 'La Contraseña Actual No Puede Ir Vacía';
        }
        if(!$this->password_nuevo) {
            self::$alertas['error'][] = 'La Contraseña Nueva No Puede Ir Vacía';
        }
        if(strlen($this->password_nuevo) < 6) {
            self::$alertas['error'][] = 'La Contraseña Debe Contener Al Menos 6 Caracteres';
        }
        return self::$alertas;
    }
   /**
    * validación que comprueba que las contraseñas ingresas sean iguales
    * 
    *
    * @return bool
    * 
    */
    public function comprobar_password() : bool {
        return password_verify($this->password_actual, $this->password );
    }
     /**
    * Función que encripta la contraseña del usuario antes de guardarla en la base de datos
    * 
    *
    * @return void
    * 
    */
    // Hashea el password
    public function hashPassword() : void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

     /**
    * función que crea un token para validar la cuenta del usuario
    * 
    *
    * @return void
    * 
    */
    public function crearToken() : void {
        $this->token = uniqid();
    }
}