<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\BuyingVehicle;
class BuyVehicle extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BuyingVehicle $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->markdown('admin.buy-vehicle-email-templete')->subject('Buying Vehicle Details');
        $explode = explode('|', $this->data['photos']);
        foreach($explode as $vehicleImages){
            $mail->attach(base_path('public/storage/sell-vehicles/'.$vehicleImages))->with(['data'=> $this->data]);
        }

        return $mail;
    }
}
