<?php
include_once 'clsConexion.php';
class clsCliente extends clsConexion
{

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public function getClient()
    {
        $sql = "SELECT * FROM tblclientes WHERE vchClvCliente= '$this->idCliente'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function createClient()
    {
        $sql = "INSERT INTO tblclientes (vchClvCliente, vchNombre, vchApaterno, vchAmaterno, vchTelefono, vchCalle, vchColonia, vchCiudad, vchEstado, vchEmail, vchUser, vchPassword, dtmFechaNacimiento, vchSexo, vchImagen) VALUES ('$this->idCliente', '$this->nombre', '$this->apaterno', '$this->amaterno', '$this->telefono', '$this->calle', '$this->colonia', '$this->ciudad', '$this->estado', '$this->email', '$this->user', '$this->password', '$this->fechaNacimiento', '$this->sexo', '$this->imagen')";
        $result = $this->con->query($sql);
        return $result;
    }

    public function updateClient($idCliente, $nombre, $amaterno, $apaterno, $telefono, $calle, $colonia, $ciudad, $estado, $email, $user, $password, $fechaNacimiento, $sexo, $imagen)
    {
        $sql = "UPDATE tblclientes SET vchNombre='$nombre', vchApaterno='$apaterno', vchAmaterno='$amaterno', vchTelefono='$telefono', vchCalle='$calle', vchColonia='$colonia', vchCiudad='$ciudad', vchEstado='$estado', vchEmail='$email', vchUser='$user', vchPassword='$password', dtmFechaNacimiento='$fechaNacimiento', vchSexo='$sexo', vchImagen='$imagen' WHERE vchClvCliente='$idCliente'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function imageUploadToDirectory()
    {
        $target_dir = "img-profiles/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        } else {
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function deleteClient()
    {
        $sql = "DELETE FROM tblclientes WHERE vchClvCliente='$this->idCliente'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function logIn()
    {
        $sql = "SELECT * FROM tblclientes WHERE vchUser='$this->user' AND vchPassword='$this->password'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function startSession()
    {
        session_start();
        $_SESSION['user'] = $this->user;
        $_SESSION['password'] = $this->password;
    }

    public function endSession()
    {
        session_destroy();
    }

    public function isActive()
    {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }
}
