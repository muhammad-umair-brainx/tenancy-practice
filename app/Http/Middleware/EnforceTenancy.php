<?php

namespace App\Http\Middleware;

use Closure;
use Hyn\Tenancy\Models\Website;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class EnforceTenancy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $url = URL::current();
//        $url = parse_url($url);
//        $url = explode('.', $url['host']);
//        $website = Website::whereHas('customer', function ($query) use ($url) {
//            $query->where('name', $url[0]);
//        })->first();
//
//        Config::set('database.connections.tenant.database', $website->uuid);
//        dd(config('database.connections'));
        return $next($request);
    }
}
