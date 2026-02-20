<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicationSubmitted extends Notification implements ShouldQueue
{
    use Queueable;

    protected $jobTitle;
    protected $applicantName;

    public function __construct($jobTitle, $applicantName)
    {
        $this->jobTitle = $jobTitle;
        $this->applicantName = $applicantName;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Job Application Submitted')
            ->greeting('Hello!')
            ->line('A new application has been submitted for your job posting: ' . $this->jobTitle)
            ->line('Applicant: ' . $this->applicantName)
            ->action('View Applications', url('/employer/applications'));
    }
}
