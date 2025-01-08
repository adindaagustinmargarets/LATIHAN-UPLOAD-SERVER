<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $user;
    public $resetemail;
    public $ip;
    public $locationData;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $token, $ip, $locationData)
    {
        $this->user = $user;
        $this->resetemail = url(route('password.reset', [
            'token' => $token,
            'email' => $user->email,
        ], false));
        $this->ip = $ip;
        $this->locationData = $locationData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.auth.reset', // Sesuaikan dengan path view Anda
            with: [
                'user' => $this->user,
                'resetUrl' => $this->resetemail,
                'ip' => $this->ip,
                'locationData' => $this->locationData,
            ],
        );
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
