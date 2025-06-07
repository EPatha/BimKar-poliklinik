<?php
// filepath: app/Providers/RouteServiceProvider.php
namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';

    public static function redirectTo()
    {
        $user = auth()->user();
        if ($user && $user->role === 'dokter') {
            return '/dashboard-dokter';
        }
        return '/dashboard-pasien';
    }
}

return redirect(RouteServiceProvider::redirectTo());