<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyAccount extends Mailable
{
    use Queueable, SerializesModels;

    private $object;
    private  $url;

    public function __construct($object,  $url)
    {
        $this->object = $object;
        $this->url =  $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tech-team@foodcity.co.in', 'FoodCity Tech Team')
                    ->subject('FoodCity Account Activation E-mail')
                    ->view('emails.account-activation-mail',[
                        'object' => $this->object,
                        'url' => $this->url
                    ]);
    }
}