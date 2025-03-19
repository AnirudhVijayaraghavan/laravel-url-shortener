<?php

namespace App\Mail;

use App\Models\User;
use App\Models\shortenedURLs;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class DailyAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Daily Admin Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'DailyAdminEmail',
            with: [
                'totalUrls' => shortenedURLs::count(),
                'totalClicks' => shortenedURLs::where('clickCount', '>', -1)->sum('clickCount'),
                'activeUsers' => User::count(),
                'newRegistrations' => User::whereDate('created_at', now()->toDateString())->count(),
                'newUrlsToday' => shortenedURLs::whereDate('created_at', now()->toDateString())->count(),
            ]
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
