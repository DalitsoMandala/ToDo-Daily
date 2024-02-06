<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TodoCompleted extends Notification
{
    use Queueable;
    public $tasks;
    public $taskId;

    /**
     * Create a new notification instance.
     */
    public function __construct($tasks)
    {
        //

        $this->tasks = $tasks;
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

        $taskNames = implode(', ', array_map(function ($task) {
            return '<b>' . $task . '</b>';
        }, $this->tasks));

        if (count($this->tasks) > 1) {
            return [
                'completed_tasks' => $this->tasks,
                'message' => 'Congratulations! You have completed the task(s): ' . $taskNames,
                'link' => route('tasks'),
            ];
        } else {
            return [
                'completed_tasks' => $this->tasks,
                'message' => 'Congratulations! You have completed the task: ' . $taskNames,
                'link' => route('tasks'),
            ];
        }
    }

    /**
     * Get the notification's database type.
     *
     * @return string
     */
    public function databaseType(object $notifiable): string
    {
        return 'Task Completion';
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
