<?php

    class Cita implements JsonSerializable {

        // ATRIBUTOS
        private string $id;
        private string $descripcion;
        private string $fechaCita;
        private string $cliente;
        private string $tatuador;

        // METODOS
        // CONSTRUCTOR
        public function __construct(string $id, string $descripcion, string $fechaCita, 
                                        string $cliente, string $tatuador) {
            $this->id = $id;
            $this->descripcion = $descripcion;
            $this->fechaCita = $fechaCita;
            $this->cliente = $cliente;
            $this->tatuador = $tatuador;
        }

        // GETTERS Y SETTERS
        public function getId(): string {
            return $this->id;
        }

        public function getDescripcion(): string {
            return $this->descripcion;
        }

        public function getFechaCita(): string {
            return $this->fechaCita;
        }

        public function getCliente(): string {
            return $this->cliente;
        }

        public function getTatuador(): string {
            return $this->tatuador;
        }

        public function jsonSerialize(): array {
            return [
                'id' => $this->id,
                'descripcion' => $this->descripcion,
                'fecha_cita' => $this->fechaCita,
                'cliente' => $this->cliente,
                'tatuador' => $this->tatuador
            ];
        }

    }

?>