<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;
=======
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;
>>>>>>> 89b8f88997daca671f32d4db2d12a13064c62211

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
