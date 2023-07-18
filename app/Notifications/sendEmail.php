<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class sendEmail extends Notification
{
    use Queueable;


    public $name;
    public $email;
    public $subject;
    public  $message;
    /**
     * Create a new notification instance.
     */
    public function __construct($name, $email, $subject, $message)
    {
        //
        $this->name = $name;
        $this->email= $email ;
        $this->subject=$subject;
        $this->message =$message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($email): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting("my name is : ". $this->name. '<br> My email is :' . $this->email)
            ->line('the Subject : '.$this->subject)
            ->line('Content : ' .$this->message );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
