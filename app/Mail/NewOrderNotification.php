<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
   

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_new_order)
    {
        $this->order = $_new_order;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'order' => $this->order
            
        ];

        return $this->view('admin.mails.new-order-notification', $data);
    }
}
