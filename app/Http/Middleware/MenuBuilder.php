<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Lang;
use Kaishiyoku\Menu\Facades\Menu;

class MenuBuilder
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::registerDefault([
            Menu::link('homepage', '<i class="material-icons menu-icon">home</i>' . Lang::get('menu.home'), [], ['class' => 'home']),
            Menu::link('album.index', '<i class="material-icons menu-icon">album</i>' . Lang::get('menu.albums')),
            Menu::link('artist.index', '<i class="material-icons menu-icon">account_box</i>' . Lang::get('menu.artists')),
            Menu::link('distributor.index', '<i class="material-icons menu-icon">business</i>' . Lang::get('menu.distributors')),
        ], ['class' => 'nav navbar-nav navbar-left']);

        Menu::register('user-menu', [
            Menu::link('', '<i class="material-icons menu-icon">account_circle</i>', [], [
                'title' => Lang::get('layout.logout'),
                'class' => 'disabled',
            ]),
            Menu::link('album.index', '<i class="material-icons menu-icon">power_settings_new</i>', [], ['title' => Lang::get('layout.logout')]),
        ], ['class' => 'nav navbar-nav navbar-right']);

        return $next($request);
    }
}
