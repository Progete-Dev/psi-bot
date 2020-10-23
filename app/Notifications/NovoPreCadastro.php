<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NovoPreCadastro extends Notification
{
    use Queueable;
    public $preCadastro;
    public function __construct($preCadastro)
    {
        $this->preCadastro = $preCadastro;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->cc('test@email.com')
            ->salutation('Novo Pré Cadastro')
            ->line('Nome: '.$this->preCadastro->nome)
            ->line('Crp: '.$this->preCadastro->crp)
            ->line('Especialidade: '.$this->preCadastro->especialidade)
            ->line('Email: '.$this->preCadastro->email)
            ->line('Cep: '.$this->preCadastro->cep)
            ->line('Cidade: '.$this->preCadastro->cidade)
            ->line('Estado: '.$this->preCadastro->estado)
            ->action('Aceitar', url('precadastro/aceitar/'.$this->preCadastro->id))
            ->action('Rejeitar',url('precadastro/rejeitar/'.$this->preCadastro->id));

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
