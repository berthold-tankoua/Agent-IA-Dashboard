<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $msgreceiv;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msgreceiv)
    {
        $this->msgreceiv = $msgreceiv;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return  $this->subject('ad')->view('emails.message_receiv')->subject('Notification');
    }
}
