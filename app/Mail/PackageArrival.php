<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PackageArrival extends Mailable
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

        $this->details = $details;

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mail.PackageArrival')
            ->subject('LogiFreight Limited Package Arrival');
//            ->with('details',$this->details)
//            ->attach(asset('invoiceBill/'.$this->details['TrackIn']),['mime' => 'application/pdf']);
    }
}
