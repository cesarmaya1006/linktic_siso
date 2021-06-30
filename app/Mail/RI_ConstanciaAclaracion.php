<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RI_ConstanciaAclaracion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id_aclaracion;
    public function __construct($id_aclaracion)
    {
        $this->id_aclaracion = $id_aclaracion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contacto@quiku.com')->view('intranet.emails.ri_contancia_aclaracion_email')->with(['id_aclaracion' => $this->id_aclaracion,]);
    }
}
