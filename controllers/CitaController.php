<?php

    require_once "./models/CitaModel.php";
    require_once "./models/TatuadorModel.php";
    require_once "./models/Cita.php";
    class CitaController {

        // NECESITAMOS LOS MODELOS QUE SE USEN
        private $citaModel;
        private $tatuadorModel;

        public function __construct() {
            $this->citaModel = new CitaModel("./database/citas.json");
            $this->tatuadorModel = new TatuadorModel("./database/tatuadores.json");
        }

        public function cargarListAllCitas() {

            // 1º OBTENER TODAS LAS CITAS
            // PARA OBTENER TODAS LAS CITAS, USO CITAMODEL->EL MÉTODO leerCitas()
            $citas = $this->citaModel->leerCitas();

            // 2º CARGAR LA VISTA
            require_once "./views/listaCitasView.php";

        }


        public function cargarAltaCitaView($error = []) {

            $tatuadores = $this->tatuadorModel->leerTatuadores();

            require_once "./views/AltaCitaView.php";
        }

        public function guardarCita($postData = null) {
            $error = [];
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

                        $error["error_cita_duplicada"] = "CITA NO DISPONIBLE";
                        $this->cargarAltaCitaView($error);
                    }
                    


                    

            } else {
                // ERROR
                if (!$postData["input_id"]) {
                    $error["error_id"] = "El id es obligatorio";
                }
                if (!isset($postData["input_descripcion"]) || strlen(trim($postData["input_descripcion"]) == 0)) {
                    $error["error_descripcion"] = "La descripcion es obligatoria";
                }
                if (!isset($postData["input_fecha_cita"]) || strlen(trim($postData["input_fecha_cita"]) == 0)) {
                    $error["error_fecha_cita"] = "La fecha es obligatoria";
                }
                if (!isset($postData["input_cliente"]) || strlen(trim($postData["input_cliente"]) == 0)) {
                    $error["error_cliente"] = "El nombre del cliente es obligatorio";
                }
                if (!isset($postData["input_tatuador"]) || strlen(trim($postData["input_tatuador"]) == 0)) {
                    $error["error_tatuador"] = "El nombre del tatuador es obligatorio";
                }
                $this->cargarAltaCitaView($error);
            }
        }


    }

?>