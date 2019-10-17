<?php

namespace App\Observers;

use App\Models\Message;
use App\Mail\MessageMail;
use Illuminate\Support\Facades\Mail;

class MessageObserver
{
    public function created(Message $message)
    {
        Mail::to($message->email)->send(new MessageMail($message));
    }
}
