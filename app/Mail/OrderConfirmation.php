<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Attachment;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $user;
    public $password;
    public $pdfData;
    public $attachmentFilename;
    /**
     * Create a new message instance.
     */
    public function __construct($orderList,$pdfData,$attachmentFilename)
    {
        $this->order = $orderList;
       
        $this->pdfData = $pdfData;
        $this->attachmentFilename = $attachmentFilename;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Details',
        );
    }

    /**
     * Get the message content definition.
     */


    public function content(): Content
    {
        return new Content(
            view: 'emails.order-confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [ Attachment::fromData(fn () => $this->pdfData, $this->attachmentFilename)
        ->withMime('application/pdf'),];
    }
}
