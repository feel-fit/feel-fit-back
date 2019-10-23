<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class MyResetPassword extends ResetPassword
{
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->subject(Lang::getFromJson('Recuperar contraseña'))
            ->greeting('Hola')
            ->line(Lang::getFromJson('Estás recibiendo este correo porque hiciste una solicitud de recuperación de contraseña para tu cuenta.'))
            ->action(Lang::getFromJson('Recuperar contraseña'), url(config('app.url').route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
            ->line(Lang::getFromJson('Este enlace de restablecimiento de contraseña caducará en :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::getFromJson('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.'))
            ->salutation('Saludos, '. config('app.name'));
    }

}
