<?php

 class objeto_tickets{

     protected $id_ticket;
     protected $id_usuario_afectado;
     protected $fecha_creado;
     protected $hora_creacion;
     protected $id_agente_asignado;
     protected $id_creado_por;
     protected $estado;

     /**
      * @return mixed
      */
     public function getEstado()
     {
         return $this->estado;
     }

     /**
      * @param mixed $estado
      */
     public function setEstado($estado): void
     {
         $this->estado = $estado;
     }

     /**
      * @return mixed
      */
     public function getIdCreadoPor()
     {
         return $this->id_creado_por;
     }

     /**
      * @param mixed $id_creado_por
      */
     public function setIdCreadoPor($id_creado_por): void
     {
         $this->id_creado_por = $id_creado_por;
     }

     /**
      * @return mixed
      */
     public function getIdAgenteAsignado()
     {
         return $this->id_agente_asignado;
     }

     /**
      * @param mixed $id_agente_asignado
      */
     public function setIdAgenteAsignado($id_agente_asignado): void
     {
         $this->id_agente_asignado = $id_agente_asignado;
     }

     /**
      * @return mixed
      */
     public function getHoraCreacion()
     {
         return $this->hora_creacion;
     }

     /**
      * @param mixed $hora_creacion
      */
     public function setHoraCreacion($hora_creacion): void
     {
         $this->hora_creacion = $hora_creacion;
     }

     /**
      * @return mixed
      */
     public function getFechaCreado()
     {
         return $this->fecha_creado;
     }

     /**
      * @param mixed $fecha_creado
      */
     public function setFechaCreado($fecha_creado): void
     {
         $this->fecha_creado = $fecha_creado;
     }

     /**
      * @return mixed
      */
     public function getIdUsuarioAfectado()
     {
         return $this->id_usuario_afectado;
     }

     /**
      * @param mixed $id_usuario_afectado
      */
     public function setIdUsuarioAfectado($id_usuario_afectado): void
     {
         $this->id_usuario_afectado = $id_usuario_afectado;
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





 }

?>