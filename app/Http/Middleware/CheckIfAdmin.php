<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();

        // var_dump($user);
        if($user->role == $roles)  {
            // dd($roles);
            return $next($request);
        } else {
            abort(403, 'Unauthorized action.');
        }

    }
}
