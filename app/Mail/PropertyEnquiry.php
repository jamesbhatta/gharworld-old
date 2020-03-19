<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropertyEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;
    public $property;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData, $property = null)
    {
        $this->formData = $formData;
        $this->property = $property;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $formData = $this->formData;
        $property = $this->property;
        return $this->subject('Property Enquiry')->view('mail.property-enquiry', compact(['formData', 'property']));
    }
}
