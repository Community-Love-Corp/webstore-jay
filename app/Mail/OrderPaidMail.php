<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPaidMail extends Mailable
{
    public $order; 
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        //
        $this->order = $order;
    }
    
    public function build()
    {
        return $this->subject('Order Receipt')->view('emails.order-paid');
    }
}