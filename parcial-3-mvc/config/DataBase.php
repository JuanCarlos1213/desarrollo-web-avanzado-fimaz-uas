<?php

    //Crear una clase para conexion a base de datos mediante PDO.

    class DataBase{
        //Atributos de la clase DataBase
        private $host = "localhost";
        private $db = "proyecto";
        private $user = "demo";
        private $password = "";

        public function __construct()
        {
            //Constructor...
        }

        //Metodo para conexion a la base de datos.
        public function connect(){
            try {
                $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8", $this->user, $this->password);
                //Configura PDO para que lance excepciones
                $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $PDO;
            } catch (PDOException $e) {
                die("Error de conexion a la base de datos: " . $e->getMessage());
            }
            
        }

    }

?>