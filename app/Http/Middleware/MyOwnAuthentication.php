<?php

namespace App\Http\Middleware;

use Closure;

class MyOwnAuthentication
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
        /*$user_data = [
            "user_id" => '1983',
            "role" => 'A'
        ];
        $request->session()->put('user_info', $user_data);*/
        //$request->session()->forget('user_info');
        if ($request->session()->has('user_info.user_id') && $request->session()->get('user_info.role') == 'A') {
            return $next($request);
        } else {
            return redirect('admin/authorization');
        }
    }
}
