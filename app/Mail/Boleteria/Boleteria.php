<?php

namespace App\Mail\Boleteria;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Boleteria extends Mailable
{
    use Queueable, SerializesModels;

    public $correo,$productosname,$usuario,$cantidad;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correo,$productosname,$usuario,$cantidad)
    {
          $this->correo = $correo;
          $this->productosname = $productosname;
          $this->usuario = $usuario;
          $this->cantidad = $cantidad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('mail.boleteria.boleteria')
                  ->from('sistemas@fonsodi.com')
                  ->with('name','Solicitud de boletas')
                  ->to($this->correo)
                  ->subject('Solicitud de boletas');
    }
}
