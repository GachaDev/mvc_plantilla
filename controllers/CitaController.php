<?php

    require_once "./models/CitaModel.php";
    require_once "./models/Cita.php";
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


        public function cargarAltaCitaView($error = false) {
            require_once "./views/AltaCitaView.php";
        }

        public function guardarCita($postData = null) {

            if(isset($postData) 
                && $postData["input_id"]
                && $postData["input_descripcion"]
                && $postData["input_fecha_cita"]
                && $postData["input_cliente"]
                && $postData["input_tatuador"]) {

                    // 1º OBTENER TODAS LAS CITAS
                    $citasPresentes = $this->citaModel->leerCitas();

                    // 2º Extraer en variables
                    $id =   $postData["input_id"];
                    $descripcion =         $postData["input_descripcion"];
                    $fecha_cita =        $postData["input_fecha_cita"];
                    $cliente =        $postData["input_cliente"];
                    $tatuador =         $postData["input_tatuador"];

                    // 3º INSERTAR UNA NUEVA CITA SI ESTÁ LIBRE
                    $citaDisponible = true;
                    foreach($citasPresentes as $cita) {

                        if($cita["fecha_cita"] == $fecha_cita && $cita["tatuador"] == $tatuador) {
                            $citaDisponible = false;
                        }
                    }
                    if($citaDisponible) {
                        $citaNueva = new Cita($id, $descripcion, $fecha_cita, $cliente, $tatuador);
                        $citasPresentes[] = $citaNueva;

                        // 4º Inserto en Fichero
                        $this->citaModel->guardarCitas($citasPresentes);

                        require_once "./views/AltaCitaCorrectaView.php";
                    } else {
                        // ERROR
                        $error = true;
                        $this->cargarAltaCitaView($error);
                    }
                    


                    

            }
        }


    }

?>