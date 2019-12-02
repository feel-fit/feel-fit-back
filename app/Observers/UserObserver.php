<?php
/**
 * Created by PhpStorm.
 * User: mauriciosuarez
 * Date: 3/15/18
 * Time: 11:51 AM.
 */

namespace App\Observers;

use App\Mail\NewPasswordUser;
use App\Models\User;
use App\Mail\WellcomeUser;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function creating(User $user)
    {
        if (!$user->password) {
            $passwrod = str_random(10);
            $user->password = bcrypt($passwrod);
            Mail::to($user->email)->send(new NewPasswordUser($passwrod));
        } else {
            $user->password = bcrypt($user->password);
        }
    }

    public function created(User $user)
    {
        Mail::to($user->email)->send(new WellcomeUser($user));
        $user->createToken($user->email)->accessToken;
        $user->syncRoles('client');
    }
}
