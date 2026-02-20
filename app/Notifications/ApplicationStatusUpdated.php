<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicationStatusUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    protected $jobTitle;
    protected $status;

    public function __construct($jobTitle, $status)
    {
        $this->jobTitle = $jobTitle;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Job Application Status Updated')
            ->greeting('Hello!')
            ->line('The status of your application for the job: ' . $this->jobTitle . ' has been updated to: ' . ucfirst($this->status))
            ->action('View Application', url('/dashboard'));
    }
}
