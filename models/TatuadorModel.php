<?php

require_once "./database/HandleJson.php";
class TatuadorModel
{

    private $handleJson;

    public function __construct($rutaFichero)
    {
        $this->handleJson = new HandleJson($rutaFichero);
    }

    public function guardarTatuador($datos)
    { // saveCita
        $this->handleJson->saveToJson($datos);
    }

    public function leerTatuadores()
    { // getAllCitas
        return $this->handleJson->loadFromJson();
    }
}
