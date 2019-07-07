<?php

// use Illuminate\Support\Str;
// use Illuminate\Mail\Markdown;

// function markdown($path)
// {
//     $content = Markdown::parse(file_get_contents(resource_path("views/{$path}.md")));

//     return $content;
// }

// function applyActive($route_name) // 'data.motors.*
// {
//     $currentRouteName = Route::current()->getName();

//     if (Str::endsWith($route_name, "*")) {
//         $route_name = implode('.', explode('.', $route_name, -1));
//         $currentRouteName = implode('.', explode('.', $currentRouteName, -1));
//     }

//     return ($currentRouteName === $route_name) ? 'active' : '';
// }
