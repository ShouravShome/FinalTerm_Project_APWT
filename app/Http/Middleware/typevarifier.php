<?php

namespace App\Http\Middleware;

use Closure;

class typevarifier
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
         $type=$request->session()->get('type');
		if($type=="user")
		{
					return $next($request);
		}
		else
			session()->flash('msgtype', 'Please LOGIN as user for dashboard');
			return redirect()->back();
    }
}
