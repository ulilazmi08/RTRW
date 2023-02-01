<?php

namespace App\Providers;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();  
        Gate::define('admin', function (User $user){
            return $user->role == 1;

        });  
       
        Gate::define('ketuarw', function (User $user){
            return $user->role == 2;

        });
        Gate::define('ketuart', function (User $user){
            return $user->role == 3;

        });
        Gate::define('bendahara', function (User $user){
            return $user->role == 4;

        });
        Gate::define('sekretaris', function (User $user){
            return $user->role == 5;

        });
        Gate::define('bendahararw', function (User $user){
            return $user->role == 7;

        });
        Gate::define('sekretarisrw', function (User $user){
            return $user->role == 8;

        });
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
    