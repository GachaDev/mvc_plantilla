<?php

    require_once "./database/HandleJson.php";
    class CitaModel {

        private $handleJson;

        public function __construct($rutaFichero) {
            $this->handleJson = new HandleJson($rutaFichero);
        }

        public function guardarCitas($datos) { // saveCita
            $this->handleJson->saveToJson($datos);
        }

        public function leerCitas() { // getAllCitas
            return $this->handleJson->loadFromJson();
        }
    }

?>