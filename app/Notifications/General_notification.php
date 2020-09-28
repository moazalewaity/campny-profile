<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use \App\Notification_info;


class General_notification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $info_id;
    private $op_id;
     public function __construct($info_id , $op_id)
    {
        //
         $this->info_id =$info_id;
        $this->op_id= $op_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
         return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase(){
    $info_id=$this->info_id;
    $notification_infos =Notification_info::find($info_id);
    return[
    'title' =>$notification_infos->n_title,
    'details' =>$notification_infos->n_details,
    'url'=>$notification_infos->n_url.'?notifyid='.$this->op_id,

    ];
    

   }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
