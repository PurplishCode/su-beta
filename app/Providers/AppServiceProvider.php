<?php

namespace App\Providers;

use App\Models\Foto;
use App\Models\KomentarFoto;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Gate::define('edit-foto', function(User $user, $fotoID){
            $foto = Foto::findOrFail($fotoID);
            return $user->id === $foto->user_id;
        });
    
        Gate::define('hapus-foto', function(User $user, $fotoID) {
            $foto = Foto::findOrFail($fotoID);
            return $user->id === $foto->user_id;
        });

        Gate::define('edit-komentar', function(User $user, $komentarID){
            $komentarID = KomentarFoto::findOrFail($komentarID);
            return $user->id === $komentarID->user_id;
        });

        Gate::define('hapus-komentar', function(User $user, $komentarID){
            $komentarID = KomentarFoto::findOrFail($komentarID);
            return $user->id === $komentarID->user_id;
        });
    
    }
}
