<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckApiToken
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
        $auth_header = $request->header('authorization');
        if (empty($auth_header)) {
            return response()->json([
                'success' => false,
                'error' => 'API token mancante'
            ]);
        }

        $api_token = substr($auth_header, 7);
        $user = User::where("api_token" , $api_token)->first();
        if (empty($user)) {
            return response()->json([
                'success' => false,
                'error' => 'API token non presente in database'
            ]);
        }

        return $next($request);
    }
}
