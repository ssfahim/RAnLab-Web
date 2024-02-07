<?php

// app/Http/Middleware/IsAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->email === 'test@test.com') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
