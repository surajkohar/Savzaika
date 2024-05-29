<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;


class CountVisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    
    {
        $ipAddress = $request->ip();
  

    Visitor::updateOrCreate(
        ['ip_address' => $ipAddress],
        ['updated_at' => now()]
    );

        return $next($request);
    }
}
