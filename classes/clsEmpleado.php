<?php
    include_once 'clsConexion.php';

    class ClsEmpleado extends clsConexion {

        private $idEmpleado;
        private $user;
        private $password;

        public function __construct($user, $password) {
            $this->user = $user;
            $this->password = $password;
        }

        public function logIn() {
            $sql = "SELECT * FROM tblempleados WHERE vchUser='$this->user' AND vchPassword='$this->password'";
            $result = $this->con->query($sql);
            if(mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                return false;
            }
        }

        public function startSession() {
            session_start();
            $_SESSION['user'] = $this->user;
            $_SESSION['password'] = $this->password;
        }

        public function endSession() {
            session_destroy();
        }

        public function getStateEmpleado(){
            $sql = "SELECT * FROM tblempleados WHERE vchUser='$this->user' AND vchPassword='$this->password'";
            $result = $this->con->query($sql);
            return $result;
        }

        public function isActive(){
            if (isset($_SESSION['user'])) {
                return true;
            } else {
                return false;
            }
        }
    }

?>