<?php
    class clsConexion {
        private $user = "root";
        private $pass = "";
        private $host = "localhost";
        private $db = "db_honey_b";

        public function __construct(){
            $this->con = new mysqli($this->host, $this->user, $this->pass, $this->db);

            if ($this->con->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $this->con->connect_errno . ") " . $this->con->connect_error;
            }
        }
    
    }
?>