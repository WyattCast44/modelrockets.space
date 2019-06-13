<?php

function article_path($article = '')
{
    return trim(resource_path("articles/{$article}"));
}
