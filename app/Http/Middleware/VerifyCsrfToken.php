<?php namespace SimBlog\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * Routes we want to exclude.
     *
     * @var array
     */
    protected $routes = [
        'edit/editorFileUpload',
    ];

    /**
     * This will return a bool value based on route checking.
     * @param  Request $request
     * @return boolean
     */
    protected function excludedRoutes($request)
    {
        foreach ($this->routes as $route)
            if ($request->is($route))
                return true;

        return false;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if ($this->isReading($request)
            || $this->excludedRoutes($request)
            || $this->tokensMatch($request)
        ) {
            return $this->addCookieToResponse($request, $next($request));
        }
        return parent::handle($request, $next);
    }

}
