<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Penilaian;
use App\Models\User;

class SidebarComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('component.sidebar', function ($view) {
            $periode = Penilaian::distinct()->pluck('periode');

            $penguji = User::get();
            
            $view->with('periode', $periode)->with('penguji', $penguji);
        });
    }
}
