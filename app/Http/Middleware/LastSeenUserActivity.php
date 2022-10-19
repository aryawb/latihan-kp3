<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use App\Models\User;
use Cache;
use Auth;
use Closure;
use Illuminate\Http\Request;

class LastSeenUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            $expireTime = Carbon::now()->addMinute(1);

            Cache::put('is_online' . Auth::user()->id, true, $expireTime);

            // last seen
            User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }
        return $next($request);
    }
}
