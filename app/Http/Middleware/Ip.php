<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Ip
{
    private const ALLOWED_IPS = [
        '172.22.44.1',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->isIpAllowed($request)) {
            return $next($request);
        }

        return response('Unauthorized!', 401);
    }

    private function isIpAllowed(Request $request): bool
    {
        return in_array(
            $request->ip(),
            self::ALLOWED_IPS,
            true
        );
    }
}
