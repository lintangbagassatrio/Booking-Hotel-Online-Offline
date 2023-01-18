<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HotelMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    public function __construct()
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->from('admin@example.com')
                    ->view('notifmail')
                    ->with(['user' => $this->user]);
    }
}
