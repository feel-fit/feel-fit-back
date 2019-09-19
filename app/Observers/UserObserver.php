<?php
/**
 * Created by PhpStorm.
 * User: mauriciosuarez
 * Date: 3/15/18
 * Time: 11:51 AM.
 */

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function creating(User $user)
    {
        if (! $user->password) {
            $user->password = bcrypt(str_random(10));
        } else {
            $user->password = bcrypt($user->password);
        }
    }

    public function created(User $user)
    {
        //TODO enviar correo de bienvenida
        $user->createToken($user->email)->accessToken;
        $user->syncRoles('admin');
    }
}
