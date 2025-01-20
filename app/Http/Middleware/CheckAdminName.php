<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;

class CheckAdminName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
{
    $user = Auth::user();
    $routeName = Route::currentRouteName();

    if ($user && $this->hasPermission($user->id, $routeName)) {
        return $next($request);
    }

    abort(403, 'Acesso negado.');
}

    private function hasPermission($userId, $routeName)
    {
        return Permission::where('user_id', $userId)
            ->where('route_name', $routeName)
            ->exists();
    }
}
