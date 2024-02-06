<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TodoOverdue extends Notification
{
    use Queueable;
    public $categories;
    public $taskId;
    /**
     * Create a new notification instance.
     */
    public function __construct($categories)
    {
        //

        $this->categories = $categories;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {

        $countcategories = count($this->categories);

        if ($countcategories === 1) {
            return [
                'overdue_categories' => $this->categories,
                'message' => ' One of your task category, <b>' . $this->categories[0] . '</b> is due tomorrow. Plan your time accordingly to complete it on schedule.',
                'link' => route('categories'),
            ];
        } else {

            $taskCategories = implode(', ', array_map(function ($task) {
                return '<b>' . $task . '</b>';
            }, $this->categories));
            return [
                'overdue_categories' => $this->categories,
                'message' => 'Your task categories: ' .  $taskCategories . ' is due tomorrow. Plan your time accordingly to complete it on schedule.',
                'link' => route('categories'),
            ];
        }
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

    public function databaseType(object $notifiable): string
    {
        return 'Task Overdue';
    }
}