<?php

namespace App\Middlewares;

use Closure;
use Phenomine\Support\Middleware;
use Phenomine\Support\Http\Request;

class Authenticated extends Middleware
{
    protected $name = 'authenticated';
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
