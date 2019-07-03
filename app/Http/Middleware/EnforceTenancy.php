<?php

namespace App\Http\Middleware;

use Closure;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Hostname;
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
        $url = URL::current();
        $url = parse_url($url);
        $url =  $url['host'].'/';

        $hostname=Hostname::where('fqdn',$url)->first();
        app(Environment::class)->hostname($hostname);

        if(empty($hostname))
        {
            Config::set('database.default', 'system');
        }
        else {
            Config::set('database.default', 'tenant');
        }

        return $next($request);
    }
}
