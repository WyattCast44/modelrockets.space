<?php

use Illuminate\Mail\Markdown;
use Illuminate\Support\Str;

function markdown($path)
{
    $content = Markdown::parse(file_get_contents(resource_path("views/{$path}.md")));

    return $content;
}

if (!function_exists('isCurrentRoute')) {
    function isCurrentRoute($route_name)
    {
        return (Route::current()->getName() === $route_name) ? true : false;
    }
}

// if (!function_exists('applyActive')) {
//     function applyActive($route_name)
//     {
//         return (Route::current()->getName() === $route_name) ? 'active' : '';
//     }
// }


function applyActive($route_name) // 'data.motors.*
{
    $currentRouteName = Route::current()->getName();

    if (Str::endsWith($route_name, "*")) {
        $route_name = implode('.', explode('.', $route_name, -1));
        $currentRouteName = implode('.', explode('.', $currentRouteName, -1));
    }

    return ($currentRouteName === $route_name) ? 'active' : '';
}
