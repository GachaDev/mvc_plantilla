<?php

require_once './database/DBConnection.php'; // Incluir la clase DBConnection

class TatuadorModel
{
    private $database;
    private $tabla = "tatuadores"; // Nombre de la tabla

    // Constructor para inicializar la conexión a la base de datos
    public function __construct()
    {
        $this->database = new DBConnection("localhost", "root", "", "tattoos_bd");
        $this->database->conectar(); // Conectar a la base de datos
    }

    // Método para crear un nuevo usuario
    public function crearUsuario($nombre, $email)
    {
        $sql = "INSERT INTO $this->tabla (nombre, email) VALUES (?, ?)";
        $stmt = $this->database->conectar()->prepare($sql);
        $stmt->bind_param("ss", $nombre, $email); // "ss" indica que son dos strings

        if ($stmt->execute()) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }

    // Método para obtener todos los usuarios
    public function obtenerUsuarios()
    {
        $sql = "SELECT * FROM $this->tabla";
        $resultado = $this->database->conectar()->query($sql);

        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }

        return $usuarios;
    }

    // Método para obtener un usuario por su ID
    public function obtenerUsuarioPorId($id)
    {
        $sql = "SELECT * FROM $this->tabla WHERE id = ?";
        $stmt = $this->database->conectar()->prepare($sql);
        $stmt->bind_param("i", $id); // "i" indica que es un entero
        $stmt->execute();
        $resultado = $stmt->get_result();

        return $resultado->fetch_assoc();
    }

    // Método para actualizar un usuario
    public function actualizarUsuario($id, $nombre, $email)
    {
        $sql = "UPDATE $this->tabla SET nombre = ?, email = ? WHERE id = ?";
        $stmt = $this->database->conectar()->prepare($sql);
        $stmt->bind_param("ssi", $nombre, $email, $id); // "ssi" indica dos strings y un entero

        if ($stmt->execute()) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }

    // Método para eliminar un usuario
    public function eliminarUsuario($id)
    {
        $sql = "DELETE FROM $this->tabla WHERE id = ?";
        $stmt = $this->database->conectar()->prepare($sql);
        $stmt->bind_param("i", $id); // "i" indica que es un entero

        if ($stmt->execute()) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }

    // Método para cerrar la conexión
    public function cerrarConexion()
    {
        $this->database->desconectar();
    }
}
