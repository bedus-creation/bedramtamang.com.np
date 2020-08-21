<?php

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Broadcast;

>>>>>>> 89b8f88997daca671f32d4db2d12a13064c62211
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
