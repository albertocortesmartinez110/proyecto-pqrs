<?php

class objeto_comentario{

    protected $id_comentario;
    protected $id_ticket;
    protected $id_usuario_comen;
    protected $comentario;
    protected $fecha_comentario;
    protected $tipo;
    protected $id_usuario_asignado;

    /**
     * @return mixed
     */
    public function getIdUsuarioAsignado()
    {
        return $this->id_usuario_asignado;
    }

    /**
     * @param mixed $id_usuario_asignado
     */
    public function setIdUsuarioAsignado($id_usuario_asignado): void
    {
        $this->id_usuario_asignado = $id_usuario_asignado;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }


    /**
     * @return mixed
     */
    public function getFechaComentario()
    {
        return $this->fecha_comentario;
    }

    /**
     * @param mixed $fecha_comentario
     */
    public function setFechaComentario($fecha_comentario): void
    {
        $this->fecha_comentario = $fecha_comentario;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario): void
    {
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioComen()
    {
        return $this->id_usuario_comen;
    }

    /**
     * @param mixed $id_usuario_comen
     */
    public function setIdUsuarioComen($id_usuario_comen): void
    {
        $this->id_usuario_comen = $id_usuario_comen;
    }



    /**
     * @return mixed
     */
    public function getIdTicket()
    {
        return $this->id_ticket;
    }

    /**
     * @param mixed $id_ticket
     */
    public function setIdTicket($id_ticket): void
    {
        $this->id_ticket = $id_ticket;
    }

    /**
     * @return mixed
     */
    public function getIdComentario()
    {
        return $this->id_comentario;
    }

    /**
     * @param mixed $id_comentario
     */
    public function setIdComentario($id_comentario): void
    {
        $this->id_comentario = $id_comentario;
    }

}

?>