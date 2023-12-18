<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Kutia\Larafirebase\Messages\FirebaseMessage;

class SendPushNotification extends Notification
{
    use Queueable;
	protected $title;
	protected $message;
	protected $fcmTokens;


    public function __construct($title,$message,$fcmTokens)
    {
	    $this->title = $title;
	    $this->message = $message;
	    $this->fcmTokens = $fcmTokens;
	    
    }


    public function via(object $notifiable): array
    {
        return ['firebase'];
    }

 
	public function toFirebase($notifiable)
	{
		return (new FirebaseMessage)
			->withTitle($this->title)
			->withBody($this->message)
			->withPriority('high')->asMessage($this->fcmTokens);
	}


    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
