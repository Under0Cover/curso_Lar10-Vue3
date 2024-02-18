<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*
            REQUEST
            $IP = $request->server->get('REMOTE_ADDR');
            $ROUTE = $request->getRequestUri();
            dd($request);
        */
        /*
            Teste de funcionamento: OK!
            // LogAcesso::create([
            //     'log'   =>  'teste de log ' .$IP
            // ]);
        */
        return $next($request);
    }
}
