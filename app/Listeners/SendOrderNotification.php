<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderNotification
{
    use Notifiable;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {


        $user = User::find(1);
        $user->notify(new OrderNotification($event->order));

//        $data = array('name'=> $event->order->product_name);
//
//        Mail::send(['text'=>'mail'], $data, function($message) {
//            $message->to('chunam2606@gmail.com', 'Tutorials Point')->subject
//            ('Laravel Basic Testing Mail');
//        });
//        echo "Basic Email Sent. Check your inbox.";
    }
}
