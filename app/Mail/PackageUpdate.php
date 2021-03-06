<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PackageUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = [
            'username' => $details->member->user->username,
            'status' => $details->status,
            'TrackIn' => $details->tracking_no,
            'InterTrack' => $details->internal_tracking
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mail.PackageUpdate')->subject('LogiFreight Limited Package Update');
    }
}
