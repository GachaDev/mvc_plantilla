<?php

    require_once "./models/CitaModel.php";
    class CitaController {

        // NECESITAMOS LOS MODELOS QUE SE USEN
        private $citaModel;

        public function __construct() {
            $this->citaModel = new CitaModel("./database/citas.json");
        }

        public function cargarListAllCitas() {

            // 1º OBTENER TODAS LAS CITAS
            // PARA OBTENER TODAS LAS CITAS, USO CITAMODEL->EL MÉTODO leerCitas()
            $citas = $this->citaModel->leerCitas();

            // 2º CARGAR LA VISTA
            require_once "./views/listaCitasView.php";

        }


    }

?>