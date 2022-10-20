<?php 

    class Conexion{
        private $host = "127.0.0.1";
        private $user = "root";
        private $password = "Wegenner1$";
        private $db = "ruzquinmysql";
        private $connect;

        public function __construct()
        {

            $connectionString = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";

            try {
                $this->connect = new PDO($connectionString,$this->user,$this->password);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conexion Exitosa";
            } catch (Exception $e){
                $this->connect ='Error de conexión';
                echo "ERROR: ". $e->getMessage();
            }

        }

    }

    $connect = new Conexion();

?>