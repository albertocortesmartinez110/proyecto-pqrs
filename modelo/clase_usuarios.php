<?php

class objeto_usuario
{
    private $id_usuario;
    private $nombres_usuario;
    private $apellidos_usuario;
    private $ciudad_usuario;
    private $telefono_usuario;
    private $correo_usuario;
    private $contraseña_usuario;
    private $perfil_usuario;
    private $img_usuario;

    /**
     * @return mixed
     */
    public function getImgUsuario()
    {
        return $this->img_usuario;
    }

    /**
     * @param mixed $img_usuario
     */
    public function setImgUsuario($img_usuario): void
    {
        $this->img_usuario = $img_usuario;
    }

    /**
     * @return mixed
     */
    public function getPerfilUsuario()
    {
        return $this->perfil_usuario;
    }

    /**
     * @param mixed $perfil_usuario
     */
    public function setPerfilUsuario($perfil_usuario): void
    {
        $this->perfil_usuario = $perfil_usuario;
    }

    /**
     * @return mixed
     */
    public function getContraseñaUsuario()
    {
        return $this->contraseña_usuario;
    }

    /**
     * @param mixed $contraseña_usuario
     */
    public function setContraseñaUsuario($contraseña_usuario): void
    {
        $this->contraseña_usuario = $contraseña_usuario;
    }

    /**
     * @return mixed
     */
    public function getCorreoUsuario()
    {
        return $this->correo_usuario;
    }

    /**
     * @param mixed $correo_usuario
     */
    public function setCorreoUsuario($correo_usuario): void
    {
        $this->correo_usuario = $correo_usuario;
    }

    /**
     * @return mixed
     */
    public function getCiudadUsuario()
    {
        return $this->ciudad_usuario;
    }

    /**
     * @param mixed $ciudad_usuario
     */
    public function setCiudadUsuario($ciudad_usuario): void
    {
        $this->ciudad_usuario = $ciudad_usuario;
    }

    /**
     * @return mixed
     */
    public function getNombresUsuario()
    {
        return $this->nombres_usuario;
    }

    /**
     * @param mixed $nombres_usuario
     */
    public function setNombresUsuario($nombres_usuario): void
    {
        $this->nombres_usuario = $nombres_usuario;
    }

    /**
     * @return mixed
     */
    public function getTelefonoUsuario()
    {
        return $this->telefono_usuario;
    }

    /**
     * @param mixed $telefono_usuario
     */
    public function setTelefonoUsuario($telefono_usuario): void
    {
        $this->telefono_usuario = $telefono_usuario;
    }

    /**
     * @return mixed
     */
    public function getApellidosUsuario()
    {
        return $this->apellidos_usuario;
    }

    /**
     * @param mixed $apellidos_usuario
     */
    public function setApellidosUsuario($apellidos_usuario): void
    {
        $this->apellidos_usuario = $apellidos_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }
}

?>