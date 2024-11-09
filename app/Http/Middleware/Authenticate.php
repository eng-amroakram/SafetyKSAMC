<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Check if the request path starts with 'admin/'
        if ($request->is('admin/*')) {
            return route('admin.login'); // Redirect to admin.login route
        }

        // Default behavior for other routes
        return $request->expectsJson() ? null : route('web.login');
    }
}
