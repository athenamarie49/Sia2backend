<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OwnerMiddleware
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
        $store = $request->route('store');

        if($store==null){
            return response()->json(['message'=>'Store cant found.'], 404);
        }

        if($store->user_id !=auth()->user()->id){
            return response()->json(['message'=>'You are not the owner of this store.'], 401);
        }
        return $next($request);
    }
}
