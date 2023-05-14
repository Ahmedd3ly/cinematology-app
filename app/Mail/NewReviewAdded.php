<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewReviewAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $movieTitle;
    public $reviewerEmail;

    /**
     * Create a new message instance.
     *
     * @param string $movieTitle
     * @param string $reviewBody
     */
    public function __construct(string $movieTitle, string $reviewerEmail)
    {
        $this->movieTitle = $movieTitle;
        $this->reviewerEmail = $reviewerEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cinematology@myblog.com')
                    ->markdown('emails.review_added')
                    ->with([
                        'movieTitle' => $this->movieTitle,
                        'reviewBody' => $this->reviewerEmail,
                    ]);
    }
}
