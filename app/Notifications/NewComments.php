<?php

namespace App\Notifications;

use App\Models\Review;
use Illuminate\Broadcasting\BroadcastManager;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewComments extends Notification
{
    use Queueable;

    protected $review;
    /**
     * Create a new notification instance.
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    public function toDatabase(object $notifiable): DatabaseMessage
    {
        return new DatabaseMessage(
            [
                'body' => $this->review->name . ' mentioned you in a comment',
                'icon' => "fas fa-comment",
                'link' =>  route('news.show', $this->review->news->slug),
                'ID' => $this->review->id
            ]

        );
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage(
            [
                'body' => $this->review->name . ' mentioned you in a comment',
                'icon' => "fas fa-comment",
                'link' =>  route('news.show', $this->review->news->slug),
                'time' => now()->diffForHumans(),
                'ID' => $this->review->id
            ]

        );
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
