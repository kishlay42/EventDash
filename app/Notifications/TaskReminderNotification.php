<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskReminderNotification extends Notification
{
    use Queueable;

    public $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Task Reminder: ' . $this->task->name)
            ->line('This is a reminder for your task: ' . $this->task->name)
            ->line('Due Date: ' . $this->task->due_date)
            ->action('View Task', url('/tasks/' . $this->task->id))
            ->line('Thank you for using Task Manager!');
    }
}