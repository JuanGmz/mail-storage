<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class Notificacion extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function envelope() {
        return new Envelope(
            subject: 'Notificacion',
        );
    }

    public function content() {
        return new Content(
            view: 'mail.notificacion',
            with: [
                'user' => $this->user
            ]
        );
    }

    public function attachments()
    {
        return [];
    }
}