<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Account;

class Acount
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
        if(auth()->check()){
            $isValid = Account::where('user_id',auth()->user()->id)->first();
            if($isValid){
                return $next($request);
            }
        }
        return redirect('/code');
    }
}
