<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;
class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->method() === 'GET') {
            $segment = $request->segment(1);
            if (!array_key_exists($segment, config('app.locales')))
            {
                $segments = $request->segments();
                $fallback = session('locale') ?: config('app.fallback_locale');
                $segments = Arr::prepend($segments, $fallback);
                $redirect_url = implode('/', $segments);
                $redirect_url = str_replace($segment . '/', '', $redirect_url);
                return redirect()->to($redirect_url);
            }
            session(['locale' => $segment]);
            app()->setLocale($segment);
        }
        return $next($request);
    }
}