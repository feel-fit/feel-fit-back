<?php

namespace App\Mail;

use App\Models\Shopping;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Shopping $shopping)
    {
        $this->shopping = $shopping;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.shopping.orderAdmin')->with(['shopping' => $this->shopping])->subject('Nueva Orden de pedido '. $this->shopping->id);
    }
}
