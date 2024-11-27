<?php

namespace App\Mail\Notifikasi\ExampleData;

use App\Models\ExampleData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TambahNotifikasi extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;
    public $nama;

    /**
     * Membuat instance pesan baru.
     *
     * @param $data
     * @param $user
     */
    public function __construct($data, $nama)
    {
        $this->data = $data;
        $this->nama = $nama;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi | Melakukan Tambah Data',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'backend.email.example-data.tambah',
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
