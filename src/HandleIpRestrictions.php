<?php

namespace Rabianr\Access;

use Closure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Support\Collection;

class HandleIpRestrictions
{
    /** @var Collection $whitelist */
    protected $whitelist;

    public function __construct()
    {
        $this->whitelist = collect(config('iprestrictions.whitelist'));
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws AccessDeniedHttpException
     */
    public function handle($request, Closure $next)
    {
        if (! $this->whitelist->containsStrict('*')
            && ! $this->whitelist->containsStrict($request->ip())
        ) {
            throw new AccessDeniedHttpException;
        }

        return $next($request);
    }
}
