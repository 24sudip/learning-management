<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::check()) {
            $expireTime = Carbon::now()->addSeconds(30);
            Cache::put('user-is-online'. Auth::user()->id, true, $expireTime);
            User::where('id', Auth::user()->id)->update([
                'last_seen' => Carbon::now()
            ]);
        }

        $userRole = $request->user()->role;

        if ($userRole === 'user' && $role !== 'user') {
            return redirect('/dashboard');
        } elseif ($userRole === 'admin' && $role !== 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($userRole === 'instructor' && $role !== 'instructor') {
            return redirect('/instructor/dashboard');
        }

        return $next($request);
        // if ($request->user()->role !== $role) {
        //     return redirect('/dashboard');
        // }
    }
}
