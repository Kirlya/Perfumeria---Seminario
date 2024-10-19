<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailables\Address;



class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
    $this->data = $data;
    }



    /**
     * Get the message envelope.
     */

     /*
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('kathiacaro9@gmail.com','Perfumeria'),
            replyTo: [
                //new Address('kathiacaro9@gmail.com','Receptor'),
                new Address($this->data['email'], $this->data['nombre']),
            ],
            subject: 'Notificacion',
        );
    }*/

    /**
     * Get the message content definition.
     */

     /*
    public function content(): Content
    {
        return new Content(
            view: 'email.send',
            with: [
                'data' => $this->data,
            ],
        );
    }*/

    public function build()
    {
        return $this->view('email.send')
                    ->with(['contenido' => $this->data])
                    ->subject($this->data['asunto']);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
