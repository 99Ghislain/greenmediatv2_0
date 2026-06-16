<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class GuestprodServiceProvider extends ServiceProvider
{
    /**
     * Register services
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $guestprodData[0] = DB::table('partenaires')->get();  
        // Pub
        $xpub[0] = Controller::svphxpub(1,2);
        $xpub[1] = Controller::svphxpub();
        $xpub[2] = Controller::svphxpub(3,2);
        $xpub[3] = Controller::svphxpub(4,2);
        $xpub[4] = Controller::svphxpub(5,2);
        $xpub[5] = Controller::svphxpub(6,2);
        $guestprodData[1] = $xpub;

        View::share('guestprodData',[$guestprodData]);
    }
}
