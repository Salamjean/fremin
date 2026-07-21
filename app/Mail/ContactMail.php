<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $filePath;
    public $fileName;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $filePath = null, $fileName = null)
    {
        $this->data = $data;
        $this->filePath = $filePath;
        $this->fileName = $fileName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address', 'contact@freminci.com'), 'FREMIN'),
            subject: 'Nouveau message de contact: ' . $this->data['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];
        if ($this->filePath) {
            $attachment = Attachment::fromPath($this->filePath);
            if ($this->fileName) {
                $attachment->as($this->fileName);
            }
            $attachments[] = $attachment;
        }
        return $attachments;
    }
}
