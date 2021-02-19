<?php

class objeto_comentarios{

    protected $id_comentario;
    protected $id_ticket;
    protected $id_usuario;
    protected $comentario;
    protected $fecha_comentario;
    protected $hora_comentario;

    /**
     * @return mixed
     */
    public function getHoraComentario()
    {
        return $this->hora_comentario;
    }

    /**
     * @param mixed $hora_comentario
     */
    public function setHoraComentario($hora_comentario): void
    {
        $this->hora_comentario = $hora_comentario;
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