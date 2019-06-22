<?php

use Illuminate\Mail\Markdown;

function markdown($path)
{
    $content = Markdown::parse(file_get_contents(resource_path("views/{$path}.md")));

    return $content;
}
