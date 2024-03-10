<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;

class EmailVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param mixed $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
 * Build the message.
 *
 * @return $this
 */
public function build()
{
    return $this->markdown('emails.verify_email')->with([
        'user' => $this->user,
    ]);
}

/**
 * Get the message envelope.
 */
public function envelope(): Envelope
{
    return new Envelope(
        subject: 'Email Verification Mail'
    );
}

/**
 * Get the message content definition.
 */
public function content(): Content
{
    return new Content(
        markdown: 'emails.auth.email_verification_mail'
    );
}
}