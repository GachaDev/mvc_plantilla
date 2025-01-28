<?php
class DBConnection
{
    private $servidor;      // IP
    private $usuario;       // nombre usuario
    private $contrasena;    // password
    private $base_de_datos; // nom base de datos
    private $conexion;      // atributo que almacenará la conexión

    // Constructor para inicializar los datos de conexión
    public function __construct($servidor, $usuario, $contrasena, $base_de_datos)
    {
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->base_de_datos = $base_de_datos;
    }

    // Método para conectar a la base de datos
    public function conectar()
    {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->base_de_datos);

        // Verificar si hay errores en la conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        return $this->conexion;
    }

    // Método para desconectar de la base de datos
    public function desconectar()
    {
        if ($this->conexion) {
            $this->conexion->close();
        }
    }
}
