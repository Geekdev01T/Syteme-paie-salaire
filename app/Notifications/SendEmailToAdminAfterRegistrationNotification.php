<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToAdminAfterRegistrationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    /**
     * Declaration des attributs
     */
    public $code;
    public $email;

    public function __construct($codeToSend, $emailToSend)
    {
        $this->code = $codeToSend;
        $this->email = $emailToSend;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Creation du compte admin')
            ->line('Hello')
            ->line('Votre compte a été crée avec succes dans la plateforme')
            ->line('Voici votre cote de validation : ' .$this->code)
            ->line('Cliquez sur le bouton ci-dessous pour valider votre compte')
            ->action('Valider ici', url('/validate-account' . '/' . $this->email))
            ->line('Thank you for using our application!');
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
