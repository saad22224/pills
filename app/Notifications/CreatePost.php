<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Broadcasting\Channel;
class CreatePost extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $post_id;
    private $user_create;
    private $title;
    public function __construct($post_id , $user_create ,  $title)
    {
       $this->post_id = $post_id;
       $this->user_create= $user_create;
       $this->title=  $title;
    }

    public function broadcastOn()
    {
        // البث سيكون على القناة العامة 'notifications'
        return new Channel('notifications');
    }

    public function broadcastAs()
    {
        return 'new-post'; // الحدث الذي سيتم البث له
    }

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

     public function toDatabase($notifiable)
     {
         return [
             'message' => 'A new post has been created.',
             'user_create' => $this->user_create,
             'post_id' => $this->post_id,
             'title' => $this->title,
             'url' => url("/posts/{$this->post_id}"),
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
