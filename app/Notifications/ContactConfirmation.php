<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactConfirmation extends Notification
{
    use Queueable;


    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }


    public function via(object $notifiable): array
    {

        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmation de réception de votre message')
            ->greeting('Bonjour ' . $this->contact->name . ' !')
            ->line('Nous avons bien reçu votre message. Merci de nous avoir contactés.')
            ->line('Nous reviendrons vers vous dès que possible.')
            ->salutation('Cordialement, L’équipe de BIO-STONE.');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
