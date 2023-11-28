<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsGeloged
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $users = Auth::user();

        foreach ($users as $user) {
            if ($user == $user) {
                return $next($request);
            }
        }

        return redirect()->route('login');
    }
}