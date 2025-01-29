<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfMobile
{
    public function handle(Request $request, Closure $next)
    {
        // Se a rota já for /mobile, não faz nada
        if ($request->is('mobile')) {
            return $next($request);
        }

        // Detecta se o acesso é feito de um dispositivo móvel
        if ($this->isMobileDevice($request)) {
            return redirect('/mobile');
        }

        return $next($request);
    }

    private function isMobileDevice(Request $request)
    {
        // Verifica o User-Agent do navegador
        return preg_match('/(android|iphone|ipad|ipod|blackberry|opera mini|windows phone|mobile)/i', $request->header('User-Agent'));
    }
}
