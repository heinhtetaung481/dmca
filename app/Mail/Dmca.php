<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Dmca extends Mailable
{
    use Queueable, SerializesModels;

    protected $notice;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notice)
    {
        $this->notice = $notice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $notice = $this->notice;
        return $this->from(['address'=> $notice->user->email, 'name' => $notice->user->name])
                    ->subject('DMCA Notice')
                    ->view('emails.dmca', compact('notice'));
    }
}
