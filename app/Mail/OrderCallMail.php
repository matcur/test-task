<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCallMail extends Mailable
{
    use Queueable, SerializesModels;

    private $userName;
    private $userPhone;

    /**
     * Create a new message instance.
     *
     * @param $userName
     * @param $userPhone
     */
    public function __construct($userName, $userPhone)
    {
        $this->userName = $userName;
        $this->userPhone = $userPhone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.order-call')
                    ->with([
                        'userName' => $this->userName,
                        'userPhone' => $this->userPhone,
                    ]);
    }
}
