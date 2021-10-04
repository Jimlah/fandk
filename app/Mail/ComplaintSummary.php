<?php

namespace App\Mail;

use App\Models\Branch;
use App\Models\Manager;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ComplaintSummary extends Mailable
{
    use Queueable, SerializesModels;

    public $branch;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($branch)
    {
        $this->branch = $branch;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Complaint Summary')
            ->markdown('emails.managers.summary_complaints');
    }
}
